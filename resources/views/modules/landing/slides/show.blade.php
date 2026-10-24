@extends('appLanding')

@section('titulo', 'Detalle del Slide')

@section('content')

    <div class="container py-5">

        <div class="mb-4">
            <a href="{{ route('landing.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa fa-arrow-left me-2"></i>Volver al inicio
            </a>
        </div>

        <div class="card border-0 shadow rounded-4 overflow-hidden">

            <div class="bg-light text-center p-3">
                <img src="{{ asset($slide->imagen) }}" alt="{{ $slide->titulo }}" class="img-fluid rounded-3"
                    style="width: 100%; max-height: 500px; object-fit: contain;">
            </div>

            <div class="card-body p-4 p-md-5">

                <span class="badge rounded-pill px-3 py-2 mb-3" style="background-color: #06BBCC; color: white;">
                    Detalles
                </span>

                <h1 class="fw-bold mb-4" style="color: #181d38;">
                    {{ $slide->titulo }}
                </h1>

                <div class="mb-4" style="width: 70px; height: 4px; background-color: #06BBCC;"></div>

                <p class="text-secondary lh-lg" style="font-size: 1.1rem; white-space: pre-line;">
                    {{ $slide->descripcion ?: 'No hay una descripcion disponible para este contenido.' }}
                </p>

                <div class="mt-5 pt-3 border-top">
                    <a href="{{ route('landing.index') }}" class="btn rounded-pill px-4 py-2 text-white"
                        style="background-color: #06BBCC;">
                        <i class="fa fa-home me-2"></i>Regresar al inicio
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection