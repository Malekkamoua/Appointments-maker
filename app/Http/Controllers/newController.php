<?php

namespace App\Http\Controllers;

use PDF;
use DateTime;

use App\Fiche;
use App\Horaire;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class newController extends Controller {

    //render login page
    public function login() {

        $message = "";

        return view('login', [
            'message' => $message
        ]);
    }

    //Render appointement page
    public function test() {

        return view('test');
    }

    public function findDates(Request $request) {

        $horaires = Horaire::where( 'date', '>=', date('Y-m-d'))->where('Nature', '=',  $request['motif_test'] )->where('gsm',null)->get();

        return $horaires;

    }

    public function findTimes(Request $request) {

        $horaires = Horaire::where('date', '=', $request['date'])->where('Nature', '=',  $request['motif_test'] )->where('gsm',null)->get();

        $tab = [];

        for ($i=0; $i < sizeof($horaires); $i++) {
            array_push($tab, $horaires[$i]['horaire']);
        }

        return $tab;

    }

    //Si gsm n'existe pas redirection create sinon si acces faux message erreur
    public function createFiche(Request $request) {

        $tel = $request->input('tel');
        $ddn = $request->input('ddn');

        $existe = false;

        $fiche = Fiche::where([
            'gsm' => $tel])->orderBy('id','desc')->first();

        if ($fiche != null) {
            if ($fiche->ddn != $ddn) {

                $message = "Accés interdit. Veuillez verifier vos coordonnées.";

                return view('login', [
                    'message' => $message
                ]);
            }
        }

        $horaire_id = $fiche->horaire_id;

        $horaire = Horaire::where('id',$horaire_id)->first();

        if ($horaire != null) {

            $fiche = Fiche::where([
                'ddn' => $ddn,
                'gsm' => $tel
            ])->orderBy('id','desc')->first();

            if ($fiche != null) {

                $dat = $horaire->date;
                $pieces = explode("-", $dat);
                $h = substr($horaire->horaire,0,5);
                $date = $pieces[0].'-'.$pieces[1].'-'.$pieces[2];

                $date = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);

                //$date = Carbon::createFromDate("2021", "03", "20");
                // $now = Carbon::now()->toDateString();
                // $yesterday = Carbon::yesterday()->toDateString();
                $tomorrow = Carbon::tomorrow()->toDateString();

                $result = $date->gte($tomorrow);

                $arr = [$date, $tomorrow,$result];

                if ($result) {
                    $message = '<br> <b> Date </b>: '.$pieces[2].'/'.$pieces[1].'/'.$pieces[0]. ' <br> <b> Heure </b> : '.$h;

                    return view('recu', [
                        'fiche' =>$fiche,
                        'message' => $message,
                        'show_mail_message' =>""

                    ]);
                }

            }
        }

        return view('test', [
            'tel' => $tel,
            'ddn' => $ddn,
            'fiche' => $fiche,
            "msg" =>""
        ]);
    }

    public function storeFiche(Request $request){

        $msg = "";
        if ($request->input('horaire') ==  null) {

            $msg= " Vous devez choisir l'horaire de votre rendez-vous pour finaliser la procédure.";

            return view('test', [
                'tel' => $request->input('tel'),
                'ddn' => $request->input('ddn'),
                "msg" =>$msg
            ]);

        }

        $date  =  explode("/",  $request['date_voyage']);
        $date = $date[2] . '-'.$date[1].'-'.$date[0];

        $horaire = Horaire::where('date', '=', $date)
        ->where('horaire', '=',  $request->input('horaire') )
        ->where('Nature', '=',  $request->input('motif_test') )
        ->where('gsm', null)
        ->first();

        $horaire->gsm = $request->input('tel');

        $fiche_patient = new Fiche;

        $fiche_patient->nom = $request->input('nom');
        $fiche_patient->prenom = $request->input('prenom');
        $fiche_patient->ddn = $request->input('ddn');
        $fiche_patient->sexe = $request->input('sexe');
        $fiche_patient->adresse = $request->input('adresse');
        $fiche_patient->gsm = $request->input('tel');

        $fiche_patient->motif_test = $request->input('motif_test');

        $fiche_patient->email = $request->input('email');
        $fiche_patient->pays = $request->input('pays');
        $fiche_patient->billet = $request->input('billet');
        $fiche_patient->passport = $request->input('passport');

        $fiche_patient->date_rdv = $date. ' '.$horaire->horaire;

        $fiche_patient->horaire_id = $horaire->id;

        $fiche_patient->save();
        $horaire->save();

        $final = [$horaire, $fiche_patient];

        $message = '<br> <b> Date </b>: '.$date. ' <br> <b> Heure </b> : '. substr($horaire->horaire,0,5);


        $data['num_rdv'] = $fiche_patient->id;
        $data['saisie'] = $fiche_patient->created_at;
        $data['date_rdv'] = $request['date_voyage'];
        $data['heure_rdv'] = substr($horaire->horaire,0,5);
        $data['nom'] = $request->input('nom');
        $data['prenom'] = $request->input('prenom');
        $data['ddn'] = $request->input('ddn');
        $data['sexe'] = $request->input('sexe');
        $data['tel'] = $request->input('tel');
        $data['email'] = $request->input('email');
        $data['adresse'] = $request->input('adresse');

        $data['pays'] = $request->input('pays');
        $data['passport'] = $request->input('passport');
        $data['billet'] = $request->input('billet');

        $qrcode_msg = $data['nom'].' / '.$data['prenom'].' / '.$data['tel'].' / '.$data['date_rdv'].' / '.$data['heure_rdv'];
        $qrcode = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($qrcode_msg));
        $data['qrcode'] = $qrcode;

        if ($request->input('motif_test') != 'S') {
            $data['show_text'] = true;
        }else{
            $data['show_text'] = false;
        }

        if ($request->input('motif_test') == 'V' || $request->input('motif_test') == 'R') {
            $data['show_text_voyage'] = true;
        }else{
            $data['show_text_voyage'] = false;
        }

        $show_mail_message= false;

        $pdf = PDF::loadView('myPDF', $data);

        $pdf->stream();

        if($request->input('email') != ""){

            Mail::send([], [], function($message)use($data, $pdf) {
                $message
                        ->to($data['email'])
                        ->subject('Rendez-vous')
                        ->attachData($pdf->output(), "rendez-vous.pdf");
            });

            $show_mail_message= true;

        }

        return view('recu', [
            'message' => $message,
            'show_mail_message' =>$show_mail_message,
            'fiche' =>$fiche_patient
        ]);

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request) {

        $tel = $request->input('tel');
        $ddn = $request->input('ddn');

        $fiche_patient = Fiche::where([
            'gsm' => $tel])->first();

        $horaire = Horaire::where([
            'gsm' => $tel])->first();

            $data['num_rdv'] = $fiche_patient->id;
            $data['saisie'] = $fiche_patient->created_at;

            $dat = $horaire->date;
            $pieces = explode("-", $dat);
            // $h = substr($horaire->horaire,0,5);
            // $message = '<br> <b> Date </b>: '.$pieces[2].'/'.$pieces[1].'/'.$pieces[0]. ' <br> <b> Heure </b> : '.$h;

            $data['date_rdv'] = $pieces[2].'/'.$pieces[1].'/'.$pieces[0] ;
            $data['heure_rdv'] = substr($horaire->horaire,0,5);

            $data['nom'] = $fiche_patient->nom;
            $data['prenom'] = $fiche_patient->prenom;
            $data['ddn'] = $fiche_patient->ddn;
            $data['sexe'] = $fiche_patient->sexe;
            $data['tel'] = $request->input('tel');
            $data['email'] = $fiche_patient->email;
            $data['adresse'] = $fiche_patient->adresse;

            $data['pays'] = $fiche_patient->pays;
            $data['passport'] = $fiche_patient->passport;
            $data['billet'] = $fiche_patient->billet;

            $qrcode_msg = $data['nom'].' / '.$data['prenom'].' / '.$data['tel'].' / '.$data['date_rdv'].' / '.$data['heure_rdv'];
            $qrcode = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate($qrcode_msg));
            $data['qrcode'] = $qrcode;

            if ($fiche_patient->motif_test != 'S') {
                $data['show_text'] = true;
            }else{
                $data['show_text'] = false;
            }

            if ($fiche_patient->motif_test == 'V' || $fiche_patient->motif_test == 'R') {
                $data['show_text_voyage'] = true;
            }else{
                $data['show_text_voyage'] = false;
            }

            $show_mail_message= false;

        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download();

    }


    public function generateQrCode() {

        \QrCode::size(500)
                ->format('png')
                ->generate('codingdriver.com', public_path('images/qrcode.png'));

        return view('qr-code');
}

    //delete appoint
    public function annulerRdv(Request $request){

        $tel = $request->input('tel');
        $horaire = Horaire::where('gsm', $tel)->first();

        $fiche = Fiche::where('horaire_id',$horaire->id)->first();

        $horaire->gsm = null;
        $horaire->save();

        $fiche->delete();

        $message = "Rendez-vous annulé avec succés";

        return view('login', [
            'message' => $message
        ]);

    }
}