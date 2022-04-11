<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFavorites;
use Illuminate\Support\Facades\Auth;

class UserFavoriteSerieController extends Controller
{
    public function selectFavoriteSerie(Request $request)
    {
        if (UserFavorites::where('user_id', Auth::user()->id)->get()->first()) {
            UserFavorites::where(
                'user_id',
                Auth::user()->id
            )->update([
                'serie_id' => $request['serie_id']
            ]);
            return redirect('series');
        };

        UserFavorites::create([
            'user_id' => Auth::user()->id,
            'serie_id' => $request['serie_id']
        ]);

        return redirect('series');
    }
}
