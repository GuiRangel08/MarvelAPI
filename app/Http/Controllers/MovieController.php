<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        return view('movies', [
            'movies' => Movie::all()
        ]);
    }

    public function store(Request $request)
    {
        Movie::create([
            'name' => $request->name,
            'release_date' => date("Y-m-d", strtotime($request->date))
        ]);
    }
}
