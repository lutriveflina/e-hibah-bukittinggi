<?php

namespace App\Livewire\Permohonan;

use App\Models\BeritaAcara;
use App\Models\KelengkapanBeritaAcara;
use App\Models\Permohonan;
use App\Models\PertanyaanKelengkapan;
use App\Models\RabPermohonan;
use App\Models\VerifikasiPermohonan;
use Livewire\Component;

class Review extends Component
{
    public $is_lembaga_verif = false;
    public $is_proposal_verif = false;
    public $is_pendukung_verif = false;
    public $permohonan;
    public $kegiatans;
    public $questions;
    public $answer = [];
    public $veriffied = false;
    public $agreement;

    public $listeners = ['updateStatement' => 'veriffiedStatement'];

    public function mount($id_permohonan = null){
        $this->permohonan = Permohonan::with(['lembaga', 'skpd', 'status', 'pendukung'])->where('id', $id_permohonan)->first();
        $this->kegiatans = RabPermohonan::with(['rincian.satuan'])->where('id_permohonan', $id_permohonan)->get();
        $this->questions = PertanyaanKelengkapan::with(['children' => function($query) {$query->orderBy('order');}])->where('id_parent', null)->orderBy('order')->get();
    }

    public function rules(){
        $rules = [];
        foreach($this->questions as $q){
            $id = $q->id;

            if(empty($this->answer[$id]['is_ada'] || empty($this->answer[$id]['is_Sesuai']))){
                $rules["answer.$id.keterangan"] = 'required|string';
            }
        }

        return $rules;
    }

    public function render()
    {
        return view('livewire.permohonan.review');
    }

    public function veriffiedStatement(){
        VerifikasiPermohonan::updateOrCreate(
            ['id_permohonan' => $this->permohonan->id],
            [
                'is_lembaga_verif' => $this->is_lembaga_verif,
                'is_proposal_verif' => $this->is_proposal_verif,
                'is_pendukung_verif' => $this->is_pendukung_verif,
            ]
        );
    }

    public function hasVeriffied(){
        $this->veriffied = true;
    }

    public function store($VerificationBool){
        dd($this);
        $this->validate();

        $berita_acara = BeritaAcara::create([

        ]);

        foreach($this->answer as $asnswer){
            KelengkapanBeritaAcara::create([
                'id_permohonan' => $this->permohonan->id,
                'id_pertanyaan' => $answer->id,
                'is_ada' => $answer->is_ada ?? false,
                'is_sesuai' => $answer->is_sesuai ?? false,
                'is_keterangan' => $answer->is_keterangan ?? '',
            ]);
        }


    }
}
