<?php

namespace App\Livewire\Nphd;

use App\Models\PerbaikanRab;
use App\Models\Permohonan;
use App\Models\RabPermohonan;
use App\Models\Satuan;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
    
    public $listeners = ['pdf-ready','close-modal'];

    public function mount($id_permohonan){
        $this->permohonan = Permohonan::with(['lembaga', 'skpd', 'urusan_skpd', 'pendukung'])->where('id', $id_permohonan)->first();
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

    public function generate_pdf(){
        // $pdf = Pdf::loadView('pdf.nphd', ['data' => $this->permohonan])->setPaper('A4', 'portrait');

        $dir = 'nphd';
        $filename = 'nphd_'.$this->permohonan->id.$this->permohonan->tahun_apbd.'.pdf';

        $pdf = Pdf::loadView('pdf.nphd', ['data' => $this->permohonan])
            ->setPaper('A4', 'portrait');

        // 1) Pastikan folder ada (di disk 'public' = storage/app/public)
        Storage::disk('public')->makeDirectory($dir);

        // (opsional, sanity check absolut path & permission)
        $absDir = Storage::disk('public')->path($dir);
        File::ensureDirectoryExists($absDir, 0775);
        if (!is_writable($absDir)) {
            throw new \RuntimeException("Direktori tidak writable: {$absDir}");
        }

        // 2) Simpan PDF langsung ke disk 'public'
        Storage::disk('public')->put("{$dir}/{$filename}", $pdf->output());

        // 3) (opsional) URL publik via symlink `public/storage`
        $url = asset("storage/{$dir}/{$filename}");

        $this->dispatch('pdf-ready', [
            'url' => $url
        ]);
    }

    public function store(){
        dd($this);
    }
}
