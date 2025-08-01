<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        if(Auth::user()->has_role('Super Admin')){
            $permohonan = Permohonan::all();
        }

        if(Auth::user()->has_role('Admin SKPD') || Auth::user()->has_role('Reviewer') || Auth::user()->has_role('Verifikator')){
            $permohonan = Permohonan::where('id_skpd', Auth::user()->id_skpd)->get();
        }
        
        if(Auth::user()->has_role('Admin Lembaga')){
            $permohonan = Permohonan::with(['skpd'])->where('id_lembaga', Auth::user()->id_lembaga)->get();
        }

        // Logic to retrieve and display permohonan information
        return view('pages.permohonan.index', [
            'permohonan' => $permohonan,
        ]);
    }

    public function show($id_permohonan){
        dd('permohonan.show()');
    }
}
