<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display lembaga information
        return view('pages.lembaga.index');
    }

    public function create()
    {
        // Logic to show the form for creating a new lembaga
        return view('pages.lembaga.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new lembaga
        // Validate and save the lembaga data
        return redirect()->route('lembaga.index')->with('success', 'Lembaga created successfully.');
    }

    public function editLembaga($id)
    {
        // Logic to retrieve lembaga for editing
        $lembaga = Lembaga::findOrFail($id);
        return view('pages.lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update lembaga data
        $lembaga = Lembaga::findOrFail($id);
        // Validate and update the lembaga data
        return redirect()->route('lembaga.index')->with('success', 'Lembaga updated successfully.');
    }

    function editPendukung($id){
        //
    }

    function updatePendukung(Request $request, $id){
        // Logic to update lembaga pendukung data
        $lembaga = Lembaga::findOrFail($id);
        // Validate and update the lembaga pendukung data
        return redirect()->route('lembaga.index')->with('success', 'Lembaga pendukung updated successfully.');
    }

    function editPengurus($id){
        // Logic to retrieve lembaga pengurus for editing
        $lembaga = Lembaga::findOrFail($id);
        return view('pages.lembaga.edit_pengurus', compact('lembaga'));
    }

    function updatePengurus(Request $request, $id){
        // Logic to update lembaga pengurus data
        $lembaga = Lembaga::findOrFail($id);
        // Validate and update the lembaga pengurus data
        return redirect()->route('lembaga.index')->with('success', 'Lembaga pengurus updated successfully.');
    }
}
