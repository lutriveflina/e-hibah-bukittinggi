<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerbaikanRincianRab extends Model
{
    use SoftDeletes, Blameable;
    protected $fillable = [
        'id_perbaikan_rab',
        'keterangan',
        'volume',
        'id_satuan',
        'harga',
        'subtotal',
        'id_perbaikan',
        'nama_kegiatan',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the perbaikan_rab that owns the PerbaikanRincianRab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perbaikan_rab(): BelongsTo
    {
        return $this->belongsTo(PerbaikanRab::class, 'id_perbaikan_rab');
    }
}
