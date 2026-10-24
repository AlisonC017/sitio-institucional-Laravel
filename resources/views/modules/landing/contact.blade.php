@extends('appLanding')

@section('titulo', 'Contacto')

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Contacto</h6>

                @if ($contacto?->logo)
                <div class="my-4">
                    <img src="{{ asset($contacto->logo)}}" alt="Logo {{ $contacto->nombre_empresa }}" class="img-fluid" style="max-height: 120px; width:auto;">
                </div>
                @endif

                <h1 class="mb-5">{{ $contacto?->nombre_empresa }}</h1>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary mb-0">Dirección</h5>
                            <p class="mb-0">{{ $contacto?->direccion }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary mb-0">Teléfono</h5>
                            <p class="mb-0">{{ $contacto?->telefono }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary mb-0">Correo electrónico</h5>
                            <p class="mb-0">{{ $contacto?->correo }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-facebook-f text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary mb-0">Facebook</h5>
                            <a href="{{ $contacto?->facebook }}" target="_blank">{{ $contacto?->facebook }}</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fab fa-instagram text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary mb-0">Instagram</h5>
                            <a href="{{ $contacto?->instagram }}" target="_blank">{{ $contacto?->instagram }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <h5>Envíanos un mensaje</h5>

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

                    <form action="{{ route('landing.contacto.enviar') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="Nombre" value="{{ old('nombre') }}">
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="correo" class="form-control" id="correo"
                                        placeholder="Correo" value="{{ old('correo') }}">
                                    <label for="correo">Correo electrónico</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="asunto" class="form-control" id="asunto"
                                        placeholder="Asunto" value="{{ old('asunto') }}">
                                    <label for="asunto">Asunto</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"
                                        style="height: 150px">{{ old('mensaje') }}</textarea>
                                    <label for="mensaje">Mensaje</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection