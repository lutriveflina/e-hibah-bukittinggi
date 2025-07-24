<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = [
        'name',
        'jabatan',
        'nik',
        'no_hp',
        'email',
        'alamat',
        'scan_ktp',
    ];

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'id_lembaga');
    }
}
