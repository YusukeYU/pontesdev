@extends('admin.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Profile</h1>
        <div class="row">
            <div class="test2x">
                <div class="card shadow mb-4">
                    <div style="margin-bottom:1rem!important;" class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Configurações de Senha</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user_set_password') }}" method="POST" id="data" class="form">
                            @csrf
                            <h6 style="margin-bottom:1rem!important;" class="m-0 font-weight-bold text-primary">Senha atual
                            </h6>
                            <input type="password" name="currentPassword" class="inputsx2" maxlength="19">

                            <h6 style="margin-bottom:1rem!important;" class="m-0 font-weight-bold text-primary">Senha nova
                            </h6>
                            <input type="password" name="newPassword1" class="inputsx2" maxlength="19">

                            <h6 style="margin-bottom:1rem!important;" class="m-0 font-weight-bold text-primary">Repita a
                                senha nova</h6>
                            <input type="password" name="newPassword2" class="inputsx2">

                            <br> <button style="margin-bottom:1rem!important;" id="btn-alter-password" href="#"
                                class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Alterar senha</span>
                            </button>
                        </form>
                        @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p style="color: red">{{ $error }}</p>
                                @endforeach
                        @endif
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if (Session::has('alert-' . $msg))
                                <div style="margin-bottom: 0!important;" class="alert alert-{{ $msg }}" role="alert">
                                    {!! Session::get('alert-' . $msg) !!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
