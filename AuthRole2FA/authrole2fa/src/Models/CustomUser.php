<?php

namespace AuthRole2FA\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CustomUser extends Model
{
    protected $table = 'users'; // Ensure it's using the correct table if different from default 'users'
    
    protected $fillable = [
        'user_name', 'first_name', 'last_name', 'phone', 'email', 'password', 'added_by',
        'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_enabled', 'two_factor_verified_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_verified_at' => 'datetime',
    ];

    // Hash password before saving
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}
