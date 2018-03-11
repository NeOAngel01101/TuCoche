@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">Añadir Coche para vender</div>
                    <div class="card-body">
                        <form action="/coches/create" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-sm-6{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre">Nombre </label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" autofocus>
                                        @if($errors->has('nombre'))
                                            @foreach($errors->get('nombre') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>

                                <div class="col-sm-6{{ $errors->has('marca') ? ' has-error' : '' }}">
                                    <label for="marca">Marca</label>
                                        <input class="form-control" id="marca" name="marca" type="text" value="{{ old('marca') }}">
                                        @if($errors->has('marca'))
                                            @foreach($errors->get('marca') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>
                            </div>


                            <div class="form-group row justify-content-md-center">
                                <div class="col-sm-3{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo">Tipo</label>
                                        <select name="tipo" class="form-control" id="tipo" title="tipo">
                                            <option selected></option>
                                            <option value="sedan">sedan</option>
                                            <option value="hatchback">hatchback</option>
                                            <option value="deportivo">deportivo</option>
                                            <option value="coupe">coupe</option>
                                            <option value="familiar">familiar</option>
                                            <option value="todoterreno">todoterreno</option>
                                        </select>
                                </div>

                                <div class="col-sm-3{{ $errors->has('year') ? ' has-error' : '' }}">
                                    <label for="year" class="center">Año</label>
                                        <input id="year" type="date" class="form-control" name="year" value="{{ old('year') }}" autofocus>
                                        @if($errors->has('year'))
                                            @foreach($errors->get('year') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>


                                <div class="col-sm-3{{ $errors->has('precio') ? ' has-error' : '' }}">
                                    <label for="precio" >Precio</label>
                                        <input id="precio" type="number" step="any" class="form-control" name="precio" value="{{ old('precio') }}" autofocus>
                                        @if($errors->has('precio'))
                                            @foreach($errors->get('precio') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6{{ $errors->has('localidad') ? ' has-error' : '' }}">
                                    <label for="localidad">Localidad </label>
                                        <input type="text" class="form-control" name="localidad" id="localidad" value="{{ old('localidad') }}" autofocus>
                                        @if($errors->has('localidad'))
                                            @foreach($errors->get('localidad') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>

                                <div class="col-sm-6{{ $errors->has('kilometros') ? ' has-error' : '' }}">
                                    <label for="kilometros">Kilometros totales del coche</label>
                                        <input type="number" class="form-control" name="kilometros" id="kilometros" value="{{ old('kilometros') }}" autofocus>
                                        @if($errors->has('kilometros'))
                                            @foreach($errors->get('kilometros') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <div class="col-sm-3{{ $errors->has('repostaje') ? ' has-error' : '' }}">
                                    <label for="repostaje">Repostaje</label>
                                        <select name="repostaje" class="form-control" id="repostaje" title="repostaje">
                                            <option selected></option>
                                            <option value="electrico">electrico</option>
                                            <option value="gasolina">Gasolina</option>
                                            <option value="diesel">diesel</option>
                                        </select>
                                        @if($errors->has('repostaje'))
                                            @foreach($errors->get('repostaje') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>

                                <div class="col-sm-3{{ $errors->has('cv') ? ' has-error' : '' }}">
                                    <label for="cv">cv </label>
                                        <input type="number" class="form-control" name="cv" id="cv" value="{{ old('cv') }}" autofocus>
                                        @if($errors->has('cv'))
                                            @foreach($errors->get('cv') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>

                                <div class="col-sm-3{{ $errors->has('cambio') ? ' has-error' : '' }}">
                                    <label for="cambio">cambio</label>
                                        <select name="cambio" class="form-control" id="cambio" title="cambio">
                                            <option selected></option>
                                            <option value="manual">manual</option>
                                            <option value="automatico">automatico</option>
                                            <option value="semiatumatico">semiautomatico</option>
                                        </select>
                                        @if($errors->has('cambio'))
                                            @foreach($errors->get('cambio') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                </div>
                            </div>


                            <div class="form-group row{{ $errors->has('imagen1') ? ' has-error' : '' }}">
                                <label for="imagen1" class="col-md-4 col-form-label text-lg-right">Foto Principal </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="imagen1" id="imagen1" value="{{ old('imagen1') }}" autofocus>
                                    @if($errors->has('imagen1'))
                                        @foreach($errors->get('imagen1') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion" class="col-md-4 col-form-label text-lg-right">descripcion </label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" rows="5" autofocus></textarea>
                                    @if($errors->has('descripcion'))
                                        @foreach($errors->get('descripcion') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('fichatecnica') ? ' has-error' : '' }}">
                                <label for="fichatecnica" class="col-md-4 col-form-label text-lg-right">fichatecnica </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fichatecnica" id="fichatecnica" value="{{ old('fichatecnica') }}" autofocus>
                                    @if($errors->has('fichatecnica'))
                                        @foreach($errors->get('fichatecnica') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Empezar a vender coche
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/autocomplete.js') }}" ></script>
    @endpush
@endsection
