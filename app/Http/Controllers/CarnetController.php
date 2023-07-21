<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Models\Carnet;
use App\Models\Voiture;
use App\Models\Type;
use App\Models\Chauffeur;
use App\Models\Assurance;
use App\Models\Image;
use App\Models\Visite;
use Mpdf\Mpdf;

class CarnetController extends Controller
{
    public function trajet()
    {
        $voitures = Voiture::all();
        $chauffeurs = Voiture::all();

        return view('acceuilChauffeur', [
                        'voitures' => $voitures,
                        'chauffeur' => $chauffeur
                    ]);
    }
    public function liste()
    {
        $carnets = Carnet::all();
        $voitures = Voiture::all();
        $types = Type::all();
        $chauffeurs = Chauffeur::all();

        return view('admin.listeTrajet', [
        'voitures' => $voitures,
        'chauffeurs' => $chauffeurs,
        'types' => $types,
        'carnets' => $carnets
    ]);
    }

    public function insertTrajet(Request $request, $id)
    {

        $voitures = Voiture::all();
        $assurances = Assurance::all();
        $visites = Visite::all();
        $images = Image::all();

        $carnet = new Carnet();
        $carnet->lieuTrajet = $request->lieu;
        $carnet->typeTrajet = $request->type;

        $carnets = Carnet::query()
        ->where('voiture_id','=',"{$request->idV}")
        ->max('debutKilometrage');

        $carnets = Carnet::query()
        ->where('voiture_id','=',"{$request->idV}")
        ->max('debutKilometrage');

        if($carnets < $request->kilo){
            $carnet->debutKilometrage = $request->kilo;
        }else{
            return view('erreur.erreurKilo');
        }
        $carnet->dateDepart = $request->date;
        $carnet->heureDepart = $request->heure;
        $carnet->montantCarburant = $request->montant;
        $carnet->quantiteCarburant = $request->quantite;
        $carnet->motif = $request->motif;
        $carnet->chauffeur_id = $id;
        $carnet->voiture_id = $request->idV;
        $carnet->save();

        // dd('post inserer!');

        return view('listEcheance',[
            'assurances' => $assurances,
            'visites' => $visites,
            'voitures' => $voitures,
            'images' => $images
        ]);
    }

    public function destroy($id)
    {
        $carnets = Carnet::findOrFail($id);

        // dd($voitures);
        $carnets->delete();

        $carnets = Carnet::all();
        $voitures = Voiture::all();
        $types = Type::all();
        $chauffeurs = Chauffeur::all();

        return view('admin.listeTrajet', [
            'voitures' => $voitures,
            'chauffeurs' => $chauffeurs,
            'types' => $types,
            'carnets' => $carnets
        ]);
    }

    public function generate(){
        $carnets = Carnet::all();
        $voitures = Voiture::all();
        $types = Type::all();
        $chauffeurs = Chauffeur::all();


        $filename = 'TousLesTrajets.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 1,
            'margin_right' => 1,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $html = \View::make('admin.pdf.demo',compact([
                'carnets','voitures','types','chauffeurs'
            ]))->with([
                'carnets','voitures','types','chauffeurs'
        ]);

        $html = $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,'I');

        // return view('pdf.demo',compact([
        //     'voitures','pointages'
        // ]));
    }

    public function stat(){
        return view('admin.stat');
    }
}
