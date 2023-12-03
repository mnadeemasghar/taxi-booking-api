<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotOTP extends Model
{
    use HasFactory;

    protected $table = 'forgot_password_otps';
    protected $fillable = [
        'otp',
        'is_user',
        'expire_at',
        'user_id'
    ];
}
