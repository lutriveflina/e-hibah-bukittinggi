<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelengkapanBeritaAcara extends Model
{
    use SoftDeletes, Blameable;

    protected $fillable = [
        'id_berita_acara',
        'id_pertanyaan',
        'is_ada',
        'is_sesuai',
        'keterangan',
    ];

    public function berita_acara(){
        return $this->belongsTo(BeritaAcara::class, 'id_berita_acara');
    }

    public function pertanyaan(){
        return $this->belongsTo(PertanyaanKelengkapan::class, 'id_pertanyaan');
    }
}
