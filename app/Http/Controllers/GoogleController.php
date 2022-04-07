<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->user();
            
            if(explode("@", $user->email)[1] !== 'gruponewway.com.br'){
                return redirect()->to('/login')->with('error', 'E-mail não é do grupo NewWay. Conecte com um e-mail NewWay no google e tente novamente.');
            }else{
                $finduser = User::where('google_id', $user->id)->first();
             
                if ($finduser) {

                    Auth::login($finduser);

                    return redirect()->intended('dashboard');

                } else {

                    $newUser = User::updateOrCreate(['email' => $user->email],[
                            'name' => $user->name,
                            'google_id'=> $user->id,
                            'password' => encrypt('123456dummy'),
                        ]);

                    Auth::login($newUser);

                    return redirect()->intended('dashboard');

                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}