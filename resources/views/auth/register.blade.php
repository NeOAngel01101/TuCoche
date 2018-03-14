@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de Usuario</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/register') }}" id="userform">
                            {!! csrf_field() !!}

                            <div class="form-group row{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <label for="tipo" class="col-md-4 col-form-label text-lg-right">Tipo de vendedor</label>
                                <div class="col-md-6">
                                    <select name="tipo" class="custom-select custom-select-lg mb-3" id="tipo" title="tipo">
                                        <option selected></option>
                                        <option value="Particular">Particular</option>
                                        <option value="Profesional">Profesional</option>
                                    </select>
                                    @if($errors->has('tipo'))
                                        @foreach($errors->get('tipo') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-lg-4 col-form-label text-lg-right">Nick</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"  autofocus>
                                    @if ($errors->has('username'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre de usuario</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-lg-4 col-form-label text-lg-right">Apellido del usuario</label>
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}"  autofocus>
                                    @if ($errors->has('apellido'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('apellido') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-lg-4 col-form-label text-lg-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">Confirmar contraseña</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                    >
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit"  class="btn btn-primary" id="registrouser">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset ('js/ValidacionUser.js')}}"></script>
    @endpush
@endsection
