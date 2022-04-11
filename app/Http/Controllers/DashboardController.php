<?php

namespace App\Http\Controllers;

use App\Models\UserFavorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $favorite_movie = UserFavorites::leftJoin("movies", "user_favorites.movie_id", "=", "movies.id")
            ->where("user_favorites.user_id", "=", Auth::user()->id)
            ->get()
            ->first();

        $favorite_serie = UserFavorites::leftJoin("series", "user_favorites.serie_id", "=", "series.id")
            ->where("user_favorites.user_id", "=", Auth::user()->id)
            ->get()
            ->first();

        return view('dashboard', [
            'favorite_movie' => $favorite_movie,
            'favorite_serie' => $favorite_serie
        ]);
    }
}
