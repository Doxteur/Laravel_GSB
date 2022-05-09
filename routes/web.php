<?php

use App\Http\Controllers\PraticienController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logsController;
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
Route::post('deleteRap', [RapportController::class, 'deleteRap'])->name('deleteRap')->middleware('checkUserAuth');
Route::post('modifRap', [RapportController::class, 'modifRap'])->name('modifRap')->middleware('checkUserAuth');

// Medoc Route
Route::get('medicaments',[medicamentController::class,'getAll'])->name('medicaments')->middleware('checkUserAuth');
Route::get('medicamentbyID',[medicamentController::class,'getByID'])->name('medicamentByID')->middleware('checkUserAuth');


// Visiteur Route
Route::get('infovisiteur', [VisiteurController::class, 'getInfoVisiteur'])->name('infovisiteur')->middleware('checkUserAuth');
Route::post('updateinfoVisiteur', [VisiteurController::class, 'updateInfoVisiteur'])->name('updateinfoVisiteur')->middleware('checkUserAuth');

// Loging Logout
Route::post('checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Partie logs
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('logs',[logsController::class, 'getlogs'])->name('logs')->middleware('checkUserAuth');
Route::post('logs',[logsController::class, 'getlogsbymonth'])->name('getlogsbymonth')->middleware('checkUserAuth');
Route::get('allLogs',[logsController::class, 'allLogs'])->name('allLogs')->middleware('checkUserAuth');

// Route::get('testlogs',[logsController::class, 'testLogs'])->name('testlogs')->middleware('checkUserAuth');

// Web Services
// Call medicament getAllWS
Route::get('getAllMedicaments', [medicamentController::class, 'getAllWS']);
Route::get('getMedicamentByID/{id}', [medicamentController::class,'getByIdWS']);
Route::get('getAllPraticiens', [PraticienController::class, 'getAllWS']);
Route::get('getPraticienByID/{id}', [PraticienController::class,'getByIdWS']);
Route::get('getAllRapports', [RapportController::class, 'getAllWS']);
Route::get('getRapportByID/{id}', [RapportController::class,'getByIdWS']);
