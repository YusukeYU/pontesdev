@extends('admin.layouts.main')

@section('container')


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Novo Cliente</h6>
            </div>
            <div class="card-body">
                <div class="form-group" style="padding-left: 1.25rem; padding-top: 1rem;">
                    <form action="{{ route('clients.store') }}" id="data" class="form" method="POST">
                        @csrf
                        <h6 class="m-0 font-weight-bold text-primary">Nome</h6>
                        <input value="{{old('name') }}" type="text" name="name"  class="inputsx2" maxlength="40" >
                        <h6 class="m-0 font-weight-bold text-primary">E-mail</h6>
                        <input value="{{old('email') }}" type="text" name="email"  class="inputsx2" maxlength="60" >
                        <h6 class="m-0 font-weight-bold text-primary">Telefone</h6>
                        <input value="{{old('phone') }}" type="text" name="phone" id="field" class="inputsx2" maxlength="14">
                        <h6 class="m-0 font-weight-bold text-primary">CPF</h6>
                        <input value="{{old('cpf') }}" type="text" name="cpf" id="field2" class="inputsx2" maxlength="14">
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
