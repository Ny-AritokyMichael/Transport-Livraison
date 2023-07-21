<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VisiteTechnique;
use App\Models\Visite;
use App\Models\Voiture;

class VisiteTechniqueController extends Controller
{
    public function page(){
        $voitures = Voiture::all();
        return view('insertVisite',[
            'voitures' => $voitures
        ]);
    }

    public function insertVisite(Request $request){
        $visite = new Visite();
        $visite->dateFinV = $request->date;
        $visite->voiture_id = $request->id;
        $visite->save();
        dd('inserer');
    }
}
