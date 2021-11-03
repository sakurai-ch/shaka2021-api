<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\ResultsController;


Route::post('/register', [RegisterController::class, 'post']);
Route::get('/flights', [FlightsController::class, 'get']);
Route::post('/flights', [FlightsController::class, 'post']);
Route::get('/results', [ResultsController::class, 'get']);
Route::post('/results', [ResultsController::class, 'post']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
