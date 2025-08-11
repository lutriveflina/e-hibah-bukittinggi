<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerifikasiPermohonan extends Model
{
    use Blameable;

    protected $fillable = [
        'id_permohonan',
        'is_lembaga_verif',
        'is_proposal_verif',
        'is_pendukung_verif',
    ];

    /**
     * Get the permohonan that owns the VerifikasiPermohonan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(Permohonan::class, 'id_permohonan');
    }
}
