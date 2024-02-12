<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PlayerController;
use  App\Http\Controllers\api\StatisticController;
use App\Http\Controllers\api\BossController;
use App\Http\Controllers\api\ClubController;
use App\Http\Controllers\api\EmployeeController;
use  App\Http\Controllers\api\SportController;
use App\Http\Controllers\api\MatcheController;
use App\Http\Controllers\api\ReplacmentController;
use App\Http\Controllers\api\StandingController;
use App\Http\Controllers\api\WearController;
use App\Models\Replacment;

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
Route::prefix('/boss')->group(function () {
    Route::get('/view', [BossController::class, 'index'])->name('boss.index');
    Route::get('/show/{id}', [BossController::class, 'show'])->name('boss.show');
});
Route::prefix('/player')->group(function () {
    Route::get('/view', [PlayerController::class, 'index'])->name('player.index');
    Route::get('/show/{id}', [PlayerController::class, 'show'])->name('player.show');
});
Route::prefix('/statistic')->group(function () {
    Route::get('/view', [StatisticController::class, 'index'])->name('statistic.index');
    Route::get('/show/{id}', [StatisticController::class, 'show'])->name('statistic.show');
});
Route::prefix('/sport')->group(function () {
    Route::get('/view', [SportController::class, 'index'])->name('sport.index');
    Route::get('/show/{id}', [SportController::class, 'show'])->name('sport.show');
});
Route::prefix('/match')->group(function () {
    Route::get('/view', [MatcheController::class, 'index'])->name('match.index');
    Route::get('/show/{id}', [MatcheController::class, 'show'])->name('match.show');
});

// Rout for Wear :
Route::prefix('/wear')->group(function () {
    Route::get('/view', [WearController::class, 'index'])->name('wear.index');
    // Route::get('/show/{id}', [MatcheController::class, 'show'])->name('match.show');
});

// -----  Rout for employee :  ------
Route::prefix('/employee')->group(function () {
    Route::get('/view', [EmployeeController::class, 'index'])->name('employee.index');
    // Route::get('/show/{id}', [MatcheController::class, 'show'])->name('match.show');
});

// -----  Rout for STANDING :  ------
Route::prefix('/standing')->group(function () {

    Route::get('/view/{id}', [StandingController::class, 'show'])->name('standing.show');

    Route::get('/position/{name}', [StandingController::class, 'getClubPosition'])
        ->name('standing.getClubPosition');
});


// -----  Rout for replacment :  ------
Route::prefix('/replacment')->group(function () {
    Route::get('/view', [ReplacmentController::class, 'index'])->name('replacment.index');
    // Route::get('/show/{id}', [MatcheController::class, 'show'])->name('match.show');
});

// -----  Rout for clubs :  ------
Route::prefix('/club')->group(function () {
    Route::get('/view/{uuid}', [ClubController::class, 'show'])->name('club.show');
    // Route::get('/show/{id}', [MatcheController::class, 'show'])->name('match.show');
});
