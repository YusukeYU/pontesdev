@extends('admin.layouts.main')

@section('container')


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fluxo de Caixa</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nova Movimentação</h6>
            </div>
            <div class="card-body">
                <div class="form-group" style="padding-left: 1.25rem; padding-top: 1rem;">
                    <form action="{{ route('movimentations.store') }}" id="data" class="form" method="POST">
                        @csrf
                        <h6 class="m-0 font-weight-bold text-primary">Tipo de Movimentação</h6>
                        <select  class="inputsx2" name="type">
                            <option value="1"> Entrada </option>
                            <option value="0"> Saída </option>
                          </select>
    
                        <h6 class="m-0 font-weight-bold text-primary">Valor</h6>
                        <input value="{{ old('value') }}" type="number" step="any" name="value"  class="inputsx2">
    
                        <h6 class="m-0 font-weight-bold text-primary">Descrição</h6>
                        <input value="{{ old('description') }}" name="description" class="inputsx2" type="text" maxlength="45">
    
                        <br> <button type="submit" id="submit" class="btn btn-success btn-icon-split txcd">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
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
