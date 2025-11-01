<link rel="stylesheet" href="{{ url('/css/cardItem.css') }}">

@php
    $color = 'red'; // valor por defecto
    switch ($estado) {
        case 1:
            $color = 'red';
            break;
        case 2:
            $color = 'yellow';
            break;
        case 3:
            $color = 'green ';
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
            <p class="texto-gris">{{ $fechaEntrega }}</p>
        </div>
    </div>

    <div class="card-tareas">
        <div class="flex2">
            <div style="width: 40%;">
            <p>Tareas completadas:</p>
            </div>
            <div style="width: 50%;">
                <p id="TareasCompletadas">0</p>
            </div>
        </div>
        <div class="flex2">
            <div style="width: 40%;">
            <p>Tareas creadas:</p>
            </div>
            <div style="width: 50%;">
                <p id="TareasValidar">0</p>
            </div>
        </div>
        <div class="flex2">
            <div style="width: 40%;">
            <p>Tareas pendientes:</p>
            </div>
            <div style="width: 50%;">
                <p id="TareasPendientes">0</p>
            </div>
        </div>
    </div>
    <div class="card-estado" style="background-color: {{ $color }}">    
    </div>

    </div>

   
</div>

<script src="{{ url('/js/fillCardItemProyectos.js') }}"></script>