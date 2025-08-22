<?php

namespace App\Livewire\Nphd;

use App\Models\PerbaikanRab;
use App\Models\Permohonan;
use App\Models\RabPermohonan;
use App\Models\Satuan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Show extends Component
{
    public $permohonan;
    public $satuans;
    public $count_perbaikan = 1;

    public $nominal_rab;
    public $total_kegiatan = 0;
    public $kegiatans = [];
    #[Validate('required')]
    public $kegiatan_rab = [];
    public $rincian = [];

    public $file_nphd;
    
    public $listeners = ['close-modal'];

    public function mount($id_permohonan){
        $this->permohonan = Permohonan::with(['pendukung'])->where('id', $id_permohonan)->first();
        $this->nominal_rab = $this->permohonan->nominal_rab;
        $perbaikan_rab = PerbaikanRab::where('id_permohonan', $id_permohonan)->get();
        
        $this->kegiatans = RabPermohonan::with(['rincian.satuan'])->where('id_permohonan', $this->permohonan->id)->get();
            if($this->kegiatans){
                $grand = 0;
                foreach ($this->kegiatans as $k1 => $item) {
                    foreach ($item->rincian as $k2 => $child) {
                        $grand += $child->subtotal;
                    }
                }
                $this->total_kegiatan = $grand;
            }
            foreach ($this->kegiatans as $k1 => $item) {
                $this->kegiatan_rab[$k1] = [
                    'id_kegiatan' => $item->id,
                    'nama_kegiatan' => $item->nama_kegiatan,
                    'total_kegiatan' => 0
                ];
                foreach($item->rincian as $k2 => $child){
                    $this->kegiatan_rab[$k1]['rincian'][$k2] = [
                        'id_rincian' => $child->id,
                        'kegiatan' => $child->keterangan,
                        'volume' => $child->volume,
                        'satuan' => $child->id_satuan,
                        'harga_satuan' => $child->harga,
                        'subtotal' => $child->subtotal,
                    ];
                }
            }
        $this->satuans = Satuan::orderBy('name')->get();
    }
    public function render()
    {
        return view('livewire.nphd.show');
    }

    public function store(){
        dd($this);
    }
}
