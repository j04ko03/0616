@extends('layouts.barraNavegacion')

@section('content')
        <!--<div class="contenedor-padre" style="border: 1px solid black">-->
        <div class="container mx-auto p-4" style="border: 1px solid black;">
        <h1 class="h1" style="border: 1px solid red">DASHBOARD</h1>
        <div class="contenedorBtnsPrincipales" style="border: 1px solid blue">
                <button id="btn-proyectos"
                    class="btnInteractivoProyectos">
                    Proyectos recientes
                </button>
            <button id="btn-tareas"
                class="btnInteractivoTareas">
                Tareas asignadas
            </button>
        </div>

        <div id="section-proyectos" class="contenedorPadreGrid contenedorScroll">
            <div class="gridCards" style="border: 1px solid purple">
                @foreach($proyectosRecientes as $proyecto)
                    <x-cardItemReciente 
                        titulo="{{ $proyecto['titulo'] }}" 
                        descripcion="{{ $proyecto['descripcion'] }}"
                    />  
                @endforeach
            </div>
        </div>

        <!-- Queda oculto al cargar la página display: none; -->
        <div id="section-tareas" class="contenedorPadreGrid contenedorScroll oculto">
            <div class="gridCards margenElementsGridTareas">
                @foreach($tareasAsignadas as $tarea)
                    <!--<li>{{ $tarea['titulo'] }} — {{ $tarea['descripcion'] }}</li>-->
                        <x-listItemTarea
                            titulo="{{ $tarea['titulo'] }}"
                            descripcion="{{ $tarea['descripcion'] }}"
                            :tag="$tarea['tag']"
                        />
                @endforeach
            </div >
        </div>

        <h2 class="text-xl font-bold mb-2">Proyectos</h2>
        <div class="alturaFija contenedorScroll">
            <div class="gridCardsProyectos"  style="border: 1px solid orange">
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
    

    <!--<script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnProyectos = document.getElementById('btn-proyectos');
            const btnTareas = document.getElementById('btn-tareas');
            const sectionProyectos = document.getElementById('section-proyectos');
            const sectionTareas = document.getElementById('section-tareas');

            btnProyectos.addEventListener('click', () => {
                sectionProyectos.style.display = 'block';
                sectionTareas.style.display = 'none';
                btnProyectos.style.color = '#16a34a';
                btnProyectos.style.borderBottom = '2px solid #16a34a';
                btnTareas.style.color = '#6b7280';       
                btnTareas.style.borderBottom = 'none';
            });

            btnTareas.addEventListener('click', () => {
                sectionProyectos.style.display = 'none';
                sectionTareas.style.display = 'block';
                btnTareas.style.color = '#16a34a';
                btnTareas.style.borderBottom = '2px solid #16a34a';
                btnProyectos.style.color = '#6b7280';
                btnProyectos.style.borderBottom = 'none';

                btnProyectos.style.color = '#6b7280';
            });
        });
    </script>-->
@endsection