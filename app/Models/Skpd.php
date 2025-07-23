<?php

namespace App\Models;

class Skpd extends BaseModel
{
    
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_skpd');
    }

    public function lembagas()
    {
        return $this->hasMany(Lembaga::class, 'id_skpd');
    }

    public function has_urusan()
    {
        return $this->hasMany(UrusanSkpd::class, 'id_skpd');
    }
}
