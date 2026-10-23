@extends('appLanding')

@section('titulo', 'Noticias')

@section('content')

    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h6 class="section-title bg-white text-center text-primary px-3">Noticias</h6>
                <h1 class="mb-0">Todas las noticias</h1>
            </div>

            @forelse ($noticias as $noticia)
                <div class="row g-4 align-items-center pb-4 mb-4 border-bottom">
                    <div class="col-md-4">
                        <img src="{{ asset($noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="img-fluid rounded w-100"
                            style="height: 220px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h4 class="mb-3">{{ $noticia->titulo }}</h4>
                        <p class="text-secondary">{{ Str::limit($noticia->contenido, 200) }}</p>
                        <a href="{{ route('landing.noticias.show', $noticia->id_noticia) }}" class="btn btn-primary">
                            Leer más
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Todavía no hay noticias registradas.</p>
            @endforelse

        </div>
    </div>

@endsection