<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerbaikanProposal extends Model
{
    use SoftDeletes, Blameable;

    protected $fillable = [
        'id_permohonan',
        'revision_number',
        'no_proposal',
        'tanggal_perbaikan',
        'judul_proposal',
        'file_proposal',
        'file_rab',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the permohonan that owns the PerbaikanProposal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(permohonan::class, 'id_permohonan');
    }

    public function perbaikan_rab(){
        return $this->hasMany(PerbaikanRab::class, 'id_perbaikan');
    }
}
