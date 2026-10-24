<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('landing.index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2 p-2"></i>Ir a App</h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="{{ route('slides.index') }}"
                class="nav-item nav-link {{ request()->routeIs('slides.*') ? 'active' : '' }}"><i
                    class="fa fa-layer-group me-2"></i>Slider</a>
            <a href="{{ route('noticias.index') }}"
                class="nav-item nav-link {{ request()->routeIs('noticias.*') ? 'active' : '' }}"><i
                    class="fa fa-table me-2"></i>Noticias</a>
            <a href="{{ route('galeria.index') }}"
                class="nav-item nav-link {{ request()->routeIs('galeria.*') ? 'active' : '' }}"><i
                    class="fa fa-th me-2"></i>Galería</a>
            <a href="{{ route('contacto.index') }}"
                class="nav-item nav-link {{ request()->routeIs('contacto.*') ? 'active' : '' }}"><i
                    class="fa fa-keyboard me-2"></i>Contacto</a>
        </div>
    </nav>
</div>