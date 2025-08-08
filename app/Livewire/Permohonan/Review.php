<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use App\Models\PertanyaanKelengkapan;
use App\Models\RabPermohonan;
use Livewire\Component;

class Review extends Component
{
    public $permohonan;
    public $kegiatans;
    public $questions;

    public function mount($id_permohonan = null){
        $this->permohonan = Permohonan::with(['lembaga', 'skpd', 'status', 'pendukung'])->where('id', $id_permohonan)->first();
        $this->kegiatans = RabPermohonan::with(['rincian.satuan'])->where('id_permohonan', $id_permohonan)->get();
        $this->questions = PertanyaanKelengkapan::with(['children' => function($query) {$query->orderBy('order');}])->where('id_parent', null)->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.permohonan.review');
    }
}
