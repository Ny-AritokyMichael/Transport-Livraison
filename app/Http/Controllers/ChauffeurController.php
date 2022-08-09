<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Voiture;
use App\Models\Carnet;

class ChauffeurController extends Controller
{
    public function logChauffeur(Request $request)
    {
        $email = trim($request->get('email'));
        $mdp = trim($request->get('mdp'));

        $chauffeurs = Chauffeur::All();



        // $chauffeurs = Chauffeur::query()
        //     ->where('emailChauffeur', '=', "{$email}")
        //     ->where('mdpChauffeur', '=', "{$mdp}")
        //     ->get();





        foreach ($chauffeurs as $chauffeur) {
            if ($email == $chauffeur->emailChauffeur && $mdp== $chauffeur->mdpChauffeur) {
                $voitures = Voiture::all();
                return view('acceuilChauffeur', [
                        'voitures' => $voitures,
                        'chauffeur' => $chauffeur
                    ]);
            } else {
                return view('erreur.erreurAdmin')->with('not access');
            }
        }
    }


    public function insertChauffeur(Request $request)
    {
        $chauffeurs = new Chauffeur();
        $chauffeurs->emailChauffeur = $request->email;
        $chauffeurs->mdpChauffeur = $request->mdp;
        $chauffeurs->nomChauffeur = $request->nom;
        $chauffeurs->cin = $request->cin;
        $chauffeurs->DateDeNaissance = $request->date;
        $chauffeurs->save();

        // dd('post inserer!');

        return view('index');
    }

    public function pageKilo(){
        $carnets = Carnet::all();
        return view('distance',[
            'carnets' => $carnets
        ]);
    }

    public function calcul(Request $request){
        $carnets = Carnet::all();


        $distance = $request->fin - $request->debut;
        // dd($distance);

        $temps = $distance/72;
        $moyenne = $distance/$temps;


        return view('vitesseMoyenne',[
            'moyenne' => $moyenne
        ]);
    }
}
