<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga;
use App\Models\Skpd;
use App\Models\UrusanSkpd;
use Livewire\Component;

class Profile extends Component
{
    public $skpd;
    public $urusan;
    
    public $id_lembaga;
    public $name;
    public $id_urusan;
    public $id_skpd;
    public $email;
    public $phone;
    public $kelurahan;
    public $alamat;

    public function mount($id_lembaga = null){
        if($lembaga = Lembaga::findOrFail($id_lembaga)){
            $this->id_lembaga = $lembaga->id_lembaga;
            $this->name = $lembaga->name;
            $this->id_skpd = $lembaga->id_skpd;
            $this->email = $lembaga->email;
            $this->phone = $lembaga->phone;
            $this->alamat = $lembaga->alamat;
        }

        $this->skpd = Skpd::all();
        $this->urusan = UrusanSkpd::all();
    }

    public function render()
    {
        return view('livewire.lembaga.profile');
    }

    public function update(){

    }
}
