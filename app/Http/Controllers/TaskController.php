<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\EditTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Service;
use App\Models\Client;
use App\Models\Movimentation;
use App\Models\ClientTask;

class TaskController extends Controller
{
    public function index()
    {
        return view('admin.pages.task.index', ['tasks' => Task::Tasks()]);
    }

    public function create()
    {
        return view('admin.pages.task.create', ['clients' => Client::select()->orderBy('name_client')->get(), 'services' => Service::select()->orderBy('name_service')->get()]);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->name_task = $request->name;
        $task->description_task = $request->description;
        $task->status_task = 0;
        $task->service_task = (int)$request->service;
        $task->client_task = (int)$request->client;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        return view('admin.pages.task.index', ['tasks' => Task::Tasks()]);
    }

    public function find(Request $request)
    {
        $request->validate(['date' => 'required']);
        $tasks = Task::where('created_at', 'LIKE', $request->date . '%')->simplePaginate(4);
        return view('admin.pages.task.index', ['tasks' => $tasks]);
    }
    public function pending()
    {
        $tasks = Task::where('status_task', 'LIKE', 0 . '%')->simplePaginate(4);
        return view('admin.pages.task.index', ['tasks' => $tasks]);
    }

    public function edit($id)
    {
        return view('admin.pages.task.edit', ['clients' => Client::select()->orderBy('name_client')->get(), 'services' => Service::select()->orderBy('name_service')->get(), 'task' => Task::findTask($id)]);
    }

    public function update(EditTaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->name_task = $request->name;
        $task->description_task = $request->description;
        $task->service_task = (int)$request->service;
        $task->client_task = (int)$request->client;
        $task->created_at = $request->date . $request->hour2;
        $task->save();
        return redirect()->route('tasks.index');
    }
    public function complete(Request $request)
    {

        $task = Task::find($request->id);
        if (!$task->status_task == 1) {
            $task->status_task = 1;
            if (!$task->service_task == null && $task->service_task > 0) {
                $service = Service::find((int)$task->service_task);
                $movimentation = new Movimentation();
                $movimentation->type_movimentation = 1;
                $movimentation->value_movimentation =  $service->price_service;
                $movimentation->description_movimentation = 'Serviço realizado : ' . $service->name_service;
                $movimentation->id_task_movimentation = (int)$request->id;
                $movimentation->save();
            }
            if (!$task->client_task == null && $task->client_task > 0) {
               $client_task = new ClientTask();
               $client_task->id_task_client_task = $request->id;
               $client_task->id_client_client_task = $task->client_task;
               $client_task->save();

            }
            $task->save();
        }
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index');
    }
}
