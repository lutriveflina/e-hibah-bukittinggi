<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function Authenticate(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];
        
        if(Auth::attempt($credentials, $request['remember'])) {
            try {
                session()->regenerate();
            } catch (\Throwable $th) {
                return redirect()->route('login')->with($th);
            }
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Email atau Password yang dimasukan munkin salah, silahkan ulangi lagi!');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
