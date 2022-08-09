<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\VisiteTechniqueController;
use App\Http\Controllers\VidangeController;
use App\Http\Controllers\PneuController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TrajetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// Auth::routes();

Route::post('/test', [AdminController::class, 'test'])->name('index');

Route::post('/AdminLog', [AdminController::class, 'logAdmin'])->name('logAdmin');

Route::get('/deconnexion', [AdminController::class, 'deconnexion'])->name('deconnexion');

Route::get('/ListeVoiture@admin', [VoitureController::class, 'listVoiture'])->name('listVoiture');
Route::get('/pageVoiture@', [VoitureController::class ,'page'])->name('pageVoiture');
Route::post('/insertionVoiture', [VoitureController::class ,'insertVoiture'])->name('insert');
Route::get('/voiture@supp/{id}', [VoitureController::class ,'destroy'])->name('voiture.destroy');
Route::get('/voiture@dispo', [VoitureController::class ,'listDispo'])->name('pageDispo');
Route::get('/dispo/{id}', [VoitureController::class ,'pageDispo'])->name('dispo');

Route::get('/voiture@Info/{id}', [VoitureController::class ,'info'])->name('info');

Route::post('/Log@Chauffeur', [ChauffeurController::class, 'logChauffeur'])->name('logChauffeur');
// Route::get('/pageVoiture@', [ChauffeurController::class ,'page'])->name('pageVoiture');
Route::post('/insertion@chaufffeur', [ChauffeurController::class ,'insertChauffeur'])->name('insertChauffeur');

Route::get('/page@kilo', [ChauffeurController::class ,'pageKilo'])->name('distance');
Route::post('/insertion@distance', [ChauffeurController::class ,'calcul'])->name('calcul');

// Route::get('/voiture@supp/{id}', [ChauffeurController::class ,'destroy'])->name('Chauffeur.destroy');



Route::post('/trajet@insert/{id}', [CarnetController::class ,'insertTrajet'])->name('insertTrajet');
Route::get('/ListTrajet@admin', [CarnetController::class, 'liste'])->name('liste');
Route::get('/tajetInsert@', [CarnetController::class, 'trajet'])->name('trajet');
Route::get('/trajet@supp/{id}', [CarnetController::class ,'destroy'])->name('trajet.destroy');
Route::get('/trajet@', [CarnetController::class ,'stat'])->name('stat');

Route::get('/echeance@Liste', [AssuranceController::class, 'list'])->name('listEcheance');
Route::get('/echeance@Chauffeur', [AssuranceController::class, 'pageEcheance'])->name('echeance');
Route::post('/Assurance@insert', [AssuranceController::class ,'insertAssurance'])->name('insertAssurance');
Route::get('/Assurance@Chauffeur', [AssuranceController::class, 'page'])->name('assurance');

Route::get('/lien', [AssuranceController::class, 'lien'])->name('lien');



Route::post('/Techniq@insert', [VisiteTechniqueController::class ,'insertVisite'])->name('insertVisite');
Route::get('/VisiteTechnique@Chaufeur', [VisiteTechniqueController::class, 'page'])->name('visite');


route::get('/pdf',[CarnetController::class,'generate'])->name('export');

Route::get('/Maintenance@', [VidangeController::class, 'page'])->name('maintenance');
Route::get('/Maintenance@page', [VidangeController::class, 'pageV'])->name('vidange');
Route::post('/Maintenance@insertV', [VidangeController::class, 'insert'])->name('insertVidange');

Route::get('/Maintenance@PAGE', [PneuController::class, 'pageP'])->name('pneu');
Route::post('/Maintenance@insertP', [PneuController::class, 'insert'])->name('insertPneu');


// Route::get('stock/add',[StockController::class, 'index'])->name('index1');
// Route::post('stock/add','StockController@store');

// Route::get('stocks','StockController@index');
// Route::get('stock/chart','StockController@chart');
// Route::get('stock/chart',[StockController::class, 'chart'])->name('chart');


Route::get('sary',[TrajetController::class, 'index'])->name('index');
Route::get('chart',[TrajetController::class, 'chart'])->name('chart');


Route::get('/csv',[TrajetController::class, 'exportExcel'])->name('excel');
Route::get('/export-excel',[TrajetController::class, 'exportCsv'])->name('csv');









// Route::post('/entrer@admin', [AdminController::class, 'verifierLog'])->name('validerLog');
// Route::get('/insertVoiture@admin', [AdminController::class, 'insertPointage'])->name('insertPointage');



// Route::get('/pointageVoiture/{id}', [PointageController::class ,'pointage'])->name('pointage');
// Route::post('/pointage@Voiture', [PointageController::class, 'insertPointage'])->name('insertPointage');
// Route::get('/pointage.delete/{id}', [PointageController::class ,'destroy'])->name('pointage.destroy');

// Route::get('/liste@pointage', [PointageController::class ,'listPointage'])->name('listPointage');
