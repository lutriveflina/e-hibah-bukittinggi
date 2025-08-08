<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PertanyaanKelengkapan extends Model
{
    use SoftDeletes, Blameable;

    protected $fillable = [
        'question',
        'id_parent',
        'order',
    ];

    public function children(){
        return $this->hasMany(PertanyaanKelengkapan::class, 'id_parent');
    }

    public function kelengkapan(){
        return $this->hasMany(KelengkapanBeritaAcara::class, 'id_pertanyaan');
    }
}
