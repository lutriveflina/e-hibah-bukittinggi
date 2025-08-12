<?php

namespace App\Livewire\Permohonan;

use App\Models\BeritaAcara;
use App\Models\KelengkapanBeritaAcara;
use App\Models\Permohonan;
use App\Models\PertanyaanKelengkapan;
use App\Models\RabPermohonan;
use App\Models\VerifikasiPermohonan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Review extends Component
{
    use WithFileUploads;

    public $is_lembaga_verif = false;
    public $is_proposal_verif = false;
    public $is_pendukung_verif = false;

    public $permohonan;
    public $kegiatans;
    public $questions;
    public $answer = [];
    public $veriffied = false;

    public $is_lengkap;
    #[Validate('required')]
    public $file_kelengkapan_adm;
    #[Validate('required')]
    public $no_kelengkapan_adm;
    #[Validate('required')]
    public $tanggal_kelengkapan_adm;
    #[Validate('required')]
    public $file_tinjau_lap;
    #[Validate('required')]
    public $no_tinjau_lap;
    #[Validate('required')]
    public $tanggal_tinjau_lap;

    public $berita_acara;

    public $listeners = ['updateStatement' => 'veriffiedStatement'];

    public function mount($id_permohonan = null){
        $this->permohonan = Permohonan::with(['lembaga', 'skpd', 'status', 'pendukung'])->where('id', $id_permohonan)->first();
        $this->kegiatans = RabPermohonan::with(['rincian.satuan'])->where('id_permohonan', $id_permohonan)->get();

        $verifikasi = VerifikasiPermohonan::where('id_permohonan', $this->permohonan->id)->first();
        if($verifikasi){
            $this->is_lembaga_verif = $verifikasi->is_lembaga_verif;
            $this->is_proposal_verif = $verifikasi->is_proposal_verif;
            $this->is_pendukung_verif = $verifikasi->is_pendukung_verif;
        }

        $this->questions = PertanyaanKelengkapan::with(['children' => function($query) {$query->orderBy('order');}])->where('id_parent', null)->orderBy('order')->get();

        $this->berita_acara = BeritaAcara::firstWhere('id_permohonan', $this->permohonan->id);
        if($this->berita_acara){
            $kelengkapan = KelengkapanBeritaAcara::where('id_berita_acara', $this->berita_acara->id)->get();
            foreach($this->questions as $question){
                foreach($question->child as $child){
                    $existing = $kelengkapan->firstWhere('id_pertanyaan', $child->id);

                    $this->answer[$child->id] = [
                        'is_ada' => $existing?->is_ada ?? false,
                        'is_sesuai' => $existing?->is_sesuai ?? false,
                        'keterangan' => $existing?->keterangan ?? '',
                    ];
                }
            }
        }
    }

    protected function rules(){
        $rules = [];
        foreach($this->questions as $question){
            foreach ($question->children as $key => $child) {
                $id = $child->id;

                if (empty($this->answer[$id]['is_ada']) || empty($this->answer[$id]['is_sesuai'])) {
                    $rules["answer.$id.keterangan"] = 'required|string';
                }
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
        if($VerificationBool == 0) return;
        $this->validate();
        DB::beginTransaction();
        try {
            $berita_acara = BeritaAcara::create([
                'id_permohonan' => $this->permohonan->id,
                'is_lengkap' => $this->is_lengkap,
                'file_kelengkapan_adm' => $this->file_kelengkapan_adm,
                'no_kelengkapan_adm' => $this->no_kelengkapan_adm,
                'tanggal_kelengkapan_adm' => $this->tanggal_kelengkapan_adm,
                'file_tinjau_lap' => $this->file_tinjau_lap,
                'no_tinjau_lap' => $this->no_tinjau_lap,
                'tanggal_tinjau_lap' => $this->tanggal_tinjau_lap,
            ]);

            foreach($this->questions as $question){
                foreach($question->children as $child){

                    KelengkapanBeritaAcara::create([
                        'id_berita_acara' => $berita_acara->id,
                        'id_pertanyaan' => $child->id,
                        'is_ada' => $this->answer[$child->id]['is_ada'] ?? false,
                        'is_sesuai' => $this->answer[$child->id]['is_sesuai'] ?? false,
                        'is_keterangan' => $this->answer[$child->id]['is_keterangan'] ?? '',
                    ]);

                }
            }

            DB::commit();
            
            Permohonan::where('id', $this->permohonan->id)->increment('id_status');

            return redirect()->route('permohonan');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            session()->flash('error', 'Gagal menyimpan data: ' . $th->getMessage());
        }
        
    }
}
