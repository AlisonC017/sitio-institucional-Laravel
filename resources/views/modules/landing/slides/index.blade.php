@extends('appLanding')


@section('titulo', 'Index')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($data as $slide)
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('storage/' . $slide->imagen) }}" alt="{{ $slide->titulo }}">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ $slide->titulo }}</h5>
                                    <h1 class="display-3 text-white animated slideInDown">{{ $slide->titulo }}</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">{{ $slide->descripcion }}</p>
                                    <a href="{{ route('slides.show', $slide->id_slide) }}"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Ver mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Noticias Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center mb-4">
                <h6 class="section-title bg-white text-center text-primary px-3">Ultimas Noticias</h6>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($noticias as $noticia)
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="course-item bg-light h-100">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $noticia->imagen) }}"
                                    alt="{{ $noticia->titulo }}" style="height: 220px; object-fit: cover;">
                            </div>

                            <div class="text-center p-4">
                                <h5 class="mb-3">{{ $noticia->titulo }}</h5>
                                <p>{{ Str::limit($noticia->contenido, 120) }}</p>
                                <a href="{{ route('noticias.show', $noticia->id_noticia) }}" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('noticias.index') }}" class="btn btn-primary py-3 px-5">
                    Ver todas las noticias
                </a>
            </div>
        </div>
    </div>
    <!-- Noticias End -->

@endsection