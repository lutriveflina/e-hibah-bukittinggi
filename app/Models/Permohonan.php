<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $fillable = [
        'id_lembaga',
        'no_mohon',
        'tanggal_mohon',
        'tahun_apbd',
        'perihal_mohon',
        'file_mohon',
        'no_proposal',
        'tanggal_proposal',
        'title',
        'urusan',
        'id_skpd',
        'awal_laksana',
        'akhir_laksana',
        'latar_belakang',
        'maksud_tujuan',
        'keterangan',
        'nominal_rab',
        'id_status',
        'nominal_rekomendasi',
        'tanggal_rekomendasi',
        'catatan_rekomendasi',
        'file_pemberitahuan'
    ];
}
