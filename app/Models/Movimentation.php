<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_movimentation';

  
    protected $fillable = [
        'type_movimentation',
        'value_movimentation',
        'description_movimentation',
        'id_task_movimentation',
    ];

}
