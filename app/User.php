<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'password',
        'email',
        'role',
        'status',
        'activation_token',
        'password_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
