<?php

use App\Http\Controllers\PraticienController;
use App\Http\Controllers\RapportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('login');
})->name('login');


// Route::get('rapports',[RapportController::class,'GetFirst'])->name('GetFirst');
// Route::get('rapport',[RapportController::class,'liste'])->name('liste');

Route::get('rapport',[RapportController::class,'getFirst'])->name('getFirst')->middleware('checkUserAuth');
Route::get('rapport/{id}',[RapportController::class,'getByID'])->name('rapportByID')->middleware('checkUserAuth');
Route::post('changeRapport',[RapportController::class,'selectByID'])->name('changeRap')->middleware('checkUserAuth');
Route::post('checkLogin',[LoginController::class,'checkLogin'])->name('checkLogin');
Route::get('logout',[LoginController::class,'logout'])->name('logout');




