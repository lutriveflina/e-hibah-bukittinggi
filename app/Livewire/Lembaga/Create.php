<?php

namespace App\Livewire\Lembaga;

use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Propinsi;
use App\Models\Skpd;
use App\Models\UrusanSkpd;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $skpd;
    public $urusan;
    public $propinsis = [];
    public $all_kabkotas = [];
    public $kabkotas = [];
    public $all_kecamatans = [];
    public $kecamatans = [];
    public $all_kelurahans = [];
    public $kelurahans = [];

    #[Validate('required')]
    public $name_lembaga;

    #[Validate('required')]
    public $id_urusan;

    #[Validate('required')]
    public $id_skpd;

    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $phone;

    public $propinsi;
    public $kab_kota;
    public $kecamatan;
    #[Validate('required')]
    public $kelurahan;

    #[Validate('required')]
    public $alamat;

    #[Validate('required')]
    public $npwp;

    #[Validate('required')]
    public $no_akta_kumham;

    #[Validate('required')]
    public $date_akta_kumham;

    #[Validate('required|mimetypes:application/pdf')]
    public $file_akta_kumham;

    #[Validate('required')]
    public $no_domisili;

    #[Validate('required')]
    public $date_domisili;

    #[Validate('required|mimetypes:application/pdf')]
    public $file_domisili;

    #[Validate('required')]
    public $no_operasional;

    #[Validate('required')]
    public $date_operasional;

    #[Validate('required|mimetypes:application/pdf')]
    public $file_operasional;

    #[Validate('required')]
    public $no_pernyataan;

    #[Validate('required')]
    public $date_pernyataan;

    #[Validate('required|mimetypes:application/pdf')]
    public $file_pernyataan;

    public function mount(){
        $this->propinsis = Propinsi::all();
        $this->all_kabkotas = KabKota::all();
        $this->all_kecamatans = Kecamatan::all();
        $this->all_kelurahans = Kelurahan::all();
        
        $this->skpd = Skpd::all();
        $this->urusan = UrusanSkpd::all();
    }
    
    public function render()
    {
        return view('livewire.lembaga.create');
    }
    
    public function updatedIdSkpd($value){
        $this->kabkotas = collect($this->urusan)->where('id_skpd', $value)->values()->toArray();
    }
    
    public function updatedPropinsi($value){
        $this->kabkotas = collect($this->all_kabkotas)->where('id_propinsi', $value)->values()->toArray();
    }

    public function updatedKabkota($value){
        $this->kecamatans = collect($this->all_kecamatans)->where('id_kabkota', $value)->values()->toArray();
    }

    public function updatedKecamatan($value){
        $this->kelurahans = collect($this->all_kelurahans)->where('id_kecamatan', $value)->values()->toArray();
    }
}
