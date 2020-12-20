@extends('admin.layouts.main')

@section('container')


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Serviço</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Serviço</h6>
            </div>
            <div class="card-body">
                <div class="form-group" style="padding-left: 1.25rem;
                padding-top: 1rem;">
                    <form action = "{{ route('services.update',$service[0]->id_service) }}" id="data" class="form" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" id='id' value="{{ $service[0]->id_service }}">

                        <h6 class="m-0 font-weight-bold text-primary">Nome</h6>
                        <input type="text" name="name" id='name' class="inputsx2" maxlength="40"
                            value="{{ $service[0]->name_service }}">

                        <h6 class="m-0 font-weight-bold text-primary">Valor</h6>
                        <input  type="number" step="any" name="price"  class="inputsx2" 
                            value="{{(string)$service[0]->price_service }}">

                            <h6 class="m-0 font-weight-bold text-primary">Descrição</h6>
                            <input type="text" name="description" class="inputsx2" maxlength="50"
                                value="{{$service[0]->description_service }}">

                        <br> <button type="submit" id="submit" class="btn btn-success btn-icon-split txcd">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Salvar</span>
                        </button>
                    </form>
                </div>
                @if($errors->any())
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
