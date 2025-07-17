<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display user information
        return view('pages.user.index');
    }

    public function create(){
        // Logic to show the form for creating a new user
        return view('pages.user.create');
    }
}
