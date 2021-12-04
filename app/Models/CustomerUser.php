<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'customer_id',
        'customer_users_name',
        'customer_users_phone',
        'customer_users_address',
        'customer_users_permission',
        'customer_users_status',
        'password'
        
    ];

    protected $hidden = [
        'password'
    ];
}
