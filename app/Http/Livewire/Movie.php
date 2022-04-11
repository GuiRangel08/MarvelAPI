<?php

namespace App\Http\Livewire;

use App\Http\Controllers\MovieController;

use Livewire\Component;

class Movie extends Component
{
    public function render()
    {
        $movies = new MovieController;
        return view('livewire.movie', ['movies' => $movies->getAllMovies()]);
    }
}
