@extends('admin.layouts.main')
@section('container')

    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <!--   1!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

    @foreach ($histories as $history)
        <!-- Info Modal-->
        <div class="modal fade" id={{ 'infoModal' . $history->id_client_task }} tabindex="-2" role="dialog"
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

                        <p>- Tarefa : {{ $history->name_task }} </p>

                        <p>- Data :
                            {{ $day = substr($history->created_at, 8, -9) . '/' . substr($history->created_at, 5, -12) . '/' . substr($history->created_at, 0, -15) . ' às ' . substr($history->created_at, 11) }}
                        </p>

                        <p>- Descrição : {{ $history->description_task ?? '' }} </p>
                        <hr class="sidebar-divider">
                        <p>- Serviço : {{ $history->name_service ?? 'Nenhum' }} </p>

                        <p>- Valor do serviço : {{ $history->price_service ?? '' }} </p>

                        <p>- Detalhes do serviço : {{ $history->description_service ?? '' }} </p>
                        <hr class="sidebar-divider">
                        <p>- Cliente : {{ $history->name_client ?? 'Nenhum' }} </p>

                        <p>- Cpf do Cliente : {{ $history->cpf_client ?? '' }} </p>

                        <p>- E-mail do Cliente : {{ $history->email_client ?? '' }} </p>

                        <p>- Telefone do Cliente : {{ $history->phone_client ?? '' }} </p>
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
            <h1 class="h3 mb-0 text-gray-800">Histórico</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Histórico completo do cliente!</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tarefa</th>
                                <th>Data</th>
                                <th>Cliente </th>
                                <th>Serviço </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td>{{ $history->id_client_task }}</td>
                                    <td>{{ $history->name_task }}</td>
                                    <td>{{ $day = substr($history->created_at, 8, -9) . '/' . substr($history->created_at, 5, -12) . '/' . substr($history->created_at, 0, -15) . ' às ' . substr($history->created_at, 11) }}
                                    </td>
                                    <td>{{ $history->name_client }}</td>
                                    <td>{{ $history->name_service }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target={{ '#infoModal' . $history->id_client_task }}
                                            href="/admin/tasks-edit-#"
                                            class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
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
        <div class="col-md-auto">{{ $histories->links() }}</div>
    </div>

@endsection
