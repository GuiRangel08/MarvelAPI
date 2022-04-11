<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Models\UserFavorites;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function index()
    {
        try {
            $movies = UserFavorites::selectRaw("movies.name, count(user_favorites.movie_id) as total_votes_movie")
                ->leftJoin("movies", function ($join) {
                    $join->on("movies.id", "=", "user_favorites.movie_id");
                })
                ->groupBy("user_favorites.movie_id")
                ->get();

            $series = UserFavorites::selectRaw("series.name, count(user_favorites.serie_id) as total_votes_serie")
                ->leftJoin("series", function ($join) {
                    $join->on("series.id", "=", "user_favorites.serie_id");
                })
                ->groupBy("user_favorites.serie_id")
                ->get();

            return [
                "movies" => $movies,
                "series" => $series
            ];
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não possui dados!'], 404);
        }
    }

    public function topRatedMovie()
    {
        try {
            return UserFavorites::selectRaw("movies.name, count(user_favorites.movie_id) as total_votes_movie")
                ->rightJoin("movies", function ($join) {
                    $join->on("movies.id", "=", "user_favorites.movie_id");
                })
                ->groupBy("movies.id")
                ->orderBy("total_votes_movie", "desc")
                ->get()->first();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não possui dados!'], 404);
        }
    }

    public function leastRatedMovie()
    {
        try {
            return UserFavorites::selectRaw("movies.name, count(user_favorites.movie_id) as total_votes_movie")
                ->rightJoin("movies", function ($join) {
                    $join->on("movies.id", "=", "user_favorites.movie_id");
                })
                ->groupBy("movies.id")
                ->orderBy("total_votes_movie", "asc")
                ->get()->first();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não possui dados!'], 404);
        }
    }

    public function topRatedSerie()
    {
        try {
            return UserFavorites::selectRaw("series.name, count(user_favorites.serie_id) as total_votes_serie")
                ->rightJoin("series", function ($join) {
                    $join->on("series.id", "=", "user_favorites.serie_id");
                })
                ->groupBy("series.id")
                ->orderBy("total_votes_serie", "desc")
                ->get()->first();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não possui dados!'], 404);
        }
    }

    public function leastRatedSerie()
    {
        try {
            return UserFavorites::selectRaw("series.name, count(user_favorites.serie_id) as total_votes_serie")
                ->rightJoin("series", function ($join) {
                    $join->on("series.id", "=", "user_favorites.serie_id");
                })
                ->groupBy("series.id")
                ->orderBy("total_votes_serie", "asc")
                ->get()->first();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não possui dados!'], 404);
        }
    }
}
