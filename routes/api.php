<?php

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

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::prefix('team')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/list', [App\Http\Controllers\Team\GetTeamsController::class, 'index']);
        Route::post('create', [App\Http\Controllers\Team\CreateTeamController::class, 'index']);
        Route::put('{id}/update', [App\Http\Controllers\Team\UpdateTeamController::class, 'index']);
        Route::delete('/{id}/delete', [App\Http\Controllers\Team\DeleteTeamController::class, 'index']);
    });

Route::prefix('player')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('create', [App\Http\Controllers\Player\CreatePlayerController::class, 'index']);
        Route::get('/list', [App\Http\Controllers\Player\GetPlayersController::class, 'index']);
        Route::put('/{id}/update', [App\Http\Controllers\Player\UpdatePlayerController::class, 'index']);
        Route::delete('/{id}/delete', [App\Http\Controllers\Player\DeletePlayerController::class, 'index']);
    });

Route::prefix('match')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/list', [App\Http\Controllers\Match\GetMatchesController::class, 'index']);
        Route::post('/create', [App\Http\Controllers\Match\CreateMatchController::class, 'index']);
        Route::put('/{id}/update', [App\Http\Controllers\Match\UpdateMatchController::class, 'index']);
        Route::delete('/{id}/delete', [App\Http\Controllers\Match\DeleteMatchController::class, 'index']);
    });

Route::prefix('rating')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Rating\RatingController::class, 'index']);
    });
