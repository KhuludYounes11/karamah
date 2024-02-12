<?php

use App\Http\Controllers\api\AssociationController;
use App\Http\Controllers\api\PlanController;
use App\Http\Controllers\api\PrimController;
use App\Http\Controllers\api\top_fansController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php


Route::get('/associations', [AssociationController::class, 'index']);
Route::get('/associations/{uuid}', [AssociationController::class, 'show']);
Route::post('/associations', [AssociationController::class, 'store']);
Route::post('/associations/update/{uuid}', [AssociationController::class, 'update']);
Route::get('/associations/delete/{uuid}', [AssociationController::class, 'destroy']);



Route::get('/primes', [PrimController::class, 'index']);
Route::get('/prims/{uuid}', [PrimController::class, 'show']);




Route::get('/plans/{matche_id}', [PlanController::class, 'show']);



Route::get('/top-fans', [top_fansController::class, 'index']);
Route::get('/top-fans/{uuid}', [top_fansController::class, 'show']);