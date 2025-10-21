<link rel="stylesheet" href="{{ url('/css/cardItem.css') }}">

@php
    $color = 'red'; // valor por defecto
    switch ($estado) {
        case 1:
            $color = 'yellow';
            break;
        case 2:
            $color = 'green';
            break;
        default:
            $color = 'red';
    }
@endphp 



<div class="card-contenedor cardProyectoId" data-proyecto='@json($dataProyecto)'>
    <div class="card-interior">
        <div class="card-cabecera">
            <div style="display: flex; justify-content: center">
                <div style="height: 90px; width: 90px; 
                display: flex; flex-wrap: wrap; justify-content: space-between; 
                align-items: center;">
                    <!-- Iconos -->
                    <div style="flex: 1; margin: 0.5px; align-items: center">
                        <img src="../storage/assets/icons/NOajustes.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <div style="flex: 1; margin: 0.5px; margin: 0 5px; align-items: center">
                        <img src="../storage/assets/icons/NOhome.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <div style="flex: 1; margin: 0.5px; margin: 0 5px; align-items: center">
                        <img src="../storage/assets/icons/NOReports.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
        </div>
    <div class="card-titulo">
        <div>
            <h2 class="titulo">{{ $titulo }}</h2>
        </div>
        <div class="padding-right">
            <p class="texto-gris">Fecha de entrega</p>
        </div>
    </div>

    <div class="card-tareas">    
        <ul>
            <li id="TareasCompletadas">Tareas completadas: 0</li>
            <li id="TareasValidar">Tareas creadas: 0</li>
            <li id="TareasPendientes">Tareas pendientes: 0</li>
        </ul>
    </div>
    <div class="card-estado" style="background-color: {{ $color }}">    
    </div>

    </div>

   
</div>

<script src="{{ url('/js/fillCardItemProyectos.js') }}"></script>