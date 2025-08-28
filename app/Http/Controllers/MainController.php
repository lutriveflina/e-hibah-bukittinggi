<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function dasboard(){
        $user = User::all();
        if(Auth::user()->hasRole('Super Admin')){
            $permohonan = Permohonan::all();
        }else if(Auth::user()->hasRole('Admin Lembaga')){
            $permohonan = Permohonan::where('id_lembaga', Auth::user()->id_lembaga)->get();
        }else{
            $permohonan = Permohonan::where('id_skpd', Auth::user()->id_skpd)->get();
        }
        $lembaga = Lembaga::all();
        return view('pages.dashboard', [
            'permohonan' => $permohonan,
            'user' => $user,
            'lembaga' => $lembaga,
        ]);
    }

    public function permission(){
        return view('pages.permission');
    }

    public function role(){
        return view('pages.role');
    }
}
