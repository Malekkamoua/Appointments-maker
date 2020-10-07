<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Horaire;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {

        $message = "";

        return view('login', [
            'message' => $message
        ]);
    }

    public function Fiche() {
        
        return view('rendez_vous');
    }

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

        return view('rendez_vous_create', [
            'tel' => $tel,
            'ddn' => $ddn
        ]);
    }

    public function storeFiche(Request $request) {

        $horaire = Horaire::where('gsm',$request->input('tel'))->first();

        if ($horaire != null) {

            $fiche_patient = Fiche::where('horaire_id', $horaire->id);

        }else {

            $fiche_patient = new Fiche;
            
        }
            $fiche_patient->nom = $request->input('nom');
            $fiche_patient->prenom = $request->input('prenom');
            $fiche_patient->sexe = $request->input('sexe');
            $fiche_patient->ddn = $request->input('ddn');
            $fiche_patient->adresse = $request->input('adresse');
            $fiche_patient->gsm = $request->input('tel');

            $fiche_patient->email = $request->input('email');

            $fiche_patient->motif_test = $request->input('motif_test');
            $fiche_patient->date_voyage = $request->input('date_voyage');
            $fiche_patient->pays = $request->input('pays');

            if ($request->input('motif_test') == 'voyage') {

                $d = $request->input('date_voyage');

                $pieces = explode("-", $d);
                

                $date_voyage = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);
                $date_voyage->toDateString();

                $date = $date_voyage;

                //voir disponibilité initiale de la date
                $date_dispo_init = Horaire::where('date', '<=', $date)->where('gsm', null)->orderBy('id', 'DESC')->first();

                if($date_dispo_init == null ) {

                    $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]);                
                }

                //enlever les tirets
                $pieces = explode("-", $date_dispo_init->date);

                // format actuel {"message":["2020","09","16"]}
                $date_dispo_init = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);

                //Soustraire deux jours et verifier la disponibilité à nouveau
                $date_dispo_init->subDays(2);
                $date_dispo_init->toDateString();

                $date_dispo =  Horaire::where('date', '>=', $date_dispo_init->toDateString())->where('gsm', null)->orderBy('date', 'ASC')
                ->orderBy('horaire', 'ASC')
                ->first();

                if($date_dispo == null ) {

                    $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]);                
                }

                $date_dispo_rech = $date_dispo;
                // converting date to carbon object to use the lte()
                $pieces = explode("-", $date_dispo->date);
                $date_dispo = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);


                if($date_dispo == null || $date_dispo->lte(Carbon::today()) ) {

                    $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]);                
                }


                if ($horaire != null) // this variable refer to horaire line 64 for update methode.
                {
                    $horaire_patient = Horaire::where([
                        'gsm' => $request->input('tel'),
                        'date' =>$date_dispo_rech->date
                    ])->first();
                    
                    $message = 'Un rendez-vous ancien est déja enregistré avec ce numéro de téléphone. Connectez-vous avec votre numéro et date de naissance pour savoir votre date exacte';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]); 

                }else {
                    $horaire_patient = Horaire::where([
                        'gsm' => null,
                        'date' =>$date_dispo_rech->date
                    ])->first();
                
                    if ($horaire_patient == null) {
                
                        $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                        return view('recu', [
                            'message' => $message,
                            'fiche' =>null
                        ]); 
                    } 
                }
                
                $horaire_patient->gsm = $request->input('tel');
                $horaire_patient->save();

                $fiche_patient->horaire_id = $horaire_patient->id;
                $fiche_patient->date_rdv = $horaire_patient->date. ' '.$horaire_patient->horaire;
                $fiche_patient->save();

                $dat = $horaire_patient->date;                
                $pieces = explode("-", $dat);
                $h = substr($horaire_patient->horaire,0,5); 

                $message = '<br> <b> Date </b>: '.$pieces[2].'/'.$pieces[1].'/'.$pieces[0]. ' <br> <b> Heure </b> : '.$h;

                return view('recu', [
                    'message' => $message,
                    'fiche' =>$fiche_patient
                ]);

            }
            
            else{

                $date = Carbon::today()->toDateString();

                //voir disponibilité initiale de la date
                $date_dispo_init = Horaire::where('date', '>=', $date)->where('gsm', null)->orderBy('date', 'ASC')
                ->orderBy('horaire', 'ASC')
                ->first();

               

                if($date_dispo_init == null ) {

                    $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]);                
                }

                //enlever les tirets
                $pieces = explode("-", $date_dispo_init->date);

                // format actuel {"message":["2020","09","16"]}
                $date_dispo_init = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);

                //Soustraire deux jours et verifier la disponibilité à nouveau
                $date_dispo_init->toDateString();
                
                $date_to_string = $date_dispo_init->toDateString();

                $date_dispo =  Horaire::where('date', '>=', $date_to_string)->where('gsm', null)->orderBy('date', 'ASC')
                ->orderBy('horaire', 'ASC')
                ->first();


                $pieces = explode("-", $date_dispo->date);

                $date_dispo_rech = $date_dispo;

                // format actuel {"message":["2020","09","16"]}
                $date_dispo = Carbon::createFromDate($pieces[0], $pieces[1], $pieces[2]);

                if($date_dispo == null || $date_dispo->lte(Carbon::today()) ) {

                    $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]);                
                }

                if ($horaire != null) // this variable refer to horaire line 64 for update methode.
                {
                    $horaire_patient = Horaire::where([
                        'gsm' => $request->input('tel'),
                        'date' =>$date_dispo_rech->date
                    ])->first();
                    
                    $message = 'Un rendez-vous ancien est déja enregistré avec ce numéro de téléphone. Connectez-vous avec votre numéro et date de naissance pour savoir votre date exacte';

                    return view('recu', [
                        'message' => $message,
                        'fiche' =>null
                    ]); 

                }else {
                    $horaire_patient = Horaire::where([
                        'gsm' => null,
                        'date' =>$date_dispo_rech->date
                    ])->first();
                
                    if ($horaire_patient == null) {
                
                        $message = 'Aucune date n\'est disponible pour l\'instant. Veuillez appeler le 23 707 465 . ';

                        return view('recu', [
                            'message' => $message,
                            'fiche' =>null
                        ]); 
                    } 
                }
                
                $horaire_patient->gsm = $request->input('tel');
                $horaire_patient->save();

                $fiche_patient->horaire_id = $horaire_patient->id;
                $fiche_patient->date_rdv= $horaire_patient->date. ' '.$horaire_patient->horaire;
                $fiche_patient->save();


                $dat = $horaire_patient->date;                
                $pieces = explode("-", $dat);
                $h = substr($horaire_patient->horaire,0,5); 

                $message = '<br> <b> Date </b>: '.$pieces[2].'/'.$pieces[1].'/'.$pieces[0]. ' <br> <b> Heure </b> : '.$h;


                return view('recu', [
                    'message' => $message,
                    'fiche' =>$fiche_patient
                ]);

            }
        
    }


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