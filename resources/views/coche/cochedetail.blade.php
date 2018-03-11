@extends('layouts.app')
    @section('content')

        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Coche</div>
                        <div class="card-body">

                            <div class="form-group row">
                                <h3>
                                    Nombre: {{ $coche['nombre'] }}
                                </h3>
                            </div>

                        </div></div>
                </div>
            </div>
        </div>



@endsection