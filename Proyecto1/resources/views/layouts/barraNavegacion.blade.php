@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrgaTime Dashboard</title>

    <!-- Tailwind CSS (opcional, pero recomendado para el estilo del ejemplo) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-100 border-b p-4 flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="{{ route('home.controller') }}" class="font-bold text-gray-700">OrgaTime</a>
            <a href="{{ route('home.controller') }}" class="bg-yellow-300 px-3 py-1 rounded">Dashboard</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Projects</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Calendar</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Team</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Reports</a>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-gray-700">Nombre usuario</span>
            <button class="bg-gray-200 px-3 py-1 rounded-full">⚙️</button>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>