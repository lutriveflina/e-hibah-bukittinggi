<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dasboard(){
        $permohonan = Permohonan::all();
        $user = User::all();
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
