<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\EditTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Service;
use App\Models\Client;

class TaskController extends Controller
{
    public function index()
    {
        return view('admin.pages.task.index', ['tasks' => Task::Tasks()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.task.edit', ['clients' => Client::select()->orderBy('name_client')->get(), 'services' => Service::select()->orderBy('name_service')->get(), 'task' => Task::findTask($id)]);
    }

    public function update(EditTaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->name_task = $request->name;
        $task->description_task = $request->description;
        $task->status_task = (int)$request->status;
        $task->service_task = (int)$request->service;
        $task->client_task = (int)$request->client;
        $task->created_at = $request->date.$request->hour2;
        $task->save();
        return redirect()->route('tasks.index');
    }
    public function complete(Request $request)
    {
        $task = Task::find($request->id);
        $task->status_task = 1;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index');
    }
}
