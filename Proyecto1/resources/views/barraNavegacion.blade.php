<nav id="navbar" class="navbar">
    <div class="navbar-container">
        <!-- Logo a la izquierda -->
        <a href="{{ route('home.controller') }}" class="nav-logo">
            <img src="{{ asset('../storage/assets/logotipos/sinFondo.png') }}" alt="OrgaTime Logo">
        </a>

        <div class="navbar-left">
            @if (Auth::user()->tipoUser == 0 || Auth::user()->tipoUser == 2) 
                <a href="{{ route('vistaGlobal.controller') }}" class="nav-link">Teams</a>
            @endif
            <div class="nav-links">
                <a href="{{ route('home.controller') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('crearProyecto.controller') }}" class="crear-proyecto">
                    +
                    <div class="popout">
                        Crear nuevo proyecto
                    </div>
                </a>
            </div>
        </div>

            <div class="navbar-right">
                <span class="username" href="{{ route('perfil.controller') }}">{{ Auth::user()->apodo }}</span> 
                <button onclick="window.location='{{ route('perfil.controller') }}'" class="settings-btn">⚙️</button>
            </div>
    </div>
</nav>