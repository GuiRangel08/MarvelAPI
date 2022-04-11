<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserFavoriteMovieController;
use App\Http\Controllers\UserFavoriteSerieController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth:sanctum', 'verified'])->name('dashboard');


Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/movies', [MovieController::class, 'index'])
    ->middleware(['auth:sanctum', 'verified'])->name('movies');

Route::post('/user-favorite-movie', [UserFavoriteMovieController::class, 'selectFavoriteMovie'])
    ->middleware(['auth:sanctum', 'verified'])->name('user-favorite-movie');

Route::post('/user-favorite-serie', [UserFavoriteSerieController::class, 'selectFavoriteSerie'])
    ->middleware(['auth:sanctum', 'verified'])->name('user-favorite-serie');

Route::get('/series', [SerieController::class, 'index'])
    ->middleware(['auth:sanctum', 'verified'])->name('series');


Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

require_once __DIR__ . "/jetstream.php";
