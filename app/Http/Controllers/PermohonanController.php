<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::all();
        // Logic to retrieve and display permohonan information
        return view('pages.permohonan.index', [
            'permohonan' => $permohonan,
        ]);
    }
}
