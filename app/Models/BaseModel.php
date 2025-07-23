<?php

namespace App\Models;

use App\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Abstract class BaseModel extends Model
{
    use SoftDeletes, Blameable;
}
