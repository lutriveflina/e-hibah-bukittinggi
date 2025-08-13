<?php

namespace App\Livewire\Permohonan;

use App\Models\PendukungPermohonan;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class IsiPendukung extends Component
{
    use WithFileUploads;
    public $id_permohonan;
    #[Validate('required')]
    public $file_pernyataan_tanggung_jawab;
    #[Validate('required')]
    public $struktur_pengurus;
    #[Validate('required')]
    public $file_rab;
    #[Validate('required')]
    public $saldo_akhir_rek;
    #[Validate('required')]
    public $no_tidak_tumpang_tindih;
    #[Validate('required')]
    public $tanggal_tidak_tumpang_tindih;
    #[Validate('required')]
    public $file_tidak_tumpang_tindih;

    public function mount($id_permohonan = null){
        $this->id_permohonan = $id_permohonan;
    }

    public function render()
    {
        return view('livewire.permohonan.isi-pendukung');
    }

    public function store(){
        $this->validate();

        DB::beginTransaction();

        try {
            $ext_tanggung_jawab = $this->file_pernyataan_tanggung_jawab->getclientOriginalExtension();
            $tanggung_jawab_path = $this->file_pernyataan_tanggung_jawab->storeAs('dukung_permohonan', 'tanggung_jawab_'.Auth::user()->id.$this->id_permohonan.date('now').'.'.$ext_tanggung_jawab);

            $ext_pengurus = $this->struktur_pengurus->getclientOriginalExtension();
            $pengurus_path = $this->struktur_pengurus->storeAs('dukung_permohonan', 'pengurus_'.Auth::user()->id.$this->id_permohonan.date('now').'.'.$ext_pengurus);

            $ext_rab = $this->file_rab->getclientOriginalExtension();
            $rab_path = $this->file_rab->storeAs('dukung_permohonan', 'rab_'.Auth::user()->id.$this->id_permohonan.date('now').'.'.$ext_rab);

            $ext_saldo_akhir_rek = $this->saldo_akhir_rek->getclientOriginalExtension();
            $saldo_akhir_rek_path = $this->saldo_akhir_rek->storeAs('dukung_permohonan', 'saldo_akhir_rek_'.Auth::user()->id.$this->id_permohonan.date('now').'.'.$ext_saldo_akhir_rek);

            $ext_tidak_tumpang_tindih = $this->file_tidak_tumpang_tindih->getclientOriginalExtension();
            $tidak_tumpang_tindih_path = $this->file_tidak_tumpang_tindih->storeAs('dukung_permohonan', 'tidak_tumpang_tindih_'.Auth::user()->id.$this->id_permohonan.date('now').'.'.$ext_tidak_tumpang_tindih);

            $create_pendukung_permohonan = PendukungPermohonan::create([
                'id_permohonan' => $this->id_permohonan,
                'file_pernyataan_tanggung_jawab' => $tanggung_jawab_path,
                'struktur_pengurus' => $pengurus_path,
                'file_rab' => $rab_path,
                'saldo_akhir_rek' => $saldo_akhir_rek_path,
                'no_tidak_tumpang_tindih' => $this->no_tidak_tumpang_tindih,
                'tanggal_tidak_tumpang_tindih' => $this->tanggal_tidak_tumpang_tindih,
                'file_tidak_tumpang_tindih' => $tidak_tumpang_tindih_path,
            ]);

            if($create_pendukung_permohonan){
                Permohonan::where('id', $this->id_permohonan)->increment('id_status');

                DB::commit();

                return redirect()->route('permohonan');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            session()->flash('error', 'Gagal menyimpan data: ' . $th->getMessage());
        }

        
    }
}
