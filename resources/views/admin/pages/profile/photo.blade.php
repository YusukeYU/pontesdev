@extends('admin.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Profile</h1>

        <div class="row">

            <div class="col-lg-6">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Alterar</h6>
                    </div>
                    <div style="padding: 1.25rem!important;" class="card-body">
                        <form action="{{ route('user_set_photo') }}" method="POST" class="form"
                            enctype="multipart/form-data">
                            <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                            @csrf
                            <small> *aceitos formatos como : jpg,jpeg,png*</small><br>
                            <input type="file" name="img" class="inputsx2" style="color: transparent">

                            <br> <button id="submit" class="btn btn-secondary btn-icon-split" type="submit"><span
                                    class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Alterar foto de perfil atual</span></button>
                        </form>

                        @if ($errors->any())
                            <ul style="margin-top: 1rem">
                                @foreach ($errors->all() as $error)
                                    <li style="color: red">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Remover</h6>
                    </div>
                    <div style="padding: 1.25rem!important;" class="card-body">
                        <div class="identorx1"> </div>
                        <p> Remova a foto de perfil que utilizas no momento. </p>
                        <a href="/dashboard/profile/photo/delete" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Remover Foto Atual</span>
                        </a>
                        <div class="identorx1"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
