<?php

namespace App\Models;

class UrusanSkpd extends BaseModel
{
    protected $fillable = [
        'id_skpd',
        'nama_urusan',
    ];

    public function skpd()
    {
        return $this->belongsTo(SKPD::class, 'id_skpd');
    }
}
