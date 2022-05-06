<?php

use App\Http\Controllers\PraticienController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\medicamentController;
use App\Http\Controllers\VisiteurController;

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

// Main Route
Route::get('/', function () {
    return view('login');
})->name('login');


// Rapport Route
Route::get('rapport', [RapportController::class, 'getFirst'])->name('getFirst')->middleware('checkUserAuth');
Route::get('rapport/{id}', [RapportController::class, 'getByID'])->name('rapportByID')->middleware('checkUserAuth');
Route::post('changeRapport', [RapportController::class, 'selectByID'])->name('changeRap')->middleware('checkUserAuth');
Route::post('addRap', [RapportController::class, 'addRap'])->name('addRap')->middleware('checkUserAuth');

// Medoc Route
Route::get('medicaments',[medicamentController::class,'getAll'])->name('medicaments')->middleware('checkUserAuth');
Route::get('medicamentbyID',[medicamentController::class,'getByID'])->name('medicamentByID')->middleware('checkUserAuth');


// Visiteur Route
Route::get('infovisiteur', [VisiteurController::class, 'getInfoVisiteur'])->name('infovisiteur')->middleware('checkUserAuth');
Route::post('updateinfoVisiteur', [VisiteurController::class, 'updateInfoVisiteur'])->name('updateinfoVisiteur')->middleware('checkUserAuth');

// Loging Logout
Route::post('checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Web Services
// Call medicament getAllWS
Route::get('getAllMedicaments', [medicamentController::class, 'getAllWS']);
Route::get('getMedicamentByID/{id}', [medicamentController::class,'getByIdWS']);
Route::get('getAllPraticiens', [PraticienController::class, 'getAllWS']);
Route::get('getPraticienByID/{id}', [PraticienController::class,'getByIdWS']);
Route::get('getAllRapports', [RapportController::class, 'getAllWS']);
Route::get('getRapportByID/{id}', [RapportController::class,'getByIdWS']);
