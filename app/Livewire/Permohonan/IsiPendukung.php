<?php

namespace App\Livewire\Permohonan;

use Livewire\Component;

class IsiPendukung extends Component
{
    public $id_permohonan;
    public $file_pernyataan_tanggung_jawab;
    public $struktur_pengurus;
    public $file_rab;
    public $saldo_akhir_rek;
    public $no_tidak_tumpang_tindih;
    public $tanggal_tidak_tumpang_tindih;
    public $file_tidak_tumpang_tindih;

    public function mount($id_permohonan = null){
        $this->id_permohonan = $id_permohonan;
    }

    public function render()
    {
        return view('livewire.permohonan.isi-pendukung');
    }
}
