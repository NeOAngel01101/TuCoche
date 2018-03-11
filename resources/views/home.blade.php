@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{ asset('imagenes/principal/carousel1.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{ asset('imagenes/principal/carousel2.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{ asset('imagenes/principal/carousel3.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </div>
    <br>
    <div class="container_casillas">
        <div class="row">
            <div class="col-sm">
                <img class="d-block img-fluid" src="{{ asset('imagenes/principal/foto1.png')}}" >
                Vende tu coche al mejor precio tanto a particulares como profesionales
            </div>
            <div class="col-sm">
                <img class="d-block img-fluid" src="{{ asset('imagenes/principal/foto2.jpg')}}" >
                Compra el coche de tus sueños ,simplemente hablando con el vendedor
                con nuestro sistema de ventas por mensajeria privada
            </div>
            <div class="col-sm">
                <img class="d-block img-fluid" src="{{ asset('imagenes/principal/foto3.jpg')}}" >
                Siempre con el respaldo de nuestra empresa por si hay algun tipo de percance
                tanto con el comprador como el vendedor.
            </div>
        </div>
    </div>

@endsection

