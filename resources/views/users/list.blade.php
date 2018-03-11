@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Siendo vendidos por {{ $user['username'] }}</h1>
    </div>
    @include('coche.coche')

    <div class="text-center">{{ $coches->links('pagination::bootstrap-4') }}</div>
@endsection
