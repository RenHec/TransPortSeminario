<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $guarded = [
        'id',
        'rol_id',
        'municipality_id',
        'remember_token'
    ];
    protected $fillable = [
        'dpi',
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'username',
        'email',
        'password',
        'direction',
        'avatar',
        'estado'.
        'token'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
