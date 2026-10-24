@extends('appAdmin')

@section('titulo', 'Noticias')

@section('tituloPrincipal', 'Gestión Noticias')

@section('contenido')

    <div class="container-fluid px-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <div>
                    <h5 class="mb-1 fw-bold text-dark">Lista de Noticias</h5>
                    <small class="text-muted">Administra las noticias del sitio</small>
                </div>
                <a href="{{ route('noticias.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Agregar noticia
                </a>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Contenido</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $noticia)
                                <tr>
                                    <td>{{ $noticia->id_noticia }}</td>
                                    <td>
                                        <img src="{{ asset($noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="rounded"
                                            style="width: 200px; height: 120px; object-fit: cover;">
                                    </td>
                                    <td class="fw-semibold">{{ $noticia->titulo }}</td>
                                    <td class="text-muted">{{ $noticia->contenido }}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column align-items-center gap-2">
                                        <a class="btn btn-sm btn-outline-primary me-1" title="Editar"
                                            href="{{ route('noticias.edit', $noticia->id_noticia) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form action="{{ route('noticias.destroy', $noticia->id_noticia) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection