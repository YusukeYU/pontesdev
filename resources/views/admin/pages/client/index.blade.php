@extends('admin.layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
            <form action="{{ route('find-client') }}" method="POST">
                <input placeholder="Pesquise um nome..."  type="text" name="name" id='name' class="inputsx2 archs"
                maxlength="50">
                @csrf
                <button style="background: royalblue" type="submit" class="btn btn-danger btn-circle btn-sm xvee2">
                    <i class="fas fa-search"></i>
                </button>
            </form> 
        </div>
       

        <div class="card shadow mb-4 archs2" >
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Clientes registrados no sistema</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Cpf</th>
                                @if(auth()->user()->admin_user == 1)
                                <th> </th>
                                <th> </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id_client }}</td>
                                    <td>{{ $client->name_client }}</td>
                                    <td>{{ $client->email_client }}</td>
                                    <td>{{ $client->phone_client }}</td>
                                    <td>{{ $client->cpf_client }}</td>
                                    @if(auth()->user()->admin_user == 1)
                                    <td>
                                        <form action="{{ route('clients.destroy', $client->id_client) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('clients.edit', $client->id_client) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center" class="x65321">
        <div class="col-md-auto">{{ $clients->links() }}</div>
    </div>

@endsection
