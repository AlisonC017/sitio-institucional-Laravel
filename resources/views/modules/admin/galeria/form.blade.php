@extends('appAdmin')

@section('titulo', $foto->exists ? 'Editar Foto' : 'Agregar Foto')
@section('tituloPrincipal', $foto->exists ? 'Editar Foto' : 'Agregar Foto')

@section('contenido')
    <div class="container-fluid px-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-light rounded p-4">
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($foto->exists)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        value="{{ old('descripcion', $foto->descripcion) }}">
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen (JPG, PNG o WEBP, máx. 2 MB)</label>

                    @if ($foto->exists && $foto->imagen)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $foto->imagen) }}" alt="{{ $foto->descripcion }}"
                                class="rounded" style="height: 120px;">
                        </div>
                    @endif

                    <input type="file" name="imagen" id="imagen" class="form-control">
                    @if ($foto->exists)
                        <small class="text-muted">Déjalo vacío si no quieres cambiar la imagen.</small>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ $foto->exists ? 'Actualizar' : 'Guardar' }}
                </button>
                <a href="{{ route('galeria.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection