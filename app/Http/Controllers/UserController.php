<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display user information
        $users = User::with('has_role', 'lembaga', 'skpd')->orderBy('id_role')->get();
        return view('pages.user.index', [
            'users' => $users,
        ]);
    }

    public function create(){
        // Logic to show the form for creating a new user
        return view('pages.user.create');
    }
}
