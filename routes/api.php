<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicamentController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\RapportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('medicamentsWS', medicamentController::class)->middleware('auth:api');

Route::apiResource('praticiensWS', PraticienController::class)->middleware('auth:api');
Route::apiResource('rapportsWS', RapportController::class)->middleware('auth:api');
