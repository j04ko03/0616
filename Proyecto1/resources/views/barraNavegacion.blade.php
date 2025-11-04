<nav id="navbar" class="navbar">
    <div class="navbar-container">
        <!-- Logo a la izquierda -->
        <a href="{{ route('home.controller') }}" class="nav-logo">
            <img src="{{ asset('../storage/assets/logotipos/sinFondo.png') }}" alt="OrgaTime Logo">
        </a>

        <div class="navbar-left">
            <div class="nav-links">
                <a href="{{ route('home.controller') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('crearProyecto.controller') }}" class="crear-proyecto">
                    <img id="img" src="../storage/assets/icons/plus.png" alt="" style="width: 5%; height: fit-content; cursor: pointer;">
                    <div class="popout">
                        Crear nuevo proyecto
                    </div>
                </a>
            </div>
        </div>

            <div class="navbar-right">
                <span class="username" href="{{ route('perfil.controller') }}">{{ $usuario->nombre }}</span> <!--Auth::user() si usas autenticación-->
                <button onclick="window.location='{{ route('perfil.controller') }}'" class="settings-btn">⚙️</button>
            </div>
    </div>
</nav>