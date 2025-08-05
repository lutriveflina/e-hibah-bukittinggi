<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RincianRab extends Model
{
    use SoftDeletes, Blameable;

    protected $fillable = [
        'id_rab',
        'keterangan',
        'volume',
        'id_satuan',
        'harga',
        'subtotal'
    ];
    
    /**
     * Get the rab that owns the RabPermohonan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rab(): BelongsTo
    {
        return $this->belongsTo(RabPermohonan::class, 'id_rab');
    }
    
    /**
     * Get the satuan that owns the RabPermohonan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }
}
