<?php

use App\Http\Controllers\api\AssociationController;
use App\Http\Controllers\api\PlanController;
use App\Http\Controllers\api\PrimController;
use App\Http\Controllers\api\top_fansController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PlayerController;
use  App\Http\Controllers\api\StatisticController;
use App\Http\Controllers\api\BossController;
use  App\Http\Controllers\api\SportController;
use App\Http\Controllers\api\MatcheController;
use App\Http\Controllers\api\InformationController;

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
Route::prefix('/boss')->group(function () {
    Route::get('/view',[BossController::class,'index'])->name('boss.index');
    Route::get('/show/{id}',[BossController::class,'show'])->name('boss.show');
    });
Route::prefix('/player')->group(function () {
     Route::get('/view',[PlayerController::class,'index'])->name('player.index');
     Route::get('/show/{uuid}',[PlayerController::class,'show'])->name('player.show');
    });
Route::prefix('/statistic')->group(function () {
  //  Route::get('/show/{uuid}',[StatisticController::class,'show'])->name('statistic.show');
    });
Route::prefix('/sport')->group(function () {
    Route::get('/view',[SportController::class,'index'])->name('sport.index');
    });
    Route::prefix('/information')->group(function () {
        Route::get('/view',[InformationController::class,'index'])->name('information.index');
        Route::get('/RecentlyNews',[InformationController::class,'RecentlyNews'])->name('RecentlyNews');
        Route::get('/RecentlyaddedNews',[InformationController::class,'RecentlyaddedNews'])->name('RecentlyaddedNews');
        });
Route::prefix('/match')->group(function () {
    Route::get('/view',[MatcheController::class,'index'])->name('match.index');
    Route::get('/show/{uuid}',[MatcheController::class,'show'])->name('match.show');
    Route::get('/showMatch/{uuid}',[MatcheController::class,'showMatch'])->name('showMatch');
    Route::get('/currentMatch',[MatcheController::class,'currentMatch'])->name('currentMatch');
    Route::get('/MatchDate/{date}',[MatcheController::class,'MatchDate'])->name('MatchDate');
    Route::get('/newPage/{uuid}',[MatcheController::class,'newPage'])->name('newPage');
    Route::get('/Date',[MatcheController::class,'Date'])->name('Date');
    
    });

