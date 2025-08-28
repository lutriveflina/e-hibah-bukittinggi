<?php

namespace App\Livewire\Lembaga;

use App\Models\Bank;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pendukung extends Component
{
    use WithFileUploads;

    public $banks;

    public $id_lembaga;
    public $no_domisili;
    public $date_domisili;
    public $file_domisili;
    public $no_operasional;
    public $date_operasional;
    public $file_operasiona;
    public $id_bank;
    public $atas_nama;
    public $no_rek;
    public $photo_rek;

    public function mount($id_lembaga = null) {
        $lembaga = Lembaga::findOrFail($id_lembaga);
        if($lembaga){
            $this->id_lembaga = $lembaga->id;
            $this->no_domisili = $lembaga->no_domisili;
            $this->date_domisili = $lembaga->date_domisili;
            $this->file_domisili = $lembaga->file_domisili;
            $this->no_operasional = $lembaga->no_operasional;
            $this->date_operasional = $lembaga->date_operasional;
            $this->file_operasiona = $lembaga->file_operasional;
            $this->id_bank = $lembaga->id_bank;
            $this->atas_nama = $lembaga->atas_nama;
            $this->no_rek = $lembaga->no_rek;
            $this->photo_rek = $lembaga->photo_rek;
        }

        $this->banks = Bank::orderBy('acronym')->get();
    }

    public function render()
    {
        return view('livewire.lembaga.pendukung');
    }

    public function update() {
        $pendukung = Lembaga::findOrFail($this->id_lembaga)->update([
            
            'no_domisili' => $this->no_domisili,
            'date_domisili' => $this->date_domisili,
            'file_domisili' => $this->file_domisili,
            'no_operasional' => $this->no_operasional,
            'date_operasional' => $this->date_operasional,
            'file_operasiona' => $this->file_operasional,
            'id_bank' => $this->id_bank,
            'atas_nama' => $this->atas_nama,
            'no_rek' => $this->no_rek,
            'photo_rek' => $this->photo_rek,
        ]);

        return redirect()->route('lembaga.admin', ['id_lembaga' => $this->id_lembaga]);
    }
}
