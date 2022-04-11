<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFavorites;
use Illuminate\Support\Facades\Auth;

class UserFavoriteMovieController extends Controller
{
    public function selectFavoriteMovie(Request $request)
    {
        if (UserFavorites::where('user_id', Auth::user()->id)->get()->first()) {
            UserFavorites::where(
                'user_id',
                Auth::user()->id
            )->update([
                'movie_id' => $request['movie_id']
            ]);
            return redirect('movies');
        };

        UserFavorites::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $request['movie_id']
        ]);

        return redirect('movies');
    }
}
