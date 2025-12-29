<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SoundController;
use App\Http\Controllers\API\PartController;
use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\BuildController;
use App\Http\Controllers\API\LeaderboardController;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Protected game/build actions
    Route::post('/game/submit', [GameController::class, 'submitScore']);
    Route::post('/builds', [BuildController::class, 'store']);
});

// Public
Route::get('/sounds', [SoundController::class, 'index']);
Route::get('/sounds/random', [SoundController::class, 'random']);
Route::get('/parts', [PartController::class, 'index']);
Route::get('/game/sound', [GameController::class, 'getSoundGame']);
Route::get('/builds', [BuildController::class, 'index']);
Route::get('/leaderboard/global', [LeaderboardController::class, 'global']);
Route::get('/leaderboard/{type}', [LeaderboardController::class, 'game']);
