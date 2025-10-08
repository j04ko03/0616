@extends('layouts.barraNavegacion')

@section('content')
    <div class="container mx-auto p-4" style="border: 1px solid black">
        <h1 class="text-2xl font-bold mb-4" style="border: 1px solid red">DASHBOARD</h1>
        <div class="flex space-x-4 border-b mb-6" style="border: 1px solid blue">
            <button id="btn-proyectos"
                class="text-green-600 border-b-2 border-green-600 pb-2">
                Proyectos recientes
            </button>
            <button id="btn-tareas"
                class="text-gray-500 pb-2 hover:text-green-600">
                Tareas asignadas
            </button>
        </div>
        

        <div id="section-proyectos" style="border: 1px solid green; height: 200px; overflow-y: auto; scrollbar-width: none;">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8" style="border: 1px solid purple">
                @foreach($proyectosRecientes as $proyecto)
                    <!--<div class="bg-white shadow-md rounded-xl p-4 hover:shadow-lg transition cursor-pointer">
                        <h2 class="text-lg font-semibold">{{ $proyecto['titulo'] }}</h2>
                        <p class="text-gray-600">{{ $proyecto['descripcion'] }}</p>
                    </div>-->
                    <x-cardItemReciente 
                        titulo="{{ $proyecto['titulo'] }}" 
                        descripcion="{{ $proyecto['descripcion'] }}"
                    />  
                @endforeach
            </div>
        </div>
        <!-- Queda oculto al cargar la página display: none; -->
        <div id="section-tareas" style="display: none; border: 1px solid darkorange; height: 200px; overflow-y: auto; scrollbar-width: none;">
            <ul>
                @foreach($tareasAsignadas as $tarea)
                    <li>{{ $tarea['titulo'] }} — {{ $tarea['descripcion'] }}</li>
                @endforeach
            </ul>
        </div>



        <h2 class="text-xl font-bold mb-2">Proyectos</h2>
        <div style="height: 450px; overflow-y: auto; scrollbar-width: none;">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4"  style="border: 1px solid orange">
            @foreach ($proyectosTotal as $proyectoT)
                <x-cardItempProyectos 
                    titulo="{{ $proyectoT['titulo'] }}" 
                    descripcion="{{ $proyectoT['descripcion'] }}"
                    estado="{{ $proyectoT['estado'] }}"
                />
            @endforeach
        </div>
        </div>
    </div>   
    


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnProyectos = document.getElementById('btn-proyectos');
            const btnTareas = document.getElementById('btn-tareas');
            const sectionProyectos = document.getElementById('section-proyectos');
            const sectionTareas = document.getElementById('section-tareas');

            btnProyectos.addEventListener('click', () => {
                sectionProyectos.style.display = 'block';
                sectionTareas.style.display = 'none';
                btnProyectos.classList.add('text-green-600', 'border-b-2', 'border-green-600');
                btnTareas.classList.remove('text-green-600', 'border-b-2', 'border-green-600');
                btnTareas.classList.add('text-gray-500');
            });

            btnTareas.addEventListener('click', () => {
                sectionProyectos.style.display = 'none';
                sectionTareas.style.display = 'block';
                btnTareas.classList.add('text-green-600', 'border-b-2', 'border-green-600');
                btnProyectos.classList.remove('text-green-600', 'border-b-2', 'border-green-600');
                btnProyectos.classList.add('text-gray-500');
            });
        });
    </script>
@endsection