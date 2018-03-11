@extends('layouts.app')

@section('content')
    @forelse($coches as $coche)
        <div class="row border shadow">
            <div class="col-sm-4"><img src="{{ $coche['imagen1'] }}" width="300px" height="200px"></div>

            <div class="col-sm-6">
                <h1><strong><a href="/coches/buscar/{{ $coche['id'] }}">{{ $coche['nombre'] }}</a></strong></h1>
                <h2>{{ $coche['precio'] }} € </h2> <br>
                {{ $coche['localidad'] }} |
                {{ $coche['repostaje'] }} |
                {{ $coche['year'] }}      |
                {{ $coche['kilometros'] }}Km

                <div>
                    {{ $coche['created_at'] }}
                </div>
            </div>
        </div>
        <div class="row border shadow">
            <div class="col-12 col-sm-6 col-md-8"></div>
            <div class="col-6 col-md-4"><a href="/user/{{ $coche->user->username }}">
                    Vendedor :{{ $coche->user->username }}</a></div>
        </div>
        <br>

        @empty
        <p>No hay coches a la venta de este tipo</p>
        @endforelse


    <div class="pagination">
        {{ $coches->links('pagination::bootstrap-4') }}
    </div>
@endsection


