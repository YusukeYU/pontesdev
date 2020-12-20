<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_client';
    protected $fillable = [
        'name_client',
        'email_client',
        'phone_client',
        'cpf_client',
    ];

}
