
@extends('admin.layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
            <form action="{{ route('find-user') }}" method="POST">
                <input placeholder="Pesquise um nome..."  type="text" name="name" id='name' class="inputsx2 archs"
                maxlength="60">
                @csrf
                <button style="background: royalblue" type="submit" class="btn btn-danger btn-circle btn-sm xvee2">
                    <i class="fas fa-search"></i>
                </button>
            </form>
          
        </div>
       

        <div class="card shadow mb-4 archs2" >
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Usuários registrados no sistema</h6>
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
                                <th>Admin</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id_user }}</td>
                                    <td>{{ $user->name_user }}</td>
                                    <td>{{ $user->email_user }}</td>
                                    @if ($user->admin_user == 0)
                                        <td> Não </td>
                                    @else
                                        <td> Sim </td>
                                    @endif
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id_user) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.edit', $user->id_user) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
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
        <div class="col-md-auto">{{ $users->links() }}</div>
    </div>

@endsection
