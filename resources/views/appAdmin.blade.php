{{-- Plantilla general --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADMIN - @yield('titulo')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('layouts.admin.css')
</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('layouts.admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <h1 class="display-5 fw-bold text-primary m-4">
                @yield('tituloPrincipal', 'Defecto')
            </h1>

            @yield('contenido')

            <!-- Footer Start -->
            @include('layouts.admin.footer')

        </div>

        @include('layouts.admin.js')
</body>

</html>
