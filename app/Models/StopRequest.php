<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StopRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'stop_id',
        'booking_id'
    ];
}
