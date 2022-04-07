<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Livewire\Component;

class GenerateApiToken extends Component
{
    public function render()
    {
        return view('livewire.generate-api-token');
    }
    
    
    public function generateToken()
    {
        
        $user = new User();
        
        return ['token' => $user()->createToken('api_token')->plainTextToken];
    } 
}
