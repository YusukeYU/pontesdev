<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id_user';

  
    protected $fillable = [
        'name_user',
        'email_user',
        'password_user',
        'photo_user',
    ];

    protected $hidden = [
        'password_user',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public function getAuthPassword()
{
    return $this->password_user;
}
}
