<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('landing.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Sitio Institucional Laravel - Grupo #3</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('landing.index') }}"
                class="nav-item nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}">Inicio</a>
            <a href="{{ route('landing.noticias') }}"
                class="nav-item nav-link {{ request()->routeIs('landing.noticias*') ? 'active' : '' }}">Noticias</a>
            <a href="{{ route('landing.galeria') }}"
                class="nav-item nav-link {{ request()->routeIs('landing.galeria') ? 'active' : '' }}">Galería</a>
            <a href="{{ route('landing.contacto') }}"
                class="nav-item nav-link {{ request()->routeIs('landing.contacto*') ? 'active' : '' }}">Contacto</a>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"> Admin<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>