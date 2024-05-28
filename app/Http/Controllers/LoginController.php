<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle(Request $request)
    {                                                       
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();              
            $findUser = \App\Models\User::where('email', $user->email)->first();            

            if (!$findUser) {
                // return redirect()->route('login')->with('error2', 'Akun sudah terdaftar, mohon lakukan login');
                $findUser = new \App\Models\User();
                $findUser->name = $user->name;
                $findUser->email = $user->email;
                $findUser->phone = "";
                $findUser->password = Hash::make('12345678');
                $findUser->save();       
                $findUser->assignRole('user');                                  
            }

            Auth::login($findUser);

            if (Auth::user()->getRoleNames()[0] == "admin") {
                return redirect()->route('admin.reservation.index')->with('success', 'Login Berhasil, Selamat datang kembali ' . $findUser->name);
            } else {
                return redirect("/#home")->with('success', 'Login Berhasil, Selamat datang kembali ' . $findUser->name);
            }
        } catch(\Exception $e) {            
            return redirect()->route('login')->with('error2', 'Login gagal, mohon lakukan login ulang');
        }
    }

    // public function handleGoogleSignUpCallback(){
    //     try {
    //         $user = Socialite::driver('google')->stateless()->user();        
    //         dd($user);
    //     } catch(\Exception $e) {
            
    //     }
    // }

}