<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;
  
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
  
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/movies', [MovieController::class, 'index'])
->middleware(['auth:sanctum', 'verified'])->name('movies');

Route::post('/movies', [MovieController::class, 'index'])
->middleware(['auth:sanctum', 'verified'])->name('movies');


Route::get('/series', [SerieController::class, 'index'])
->middleware(['auth:sanctum', 'verified'])->name('series');

require_once __DIR__ . "/jetstream.php";

