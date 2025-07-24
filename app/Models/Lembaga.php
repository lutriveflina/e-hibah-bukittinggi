<?php

namespace App\Models;

class Lembaga extends BaseModel
{
    protected $fillable = [
        'name',
        'id_skpd',
        'email',
        'phone',
        'alamat',
        'npwp',
        'no_akta_kumham',
        'date_akta_kumham',
        'file_akta_kumham',
        'no_domisili',
        'date_domisili',
        'file_domisili',
        'no_operasional',
        'date_operasional',
        'file_operasional',
        'no_pernyataan',
        'date_pernyataan',
        'file_pernyataan',
        'id_bank',
        'atas_nama',
        'no_rekening',
        'photo_rek',
    ];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'id_skpd');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_lembaga');
    }

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'id_lembaga');
    }
}
