<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendukungPermohonan extends Model
{
    use SoftDeletes, Blameable;
    
    protected $fillable = [
        'id_permohonan',
        'file_pernyataan_tanggung_jawab',
        'struktur_pengurus',
        'file_proposal',
        'file_rab',
        'saldo_akhir_rek',
        'no_tidak_tumpang_tindih',
        'tanggal_tidak_tumpang_tindih',
        'file_tidak_tumpang_tindih',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'id_permohonan');
    }
}
