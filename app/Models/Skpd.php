<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasPermissions;

class Skpd extends BaseModel
{
    use SoftDeletes, Blameable;
    
    protected $fillable = [
        'name',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
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
