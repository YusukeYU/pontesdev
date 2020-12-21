@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Configurações de foto</h6>
                </div>
                <div style="padding: 1.25rem!important;" class="card-body">
                     <p> Altere, substitua ou apague sua foto atual.</p>
                    <a href="/dashboard/profile/photo" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Alterar foto</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Altere sua senha</h6>
                </div>
                <div style="padding: 1.25rem!important;" class="card-body">
                    <p> Altere sua senha atual na base de dados. </p>
                
                    <a href="/dashboard/profile/password" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Alterar senha</span>
                    </a>
                </div>     
            </div>
        </div>
    </div>
</div>
   

@endsection
