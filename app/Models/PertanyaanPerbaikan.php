<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PertanyaanPerbaikan extends Model
{
    protected $fillable = [
        'question',
    ];

    /**
     * Get all of the kelengkapan_perbaikan for the PertanyaanPerbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelengkapan_perbaikan(): HasMany
    {
        return $this->hasMany(KelengkapanPerbaikan::class, 'id_perbaikan_proposal');
    }
}
