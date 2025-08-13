<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga;
use App\Models\Skpd;
use App\Models\UrusanSkpd;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Profile extends Component
{
    public $skpd;
    public $urusan;
    
    public $id_lembaga;
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $id_urusan;
    #[Validate('required')]
    public $id_skpd;
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $phone;
    public $kelurahan;
    #[Validate('required')]
    public $alamat;

    public function mount($id_lembaga = null){
        if($lembaga = Lembaga::findOrFail($id_lembaga)){
            $this->id_lembaga = $lembaga->id;
            $this->name = $lembaga->name;
            $this->id_skpd = $lembaga->id_skpd;
            $this->id_urusan = $lembaga->id_urusan;
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
        $this->validate();

        $profil = Lembaga::findOrFail($this->id_lembaga)->update([
            'name' => $this->name,
            'id_skpd' => $this->id_skpd,
            'id_urusan' => $this->id_urusan,
            'email' => $this->email,
            'phone' => $this->phone,
            'alamat' => $this->alamat,
        ]);

        return redirect()->route('lembaga.admin', ['id_lembaga' => $this->id_lembaga]);
    }
}
