<link rel="stylesheet" href="{{ asset('css/cardItem.css') }}">

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
            <div style="border: 1px solid rgb(65, 65, 161); display: flex; justify-content: center">
                <div style="height: 90px; width: 90px; border: 1px solid rgb(170, 24, 37); 
                display: flex; flex-wrap: wrap; justify-content: space-between; 
                align-items: center;">
                    <!-- Iconos -->
                    <div style="border: 1px solid pink; flex: 1; margin: 0.5px; align-items: center">
                        <img src="../storage/assets/icons/NOajustes.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <div style="border: 1px solid pink; flex: 1; margin: 0.5px; margin: 0 5px; align-items: center">
                        <img src="../storage/assets/icons/NOhome.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <div style="border: 1px solid pink; flex: 1; margin: 0.5px; margin: 0 5px; align-items: center">
                        <img src="../storage/assets/icons/NOReports.svg" alt="" style="width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
        </div>
    <div class="card-titulo">
        <div style="border: 1px solid blueviolet;">
            <h2 class="titulo">{{ $titulo }}</h2>
        </div>
        <div style="border: 1px solid yellow;" class="padding-right">
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

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.cardProyectoId');

            cards.forEach(card => {
                
                const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};
                
                const tareasValidar = card.querySelector('#TareasValidar');
                const tareasCompletadas = card.querySelector('#TareasCompletadas');
                const tareasPendientes = card.querySelector('#TareasPendientes');

                let tareaCompletasCuenta = 0;
                let tareaPendienteCuenta = 0;
                let tareaValidarCuenta = 0;

                data.tareas.forEach(tarea => {
                    switch(tarea.estado){
                    case 0:
                        tareaPendienteCuenta++;
                        break;
                    case 1:
                        tareaValidarCuenta++;
                        break;
                    case 2:
                        tareaCompletasCuenta++;
                        break;
                    default:
                        break;
                }
                });
                
                tareasValidar.textContent = "Tareas validadas: " + tareaValidarCuenta;
                tareasCompletadas.textContent = "Tareas completadas: " + tareaCompletasCuenta;
                tareasPendientes.textContent = "Tareas pendientes: " + tareaPendienteCuenta;

            });

           
        });
</script>