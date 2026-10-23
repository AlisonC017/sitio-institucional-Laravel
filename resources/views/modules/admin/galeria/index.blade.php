@extends('appAdmin')

@section('titulo', 'Galería')

@section('tituloPrincipal', 'Gestión de Galería')

@section('contenido')
    <div class="container-fluid px-4">

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Fotografías</h5>
                    <small class="text-muted">Administra las fotos de la galería pública</small>
                </div>
                <a href="{{ route('galeria.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Nueva foto
                </a>
            </div>

            <div class="card-body">
                <div class="row g-4">
                    @forelse ($fotos as $foto)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="card h-100 border">
                                <img src="{{ asset($foto->imagen) }}" alt="{{ $foto->descripcion }}" class="card-img-top"
                                    style="height: 180px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <p class="small mb-3">{{ $foto->descripcion }}</p>

                                    <a class="btn btn-sm btn-outline-primary me-1" title="Editar"
                                        href="{{ route('galeria.edit', $foto->id_foto) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('galeria.destroy', $foto->id_foto) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('¿Eliminar esta foto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mb-0">No hay fotos registradas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection