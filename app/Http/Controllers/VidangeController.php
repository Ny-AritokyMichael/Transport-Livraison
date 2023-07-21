<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Voiture;
use App\Models\Vidange;

class VidangeController extends Controller
{
    public function page(){
        return view('admin.choix');
    }

    public function pageV(){
        $voitures = Voiture::all();
        return view('admin.vidange',[
            'voitures' => $voitures
        ]);
    }



    public function insert(Request $request){
        $vidanges = new Vidange();
        $vidanges->km = $request->km;
        $vidanges->dateV = $request->dateV;
        $vidanges->voiture_id = $request->id;
        $vidanges->save();

        // dd('inserer');
        return back();
    }
}
