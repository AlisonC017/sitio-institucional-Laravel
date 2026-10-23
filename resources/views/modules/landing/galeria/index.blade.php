@extends('appLanding')

@section('titulo', 'Galería')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Galería</h6>
                <h1 class="mb-5">Galería Fotográfica</h1>
            </div>

            <div class="row g-3 popup-gallery">
                @forelse ($fotos as $foto)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="{{ asset($foto->imagen) }}" title="{{ $foto->descripcion }}">
                            <img src="{{ asset($foto->imagen) }}" alt="{{ $foto->descripcion }}" class="img-fluid rounded w-100"
                                style="height: 200px; object-fit: cover;">
                            <small class="d-block bg-dark text-white p-2">{{ $foto->descripcion }}</small>
                        </a>
                    </div>
                @empty
                    <p class="text-center text-muted">Aún no hay fotos en la galería.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- defer: jQuery se carga al final del body en appLanding, así el plugin espera a que exista --}}
    <script defer
        src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: { enabled: true },
                image: { titleSrc: 'title' }
            });
        });
    </script>
@endsection