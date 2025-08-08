<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeritaAcara extends Model
{
    use SoftDeletes, Blameable;

    protected $fillable = [
        'id_permohonan',
        'is_lengkap',
        'file_kelengkapan_adm',
        'no_kelengkapan_adm',
        'tanggal_kelengkapan_adm',
        'file_tinjau_lap',
        'no_tinjau_lap',
        'tanggal_tinjau_lap',
    ];

    public function permohonan(){
        return $this->belongsTo(Permohonan::class, 'id_permohonan');
    }

    public function kelengkapan(){
        return $this->hasMany(KelengkapanBeritaAcara::class, 'id_permohonan');
    }
}
