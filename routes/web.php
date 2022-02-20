<?php

use App\Http\Controllers\PraticienController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

// Visiteur route
Route::get('infovisiteur', [VisiteurController::class, 'getInfoVisiteur'])->name('infovisiteur')->middleware('checkUserAuth');
Route::post('updateinfoVisiteur', [VisiteurController::class, 'updateInfoVisiteur'])->name('updateinfoVisiteur')->middleware('checkUserAuth');

// Loging Logout
Route::post('checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

