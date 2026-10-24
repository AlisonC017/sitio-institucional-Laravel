@extends('appAdmin')

@section('titulo', $slide->id_slide > 0 ? 'Editar Slide' : 'Crear Slide')
@section('tituloPrincipal', $slide->id_slide > 0 ? 'Editar Slide' : 'Crear Slide')

@section('contenido')
    <div class="container-xxl position-relative bg-white d-flex p-0 m-0">

        <!-- Content Start -->
        <div class="content">

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12 col-lg-10">
                        <div class="bg-light rounded h-100 p-4" style="margin-left: -224px; ">

                            <h6 class="mb-4">
                                {{ $slide->id_slide > 0 ? 'Editar Slide' : 'Crear Slide' }}
                            </h6>
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if ($slide->id_slide > 0)
                                    @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" name="titulo" id="titulo" class="form-control"
                                        value="{{ $slide->titulo }}">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion"
                                        class="form-control">{{ $slide->descripcion }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input type="file" name="imagen" id="imagen" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ $slide->id_slide > 0 ? 'Actualizar' : 'Crear' }}
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