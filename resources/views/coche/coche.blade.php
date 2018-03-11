@if($coches->isEmpty())
    <p>El usuario no esta vendiendo actualmente ningun coche</p>
@endif

@foreach($coches->chunk(3) as $chunk)
        @foreach($chunk as $coche)
            <div class="row border shadow">
                <div class="col-4"><img class="lozad" src="{{ $coche['imagen1'] }}"  width="300px" height="200px"></div>
                <div class="col-6">
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
            <br>
        @endforeach
@endforeach

