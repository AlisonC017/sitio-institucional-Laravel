@extends('appAdmin')

@section('titulo', 'Contacto')
@section('tituloPrincipal', 'Información de Contacto')

@section('contenido')
    <div class="container-fluid px-4">

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

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
            <form action="{{ route('contacto.guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Logo de la institución (JPG o PNG, máx. 2 MB)</label>
                    @if ($contacto->logo)
                        <div class="mb-2">
                            <img src="{{ asset($contacto->logo) }}" alt="Logo" style="height: 80px;">
                        </div>
                    @endif
                    <input type="file" name="logo" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre de la institución</label>
                    <input type="text" name="nombre_empresa" class="form-control"
                        value="{{ old('nombre_empresa', $contacto->nombre_empresa) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control"
                        value="{{ old('direccion', $contacto->direccion) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                        value="{{ old('telefono', $contacto->telefono) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo', $contacto->correo) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control"
                        value="{{ old('facebook', $contacto->facebook) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control"
                        value="{{ old('instagram', $contacto->instagram) }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar información</button>
            </form>
        </div>
    </div>
@endsection