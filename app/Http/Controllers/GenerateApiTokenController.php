<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GenerateApiTokenController extends Controller
{
    public function generateApiToken() 
    {
        $user = Auth::user();
        return $user->createToken('api_token')->plainTextToken;
    }
}
