<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assurance;
use App\Models\Voiture;
use App\Models\image;
use App\Models\Visite;

class AssuranceController extends Controller
{
    public function pageEcheance()
    {
        return view('choix');
    }


    public function page()
    {
        $voitures = Voiture::all();
        return view('insertAssurance', [
            'voitures' => $voitures
        ]);
    }

    public function insertAssurance(Request $request)
    {
        $assurances = new Assurance();
        $assurances->nomAssurance = $request->nom;
        $assurances->dateFinA = $request->date;
        $assurances->voiture_id = $request->id;
        $assurances->save();
        dd('inserer');
    }

    public function list()
    {
        $voitures = Voiture::all();
        $assurances = Assurance::all();
        $visites = Visite::all();
        $images = Image::all();
        // dd($images[0]->nom);

        // foreach($images[0] as $image){
        //     dd($image->nom);
        // }

        // foreach ($voitures as $voitures) {
        //     dd($voitures->id);
        // }

        //     date_default_timezone_set('Africa/Nairobi');
        //     $year = date('Y');
        //     $month = date('m');
        //     $day = date('d');
        //     $date = "'".$year."-".$month."-".$day."'";


        //     $date = $assurance->dateFinA;
        //     $date = explode('-', $date);
        //     $annee= $date[0]-$year;
        //     $mois = $date[1]-$month;
        //     $jour =  $date[2]-$day;
        //     dd($annee + $mois + $jour);

        $couleur = array("vert","bleu");


        return view('listEcheance', [
            'assurances' => $assurances,
            'visites' => $visites,
            'voitures' => $voitures,
            'images' => $images
        ]);
    }

    public function lien()
    {
        $voitures = Voiture::all();
        $assurances = Assurance::all();
        $visites = Visite::all();

        // foreach ($voitures as $voiture) {
            foreach ($assurances as $assurance) {
                date_default_timezone_set('Africa/Nairobi');
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $date = "'".$year."-".$month."-".$day."'";


                $date = $assurance->dateFinA;
                $date = explode('-', $date);
                $annee= $date[0]-$year;
                 $mois = $date[1]-$month;
                 $jour =  $date[2]-$day;
                dd($annee + $mois + $jour );
            // }
        }


        // $obj = new DateTime();
        // $test = $obj->format("d-m-y");
        dd($day);
    }
}
