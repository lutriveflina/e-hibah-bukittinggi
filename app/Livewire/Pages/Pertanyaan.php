<?php

namespace App\Livewire\Pages;

use App\Models\PertanyaanKelengkapan;
use Livewire\Component;

class Pertanyaan extends Component
{
    public $questions;
    
    public function render()
    {
        $this->questions = PertanyaanKelengkapan::with([])->orderBy('order')->get();
        return view('livewire.pages.pertanyaan');
    }
}
