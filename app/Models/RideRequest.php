<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_type_id',
        'type',
        'pick_lat',
        'pick_lng',
        'pick_datetime',
        'drop_lat',
        'drop_lng',
        'drop_datetime',
        'price',
        'currency'

    ];
}
