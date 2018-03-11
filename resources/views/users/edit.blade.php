@extends('layouts.app')

@section('content')
    <body background="http://www.nervionindustries.com/wp-content/uploads/2015/01/lineas-blancas.png">
    <div>
        @if( session('exito') )
            <div class="alert alert-success">
                <h5 style="text-align: center;">Actualización correcta</h5>
            </div>
        @elseif( session('error'))
            <div class="alert alert-danger">
                <h5>{{ session('error') }}</h5>
            </div>
        @endif
    </div>

    <div class="row align-items-start">
        <div class="btn-group-vertical" id="botones">
            <a class="btn btn-secondary" href="{{ url('/profile') }}">Ir al Perfil</a>

            <a class="btn btn-secondary" style="cursor: default;">========================</a>
            <td class="{{ Request::is('profile/account') ? 'mine' : '' }}">
                <a class="btn btn-secondary" href="{{ route('profile.account') }}">Modificar Cuenta</a>
            </td>

            <td class="{{ Request::is('profile/password') ? 'mine' : '' }}">
                <a class="btn btn-secondary" href="{{ route('profile.password') }}">Cambiar Password</a>
            </td>

            <td class="{{ Request::is('profile/avatar') ? 'mine' : '' }}">
                <a class="btn btn-secondary" href="{{ route('profile.avatar') }}">Cambiar Avatar</a>
            </td>
            <a class="btn btn-secondary" style="cursor: default;">========================</a>
            <a class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Borrar Perfil</a>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar Perfil</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Usted esta intentando borrar su perfil.¿Esta seguro de que desea eliminarlo?
                            Despues de decir que si ,no podra revertir los cambios.
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a class="btn btn-success" data-dismiss="modal">Salir</a>
                            <a class="btn btn-danger" href="/profile/delete/{{$user->id}}">Eliminar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <form action="{{ Request::url() }}" method="POST">
                {{ csrf_field() }}

                @if( Request::is('profile/account') )
                    @include('users.partials.account')
                @elseif( Request::is('profile/password') )
                    @include('users.partials.password')
                @elseif( Request::is('profile/avatar') )
                    @include('users.partials.avatar')
                @endif

            </form>
        </div>
    </div>
    </body>
@endsection