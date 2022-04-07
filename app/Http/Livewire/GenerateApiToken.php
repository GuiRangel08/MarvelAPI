<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GenerateApiTokenController;
use Livewire\Component;

class GenerateApiToken extends Component
{
    public function render()
    {
        return view('livewire.generate-api-token');
    }
    
    
    public function callGenerateApiToken()
    {
        
        $user = new GenerateApiTokenController();
        return redirect('profile')->with('api_token',$user->generateApiToken());
    } 
}
