<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
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
}
