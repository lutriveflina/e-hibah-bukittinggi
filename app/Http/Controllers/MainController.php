<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dasboard(){
        return view('pages.dashboard');
    }

    public function permission(){
        return view('pages.permission');
    }

    public function role(){
        return view('pages.role');
    }
}
