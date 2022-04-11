<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies');
    }

    public function getAllMovies()
    {
        return Movie::all();
    }


    public function store(Request $request)
    {
        Movie::create([
            'name' => $request->name,
            'release_date' => date("Y-m-d", strtotime($request->date))
        ]);
    }
}
