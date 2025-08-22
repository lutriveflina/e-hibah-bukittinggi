<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelengkapanPerbaikan extends Model
{
    use SoftDeletes, Blameable;
    protected $fillable = [
        'id_perbaikan',
        'id_pertanyaan_perbaikan',
        'is_ada',
        'is_sesuai',
        'keterangan',
    ];

    /**
     * Get the perbaikan that owns the KelengkapanPerbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perbaikan(): BelongsTo
    {
        return $this->belongsTo(PerbaikanProposal::class, 'id_perbaikan');
    }
    
    /**
     * Get the pertanyaan_perbaikan that owns the KelengkapanPerbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pertanyaan_perbaikan(): BelongsTo
    {
        return $this->belongsTo(PertanyaanPerbaikan::class, 'id_perbaikan_proposal');
    }
}
