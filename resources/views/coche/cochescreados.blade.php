@extends('layouts.app')

@section('content')
    <h1 align="center">ADMINISTRACION DE COCHES <a class="edit-modal btn btn-success" href="/coches/create">Crear</a></h1>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Marca</th>
        <th>año</th>
        <th>kilometros</th>
        <th>Editar</th>
        <th>Borrar</th>
    </tr>
    </thead>
    @foreach($coches as $coche)

    <tbody>
    <tr>
        <td><img src="{{ $coche['imagen1'] }}" width="150" height="70"></td>
        <td><a href="/coches/buscar/{{ $coche['id'] }}">{{ $coche['nombre'] }}</a></td>
        <td>{{ $coche['marca'] }}</td>
        <td>{{ $coche['year'] }}</td>
        <td>{{ $coche['kilometros'] }}</td>
        <td><a class="edit btn btn-success" href="/administrar/editarcoche/{{ $coche['id'] }}"> Editar
            </a>
        </td>
        <td><a class="delete btn btn-danger" href="/administrar/delete/{{ $coche['id'] }}"> Borrar
            </a></td>
        @endforeach
        @endsection

        </tr>
    </tbody>
</table>


