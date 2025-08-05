<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use SoftDeletes, Blameable;
    protected $fillable = [
        'name'
    ];
    
    public function rincian_rab(){
        return $this->hasMany(RincianRab::class, 'id_satuan');
    }
}
