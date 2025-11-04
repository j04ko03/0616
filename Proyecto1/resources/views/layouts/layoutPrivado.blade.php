<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="pestaña">OrgaTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    @include('barraNavegacion', ['usuario' => auth()->user()])
    
    <!-- Contenido principal -->
    <main class="main-content">
        @yield('content')
    </main>

    @stack('scripts')

    <script src="js/rutasMostrar.js"></script>
    
</body>
</html>