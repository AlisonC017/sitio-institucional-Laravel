@extends('appAdmin')

@section('titulo', $noticia->id_noticia > 0 ? 'Editar Noticia' : 'Crear Noticia')
@section('tituloPrincipal', $noticia->id_noticia > 0 ? 'Editar Noticia' : 'Crear Noticia')

@section('contenido')
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Content Start -->
        <div class="content">

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                     <div class="col-12 col-lg-10">
                        <div class="bg-light rounded h-100 p-4" style="margin-left: -224px; ">

                            <h6 class="mb-4">
                                {{ $noticia->id_noticia > 0 ? 'Editar Noticia' : 'Crear Noticia' }}
                            </h6>
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if ($noticia->id_noticia > 0)
                                    @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" name="titulo" id="titulo"
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        value="{{ old('titulo', $noticia->titulo) }}">
                                    @error('titulo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contenido" class="form-label">Contenido</label>
                                    <textarea name="contenido" id="contenido" class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $noticia->contenido) }}</textarea>
                                    @error('contenido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input type="file" name="imagen" id="imagen"
                                        class="form-control @error('imagen') is-invalid @enderror">
                                    @error('imagen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ $noticia->id_noticia > 0 ? 'Actualizar' : 'Crear' }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
    </div>
@endsection
