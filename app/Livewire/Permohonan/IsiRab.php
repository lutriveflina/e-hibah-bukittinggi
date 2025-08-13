<?php

namespace App\Livewire\Permohonan;

use App\Models\Permohonan;
use App\Models\RabPermohonan;
use App\Models\RincianRab;
use App\Models\Satuan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class IsiRab extends Component
{
    public $permohonan;
    public $satuans;
    public $kegiatans;

    #[Validate('required')]
    public $nama_kegiatan;
    public $total_kegiatan;

    #[Validate('required')]
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

    public function tambahRincian()
    {
        $this->rincian[] = [
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
        $this->validate();

        $kegiatan = RabPermohonan::create([
            'id_permohonan' => $this->permohonan->id,
            'nama_kegiatan' => $this->nama_kegiatan,
        ]);

        foreach($this->rincian as $rincian){
            RincianRab::create([
                'id_rab' => $kegiatan->id,
                'keterangan' => $rincian['kegiatan'],
                'volume' => $rincian['volume'],
                'id_satuan' => $rincian['satuan'],
                'harga' => $rincian['harga_satuan'],
                'subtotal' => $rincian['subtotal'],
            ]);
        }

        $this->reset(['nama_kegiatan', 'total_kegiatan', 'rincian']);
        $this->dispatch('close-modal');
    }

    public function saveRab(){
        Permohonan::where('id', $this->permohonan->id)->increment('id_status');

        return redirect()->route('permohonan');
    }
}
