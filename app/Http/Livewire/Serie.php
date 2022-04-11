<?php

namespace App\Http\Livewire;

use App\Http\Controllers\SerieController;

use Livewire\Component;

class Serie extends Component
{
    public function render()
    {
        $series = new SerieController;
        return view('livewire.serie', ['series' => $series->getAllSeries()]);
    }
}
