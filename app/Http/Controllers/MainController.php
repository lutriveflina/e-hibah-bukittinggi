<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dasboard(){
        $permohonan = Permohonan::all();
        return view('pages.dashboard', [
            'permohonan' => $permohonan
        ]);
    }

    public function permission(){
        return view('pages.permission');
    }

    public function role(){
        return view('pages.role');
    }
}
