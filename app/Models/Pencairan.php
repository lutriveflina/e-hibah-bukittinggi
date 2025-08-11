<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pencairan extends Model
{
    use Blameable;

    protected $fillable = [
        'id_permohonan',
        'tanggal_pencairan',
        'jumlah_pencairan',
        'tahap_pencairan',
        'status',
        'bukti',
        'keterangan',
    ];

    /**
     * Get the permohonan that owns the Pencairan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(permohonan::class, 'id_permohonan');
    }
}
