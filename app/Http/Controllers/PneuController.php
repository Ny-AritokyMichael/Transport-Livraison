<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Voiture;
use App\Models\Pneu;

class PneuController extends Controller
{
    public function pageP(){
        $voitures = Voiture::all();
        return view('admin.pneu',[
            'voitures' => $voitures
        ]);
    }


    public function insert(Request $request){
        $pneus = new Pneu();
        $pneus->km = $request->km;
        $pneus->dateP = $request->dateP;
        $pneus->voiture_id = $request->id;
        $pneus->save();
        return back();
    }
}
