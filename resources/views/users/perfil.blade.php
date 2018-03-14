@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Perfil</li>
    </ol>
    <body background="http://www.nervionindustries.com/wp-content/uploads/2015/01/lineas-blancas.png">
    <div class="container">
        <div class="row" style="padding-top: 13%;">
            <div class="col-sm-3 ">
                <img src="{{ $user['avatar'] }}"  width="261" height="245">
            </div>

            <div class="col-sm-9 border shadow" style="padding-top: 15px;">
                <div>
                    <h4><strong>Nombre:</strong> {{ $user['name'] }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <strong>Apellido:</strong> {{ $user['apellido'] }}</h4>
                </div>

                <div>
                    <h4><strong>Telefono:</strong> {{ $user['telefonomovil'] }}</h4>
                </div>

                <div>
                    <h4><strong>Tipo:</strong> {{ $user['tipo'] }}</h4>
                </div>

                <div>
                    <h4><strong>Web:</strong> {{ $user['web'] }}</h4>
                </div>

                <div>
                    <h4><strong>Email:</strong> {{ $user['email'] }}</h4>
                </div>

                <div>
                    <h4><strong>Descripcion:</strong> {{ $user['descripcion'] }}</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col">

        </div>
        <div class="col">
            <a class="btn btn-secondary col" href="{{ url('/profile/account') }}">Modificar perfil</a>
        </div>
        <div class="col">

        </div>
    </div>
    </body>
@endsection


