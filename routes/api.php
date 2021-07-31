<?php

use App\Http\Controllers\CalcTekController;
use App\Http\Controllers\RequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// CalcTek Apis
Route::get('/calc-tek/evaluate', [CalcTekController::class, 'evaluate'])->name('calc_tek_evaluator')->middleware('request.logger');
Route::get('/calc-tek/requests', [RequestController::class, 'index']);
Route::delete('calc-tek/request/{id}', [RequestController::class, 'delete']);
Route::delete('calc-tek/requests', [RequestController::class, 'deleteAll']);