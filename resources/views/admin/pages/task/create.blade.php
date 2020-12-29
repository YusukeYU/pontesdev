@extends('admin.layouts.main')

@section('container')


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tarefas</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nova Tarefa</h6>
            </div>
            <div class="card-body">
                <div class="form-group" style="padding-left: 1.25rem; padding-top: 1rem;">
                    <form action="{{ route('tasks.store') }}" id="data" class="form" method="POST">
                        @csrf

                        <h6 class="m-0 font-weight-bold text-primary">Nome</h6>
                        <input type="text" name="name" class="inputsx2" maxlength="40" value="{{ old('name') }}">


                        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                        <input type="date" name="date" class="inputsx2" value="{{ old('date') }}">

                        <h6 class="m-0 font-weight-bold text-primary">Horário</h6>
                        <input type="time" name="hour2" class="inputsx2" value="{{ old('hour2')}}">

                        <h6 class="m-0 font-weight-bold text-primary">Descrição</h6>
                        <input type="text" name="description" class="inputsx2" value="{{ old('description') }}">

                        <h6 class="m-0 font-weight-bold text-primary">Serviço</h6>
                        <select class="inputsx2" name="service">
                                <option value=""> </option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id_service }}">{{ $service->name_service }}</option>
                                @endforeach
                        </select>

                        <h6 class="m-0 font-weight-bold text-primary">Cliente</h6>
                        <select  class="inputsx2" name="client">
                                <option value=""> </option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id_client }}">{{ $client->name_client.'/ CPF : '.$client->cpf_client }}</option>
                                @endforeach
                        </select>
                

                        <br> <button type="submit" id="submit" class="btn btn-success btn-icon-split txcd">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i></span>
                            <span class="text">Salvar</span>
                        </button>
                    </form>
                </div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>

@endsection
