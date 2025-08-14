<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use App\Models\RabPermohonan;
use App\Models\RincianRab;
use App\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class IsiRab extends Component
{
    public $permohonan;
    public $satuans;
    public $kegiatans;
    public $nominal_rab;

    // #[Validate('required')]
    public $nama_kegiatan;
    public $total_kegiatan;

    #[Validate('required')]
    public $kegiatan_rab = [];

    // #[Validate('required')]
    public $rincian = [];

    public $listeners = ['close-modal'];

    public function mount($id_permohonan = null){
        $this->permohonan = Permohonan::findOrFail($id_permohonan);
        $this->satuans = Satuan::orderBy('name')->get();
    }

    public function render()
    {
        $this->kegiatans = RabPermohonan::with(['rincian.satuan'])->where('id_permohonan', $this->permohonan->id)->get();
        return view('livewire.permohonan.isi-rab');
    }

    public function tambahKegiatan(){
        $countKegiatan = count($this->kegiatan_rab);
        $this->kegiatan_rab[$countKegiatan + 1] = [
            'name_kegiatan' => '',
            'total_kegiatan' => 0,
            'rincian' => [],
        ];
    }

    public function tambahRincian($k1)
    {
        $countChild = count($this->kegiatan_rab[$k1]['rincian']);
        $this->kegiatan_rab[$k1]['rincian'][$countChild + 1] = [
            'kegiatan' => '',
            'volume' => '',
            'satuan' => '',
            'harga_satuan' => '',
            'subtotal' => '',
        ];
    }

    public function hapusRincian($index)
    {
        unset($this->rincian[$index]);
        $this->rincian = array_values($this->rincian); // reset index array
    }

    public function updated($property)
    {
        if (
            str_starts_with($property, 'rincian.') &&
            (str_ends_with($property, '.volume') || str_ends_with($property, '.harga_satuan'))
        ) {
            // Dapatkan index baris dari properti yang berubah
            $pattern = '/rincian\.(\d+)\./'; // contoh: rincian.2.volume
            if (preg_match($pattern, $property, $matches)) {
                $index = (int)$matches[1];
                $this->hitungSubtotalBaris($index);
            }

            // Tetap hitung total seluruh subtotal
            $this->hitungTotal();
        }
    }

    public function hitungSubtotalBaris($index)
    {
        if (isset($this->rincian[$index])) {
            $volume = floatval($this->rincian[$index]['volume'] ?? 0);
            $harga = floatval($this->rincian[$index]['harga_satuan'] ?? 0);
            $this->rincian[$index]['subtotal'] = $volume * $harga;
        }
    }

    public function hitungTotal()
    {
        $this->total_kegiatan = collect($this->rincian)
            ->pluck('subtotal')
            ->filter(fn($val) => is_numeric($val))
            ->sum();
    }

    public function store(){
        dd($this->kegiatan_rab);
        $this->validate();

        DB::beginTransaction();
        try {
            foreach($this->kegiatan_rab as $k1 => $item){
                $kegiatan = RabPermohonan::create([
                    'id_permohonan' => $this->permohonan->id,
                    'nama_kegiatan' => $this->kegiatan_rab[$k1]['nama_kegiatan'],
                ]);

                foreach($this->kegiatan_rab[$k1]['rincian'] as $k2 => $rincian){
                    RincianRab::create([
                        'id_rab' => $kegiatan->id,
                        'keterangan' => $rincian['kegiatan'],
                        'volume' => $rincian['volume'],
                        'id_satuan' => $rincian['satuan'],
                        'harga' => $rincian['harga_satuan'],
                        'subtotal' => $rincian['subtotal'],
                    ]);
                }
            }
            DB::commit();
            $this->reset(['kegiatan_rab']);
            $this->dispatch('close-modal');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Kegiatan dan Rincian gagal dihapus :'.$th);
        }

    }

    public function deleteKegiatan($id_kegiatan){
        $kegiatan = RabPermohonan::findOrFail($id_kegiatan);

        DB::beginTransaction();

        try {
            $kegiatan->rincian()->delete();
    
            $kegiatan->delete();

            DB::commit();

            session()->flash('message', 'Kegiatan dan Semua Rincian telah berhasil di hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Kegiatan dan Rincian gagal dihapus :'.$th);
        }
    }

    public function saveRab(){
        Permohonan::where('id', $this->permohonan->id)->increment('id_status');

        return redirect()->route('permohonan');
    }
}
