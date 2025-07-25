<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_permohonan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status_button',
        'action_buttons',
    ];
}
