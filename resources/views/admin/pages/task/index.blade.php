@extends('admin.layouts.main')
@section('container')

    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

    @foreach ($tasks as $task)
        <!-- Info Modal-->
        <div class="modal fade" id={{ 'infoModal' . $task->id_task }} tabindex="-2" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size: 16px;" class="modal-title" id="exampleModalLabel">Detalhes do caso</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div style="font-size: 12px;" class="modal-body">

                        <p>- Tarefa : {{ $task->name_task }} </p>

                        @if ($task->status_task == 1)
                            <p>- Status : Completa</p>
                        @else
                            <p>- Status : Pendente</p>
                        @endif

                        <p>- Data :
                            {{ $day = substr($task->created_at, 8, -9) . '/' . substr($task->created_at, 5, -12) . '/' . substr($task->created_at, 0, -15) . ' às ' . substr($task->created_at, 11) }}
                        </p>

                        <p>- Descrição : {{ $task->description_task ?? '' }} </p>
                        <hr class="sidebar-divider">
                        <p>- Serviço : {{ $task->name_service ?? 'Nenhum' }} </p>

                        <p>- Valor do serviço : {{ $task->price_service ?? '' }} </p>
                        <hr class="sidebar-divider">
                        <p>- Cliente : {{ $task->name_client ?? 'Nenhum' }} </p>

                        <p>- Cpf do Cliente : {{ $task->cpf_client ?? '' }} </p>

                        <p>- E-mail do Cliente : {{ $task->email_client ?? '' }} </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Agenda</h1>
            <form action="{{ route('find-task') }}" method="POST">
                <input type="date" name="date" id='name' class="inputsx2 archs">
                @csrf
                <button style="background: royalblue" type="submit" class="btn btn-danger btn-circle btn-sm xvee2">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todas tarefas!</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id_task }}</td>
                                    <td>{{ $task->name_task }}</td>
                                    @if ($task->status_task == 1)
                                        <td style="color: green">Completa</td>
                                    @else
                                        <td style="color:red">Pendente</td>
                                    @endif
                                    <td>{{ $day = substr($task->created_at, 8, -9) . '/' . substr($task->created_at, 5, -12) . '/' . substr($task->created_at, 0, -15) . ' às ' . substr($task->created_at, 11) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('complete-task') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $task->id_task }}" name="id">
                                            <button type="submit" class="btn btn-info btn-circle btn-sm xyhn">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.destroy', $task->id_task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style = "background-color: #e74a3b;
                                            border-color: #e74a3b; " type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target={{ '#infoModal' . $task->id_task }}
                                            href="/admin/tasks-edit-{{ $task->id_task }}"
                                            class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.edit', $task->id_task) }}" method="GET">
                                            @csrf
                                            <button style = "background-color: #e74a3b;
                                            border-color: #e74a3b; " type="submit" class="btn btn-info btn-circle btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center" class="x65321">
        <div class="col-md-auto">{{ $tasks->links() }}</div>
    </div>

@endsection
