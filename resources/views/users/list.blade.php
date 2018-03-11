@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Siendo vendidos por {{ $user['username'] }}</h1>
    </div>
    @include('coche.coche')


        <form action="/{{ $user->username }}/dms" method="post">
            {{ csrf_field() }}
            <textarea name="message" id="message" rows="5"></textarea>
            <button type="submit" class="button">Mensaje Directo</button>
        </form>

    @if( $conversation )
        <a href="{{ route('conversation.show', $conversation->id) }}">Mensajes</a>
    @endif

    <div class="text-center">{{ $coches->links('pagination::bootstrap-4') }}</div>
@endsection
