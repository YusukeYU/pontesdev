@extends('admin.layouts.template_initial')
@if(isset($login_failed))
<script>alert('Verifique os dados digitados e tente novamente!')</script>
@endif
@section('container')

    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Pontes Dev </h1>
                </div>
                <form action = "{{ route('login') }}" method="POST" class="user">
                    @csrf
                    <div class="form-group">
                    <input value = "{{old("email_user")}}" type="email" class="form-control form-control-user" name="email_user"
                            aria-describedby="emailHelp" placeholder="Digite seu endereço de e-mail...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password_user"
                            placeholder="Senha">
                    </div>
                    <div class="form-group">
                    </div>
                    <button id="submit" type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>

                <div class="text-center">
                    <a class="small" href="/admin-forgot">Esqueceu a senha?</a>
                </div>
                @if ($errors->any())
                    <div style="margin-top: 2%;" class="text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>



@endsection
