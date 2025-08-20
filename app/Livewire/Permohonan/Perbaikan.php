<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use Livewire\Component;

class Perbaikan extends Component
{
    public $permohonan;

    public $no_proposal;
    public $tanggal_proposal;
    public $judul_proposal;
    public $file_proposal;
    public $file_rab;

    public $kegiatans = [];
    public $kegiatan_rab = [];
    
    public function mount($id_permohonan){
        $this->permohonan = Permohonan::with(['pendukung'])->where('id', $id_permohonan)->first();
    }
    
    public function render()
    {
        return view('livewire.permohonan.perbaikan');
    }
}
