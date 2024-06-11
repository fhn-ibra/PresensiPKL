<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            $find = User::where('email', $user->email)->first();

            if($find){
                Auth::login($find);
                if(Auth::user()->level == 'siswa'){
                    return redirect('/home');
                } else {
                    return redirect('/dashboard');
                }
            } else {
                return redirect('/')->with(['error' => 'Akun Tidak Terdaftar']);
            }
        } catch (Exception $e) {
            return redirect('/')->with(['error' => 'Silahkan Login Lagi']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
