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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => '',
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => "DzeroK",
                ]);

                Auth::login($newUser);

                return redirect()->route('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
