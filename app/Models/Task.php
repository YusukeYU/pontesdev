<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_task';
    protected $fillable = [
        'name_task',
        'description_task',
        'status_task',
        'service_task',
        'client_task',
    ];
    public static function Tasks(){
     return DB::table('tasks')
     ->leftjoin('services', 'tasks.service_task', '=', 'services.id_service')
     ->leftjoin('clients', 'tasks.client_task', '=', 'clients.id_client')
     ->select('tasks.*', 'services.name_service', 'services.price_service', 'clients.cpf_client' ,  'clients.email_client', 'clients.name_client')
     ->orderBy('created_at')
     ->simplePaginate(4);
    }

    public static function findTask($id){
        return Task::where('id_task', $id)
        ->leftjoin('services', 'tasks.service_task', '=', 'services.id_service')
        ->leftjoin('clients', 'tasks.client_task', '=', 'clients.id_client')
        ->select('tasks.*','services.id_service', 'services.name_service', 'services.price_service', 'clients.cpf_client' ,  'clients.email_client', 'clients.name_client','clients.id_client')
        ->get();
       }
}
