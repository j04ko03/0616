<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="pestaña">OrgaTime</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    @include('barraNavegacion', ['usuario' => Auth::user()->apodo])
    
    <!-- Contenido principal -->
    <main class="main-content">
        @yield('content')
    </main>

    @stack('scripts')

    <script src="js/rutasMostrar.js"></script>
    <script>
        // Esperar 5 segundos (5000 ms) y ocultar el contenedor de errores
        setTimeout(() => {
            const errores = document.querySelector('#errores'); // asumiendo que tu include tiene un id="errores"
            if(errores){
                errores.style.display = 'none';
            }
        }, 5000);
    </script>
    
</body>
</html>