<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        return view('series');
    }

    public function getAllSeries()
    {
        return Serie::all();
    }
}
