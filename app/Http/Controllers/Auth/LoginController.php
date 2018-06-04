<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = 'transport/home';

        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        public function redirectToProvider($provider)
        {
            return Socialite::driver($provider)->redirect('home');
        }

        public function handleProviderCallback($provider)
        {

            try
            {
                $user = Socialite::driver($provider)->user();
            }
            catch(\Exception $e)
            {
                session()->flash('message', 'Cuenta no existe');
                return redirect('login');
            }

             $socialuser = User::where('email',$user->getEmail())->first();

             if($socialuser == NULL){
               session()->flash('message', 'Cuenta no existe');
               return redirect('login');
             }else{
              User::where('email',$user->getEmail())
                         ->update([
                           'username' => $user->getName(),
                           'email' => $user->getEmail(),
                           'id' => $user->getId(),
                           'avatar' => $user->getAvatar(),
                         ]);

               auth()->login($socialuser);

               return redirect()->To('home');
             }
        }
    }
