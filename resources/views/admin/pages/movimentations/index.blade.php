@extends('admin.layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fluxo de Caixa</h1>
            <form action="{{ route('find-lead') }}" method="POST">
                <input placeholder="Pesquise um nome..."  type="text" name="name" id='name' class="inputsx2 archs"
                maxlength="60">
                @csrf
                <button style="background: royalblue" type="submit"  class="btn btn-danger btn-circle btn-sm xvee2">
                    <i class="fas fa-search"></i>
                </button>
            </form>
          
        </div>

        <div class="card shadow mb-4 archs2" >
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Saldo Atual : @if($saldo>0)
                    <p style="color: green">R$: {{$saldo}} </p>
                    @else
                    <p style="color: red"> R$: {{$saldo}} </p>
             @endif
                  </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="text-align: center">
                        <thead>
                            <tr>
                              <th>Id</th>
                              <th>Valor</th>
                              <th>Tipo</th>
                              <th>Descrição</th>
                              <th>Tarefa</th>
                              <th>Data</th>
                              @if(auth()->user()->admin_user == 1)
                              <th> </th>
                              @endif
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($movimentations as $movimentation)
                          <tr>
                            <td>{{ $movimentation->id_movimentation }}</td>
                            @if($movimentation->type_movimentation == 1)
                            <td style="color: green">{{'R$: '.$movimentation->value_movimentation }}</td>
                            <td style="color: green">Entrada</td>
                            @else 
                            <td style="color: red">{{'R$: '.$movimentation->value_movimentation }}</td>
                            <td style="color: red">Saída</td>
                            @endif
                            <td>{{ $movimentation->description_movimentation }}</td>
                            <td>{{ $movimentation->id_task_movimentation }}</td>
                            <td>{{    
                              $day = substr($movimentation->created_at, 8, -9).'/'.substr($movimentation->created_at,5, -12).'/'.substr($movimentation->created_at,0, -15).' às '.substr($movimentation->created_at,11)}}</td>
                            @if(auth()->user()->admin_user == 1)
                            <td>     
                                <form action="{{ route('movimentations.destroy', $movimentation->id_movimentation) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
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
        <div class="col-md-auto">{{ $movimentations->links() }}</div>
    </div>

@endsection
