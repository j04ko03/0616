@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homePageBlade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cardItem.css') }}">
@endpush

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrgaTime Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Logo a la izquierda -->
            <a href="{{ route('home.controller') }}" class="nav-logo">
                <img src="{{ asset('../storage/assets/logotipos/conFondo.png') }}" alt="OrgaTime Logo">
            </a>
            
            <div class="navbar-left"> 
                <div class="nav-links">
                    <a href="{{ route('home.controller') }}" class="nav-link">Dashboard</a>
                    <a href="{{ route('proyectos.controller') }}" class="nav-link">Projects</a>
                    <a href="#" class="nav-link">Reports</a>
                </div>
            </div>
            
            <div class="navbar-right">
                <span class="username">Nombre usuario</span>
                <button class="settings-btn">⚙️</button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
