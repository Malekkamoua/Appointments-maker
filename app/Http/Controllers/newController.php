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
            'gsm' => $tel])->first();

        if ($fiche != null) {
            if ($fiche->ddn != $ddn) {

                $message = "Accés interdit. Veuillez verifier vos coordonnées.";

                return view('login', [
                    'message' => $message
                ]);
            }
        }

        $horaire = Horaire::where('gsm',$tel)->first();

        if ($horaire != null) {

            $fiche = Fiche::where([
                'ddn' => $ddn,
                'horaire_id' => $horaire->id
            ])->first();

            if ($fiche != null) {


                $dat = $horaire->date;
                $pieces = explode("-", $dat);
                $h = substr($horaire->horaire,0,5);

                $message = '<br> <b> Date </b>: '.$pieces[2].'/'.$pieces[1].'/'.$pieces[0]. ' <br> <b> Heure </b> : '.$h;

                return view('recu', [
                    'fiche' =>$fiche,
                    'message' => $message,
                ]);
            }
        }

        return view('test', [
            'tel' => $tel,
            'ddn' => $ddn
        ]);
    }

    public function storeFiche(Request $request){

        $date  =  explode("/",  $request['date_voyage']);
        $date = $date[2] . '-'.$date[0].'-'.$date[1];

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

        $fiche_patient->date_rdv = $date;

        $fiche_patient->horaire_id = $horaire->id;

        $fiche_patient->save();
        $horaire->save();

        $final = [$horaire, $fiche_patient];

        $message = '<br> <b> Date </b>: '.$date. ' <br> <b> Heure </b> : '.$horaire->horaire;


        $data['num_rdv'] = $fiche_patient->id;
        $data['saisie'] = $fiche_patient->created_at;
        $data['date_rdv'] = $horaire->date ;
        $data['heure_rdv'] = $horaire->horaire;

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

        if ($request->input('motif_test') == 'V' || $request->input('motif_test') == 'A') {
            $data['show_text'] = true;
        }else{
            $data['show_text'] = false;
        }

        if ($request->input('motif_test') == 'V' || $request->input('motif_test') == 'R') {
            $data['show_text_voyage'] = true;
        }else{
            $data['show_text_voyage'] = false;
        }

        $pdf = PDF::loadView('myPDF', $data);

        $pdf->stream();

        if($request->input('email') != ""){

            Mail::send([], [], function($message)use($data, $pdf) {
                $message
                        ->to($data['email'])
                        ->subject('Rendez-vous')
                        ->attachData($pdf->output(), "render-vous.pdf");
            });
        }

        return view('recu', [
            'message' => $message,
            'fiche' =>$fiche_patient
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data["email"] = "aatmaninfotech@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        // $pdf = PDF::loadView('myPDF');

        // Mail::send('myPDF', $data, function($message)use($data, $pdf) {
        //     $message->to('malekkamoua50@gmail.com', 'malekkamoua50@gmail.com')
        //             ->subject('Rendez-vous')
        //             ->attachData($pdf->output(), "render-vous.pdf");
        // });

        // dd('Mail sent successfully');
        $qrcode = base64_encode(QrCode::format('svg')->size(80)->errorCorrection('H')->generate('Hello world !'));
        $pdf = PDF::loadView('myPDF', compact('qrcode'));
        return $pdf->stream();

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
