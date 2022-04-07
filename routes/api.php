<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\SerieController;

/***
 * 
 * Movie Section 
 * 
 ***/

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/movies', [MovieController::class, 'store']);
    Route::put('/movies/{id}', [MovieController::class, 'update']);
    Route::delete('/movies/{id}', [MovieController::class, 'destroy']);
});

/***
 * 
 * Series Section 
 * 
 ***/
Route::get('/series', [SerieController::class, 'index']);
Route::get('/series/{id}', [SerieController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/series', [SerieController::class, 'store']);
    Route::put('/series/{id}', [SerieController::class, 'update']);
    Route::delete('/series/{id}', [SerieController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

