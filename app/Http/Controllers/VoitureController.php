<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Voiture;
use App\Models\Carnet;
use App\Models\Chauffeur;
use App\Models\Vidange;
use App\Models\Dispo;
use App\Models\Pneu;

class VoitureController extends Controller
{
    public function pageDispo($id)
    {

        // dd($id);
        $voitures = Voiture::all();
        $types = Type::all();
        $chauffeurs = Chauffeur::all();
        $carnets = Carnet::all();

        $carnets = Carnet::select('typeTrajet', 'dateDepart')
        ->where('voiture_id', "{$id}")
        ->orderby('dateDepart', 'desc')
        ->first();

        $total = 0;
        $jourRest = 0;


        if ($carnets->typeTrajet == 'retour') {
            date_default_timezone_set('Africa/Nairobi');
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $date = $year."-".$month."-".$day;

            $dateFin = $carnets->dateDepart;


            $dateDebut = date_create($date);
            $dateFin = date_create($dateFin);

            $jourRest  = date_diff($dateDebut, $dateFin);
            $total = $jourRest->format("%R%a");

        } else {
            $dispo = Dispo::query()
            ->where('voiture_id', '=', "{$id}")
            ->update([
                'type' => 'non-Disponible',
                'voiture_id' => $id
            ]);
        }
        $voitures = Voiture::find($id);
        // dd($total);

        return view('admin.dispo', [
                    'voitures' => $voitures,
                    'carnets' => $carnets,
                    'chauffeurs' => $chauffeurs,
                    'total' => $total
                ]);
    }

    public function listDispo(){
        $dispos = Dispo::all();
        $voitures = Voiture::all();

        $dispos = db::table('disponible')
        ->where('type', '=', 'disponible')
        ->get();

        // dd($dispos);

        return view('admin.dispos', [
            'voitures' => $voitures,
            'dispos' => $dispos
       ]);



    }

    public function page()
    {
        $voitures = Voiture::all();
        $types = Type::all();

        return view('admin.insertVoiture', [
                'voitures' => $voitures,
                'types' => $types
            ]);
    }

    public function listVoiture()
    {
        $voitures = Voiture::all();
        $types = Type::all();
        $dispos = Dispo::all();

        //     foreach ($types as $types) {
        //         foreach($types->voitures as $voitures)
        //          dd($voitures->type);


        // }



        return view('admin.listVoiture', [
                'types' => $types,
                'voitures' => $voitures,
                'dispos' => $dispos
        ]);
    }

    public function insertVoiture(Request $request)
    {
        $voitures = new Voiture();
        $voitures->numero = $request->numero;
        $voitures->marque = $request->marque;
        $voitures->modele = $request->modele;
        $voitures->type_id = $request->type;
        $voitures->save();

        $voitures->latest()->first();

        $dispo = new Dispo();
        $dispo->type = 'disponible';
        $dispo->voiture_id = $voitures->id;
        $dispo->save();

        // dd('post inserer!');

        $voitures = Voiture::all();
        $types  = Type::all();
        $dispos  = Dispo::all();

        return view('admin.listVoiture', [
                'types' => $types,
                'voitures' => $voitures,
                'dispos' => $dispos,
        ]);
    }

    public function destroy($id)
    {
        $types = Type::all();
        $voitures = Voiture::findOrFail($id);

        // dd($voitures);
        $voitures->delete();

        $voitures = Voiture::all();

        return view('admin.listVoiture', [
                'types' => $types,
                'voitures' => $voitures
        ]);
    }

    public function info($id)
    {
        // $dateV = DB::table('vidanges')
        // ->where('voiture_id', "{$id}")
        // ->max('dateV');

        // $dateP = DB::table('pneus')
        // ->where('voiture_id', "{$id}")
        // ->max('dateP');

        date_default_timezone_set('Africa/Nairobi');
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $date = $year."-".$month."-".$day;

        $dateDebut = date_create($date);

        // $dateFin = date_create($dateV);
        // $dateFinP = date_create($dateP);




        // dd($dateDebut,$dateFin);

        $debutKilo = Carnet::select('debutKilometrage')
        ->where('voiture_id', "{$id}")
        ->min('debutKilometrage');


        // dd($debutKilo);

        $finKilo = Carnet::select('debutKilometrage')
        ->where('voiture_id', "{$id}")
        ->max('debutKilometrage');

        $distance = $finKilo - $debutKilo;

        $kmVi = DB::table('vidanges')
        ->where('voiture_id', "{$id}")
        ->orderby('dateV', 'desc')
        ->first();

        $kmV = $kmVi->km;


        $kmPn = Pneu::select('km')
        ->where('voiture_id', "{$id}")
        ->orderby('dateP', 'desc')
        ->first();


        $kmP = $kmPn->km;

        // dd($kmP);



        $vidangesRestant = $kmV  - $distance ;
        $pneusRestant = $kmP  - $distance ;
        // dd($pneusRestant);

        $vidanges = DB::table('vidanges')
        ->where('voiture_id', "{$id}")
        ->get();

        $pneus = DB::table('pneus')
        ->where('voiture_id', "{$id}")
        ->get();

        $voitures = DB::table('voitures')
        ->where('id', "{$id}")
        ->get();

        $rest = $pneusRestant - $vidangesRestant;
        // dd($rest);

        if ($vidangesRestant < $pneusRestant) {
        }

        // foreach ($voitures as $voiture) {
        //     dd($voiture->marque);
        // }



        // $Vidanges = Vidange::all();


        return view('admin.info', [
            'vidanges' => $vidanges,
            'restV' => $vidangesRestant,
            'restP' => $pneusRestant,
            'rest' => $rest,
            'kmV' => $kmV,
            'kmP' => $kmP,
            'voitures' => $voitures,
            'distance' => $distance
        ]);
    }
}
