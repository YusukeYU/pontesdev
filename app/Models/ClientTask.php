<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTask extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_client_task';
    public $timestamps = false;
    protected $fillable = [
        'id_client_client_task',
        'id_task_client_task',
    ];
    public static function findThisClient ($id){
             return ClientTask::where('id_client_client_task', $id)
            ->leftjoin('clients', 'client_tasks.id_client_client_task', '=', 'clients.id_client')   
            ->leftjoin('tasks', 'client_tasks.id_task_client_task', '=', 'tasks.id_task')
            ->leftjoin('services', 'tasks.service_task', '=', 'services.id_service')   
            ->select('client_tasks.id_client_task','clients.id_client','clients.name_client','clients.email_client','clients.phone_client','clients.cpf_client','tasks.name_task', 'tasks.description_task','tasks.service_task', 'tasks.created_at','services.*')
            ->orderBy('created_at')
            ->simplePaginate(4);
    }
}
