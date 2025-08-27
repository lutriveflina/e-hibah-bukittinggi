<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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

        $remember = $request->boolean('remember');
        
        if(Auth::attempt($credentials, $remember)) {
            $regenerate = session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('danger', 'Login gagal, Email atau password yang dimasukkan munkin salah');
    }

    public function forgot_password(){
        return view('pages.forgot_password');
    }

    public function reset_password_link(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
