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

<div class="card-contenedor">
    <div class="card-interior">
        <div class="card-cabecera">
            <div style="border: 1px solid rgb(65, 65, 161); align-content: center">
                <div style="height: 90px; border: 1px solid rgb(170, 24, 37); display: flex; flex-wrap: wrap; justify-content: space-between; margin-inline: 20%; align-items: center">
                    <!--Iconos-->
                    <div style="border: 1px solid pink; width: 25%; height: 45px;">
                        
                    </div>
                    <div style="border: 1px solid pink; width: 25%; height: 45px;">
                        
                    </div>
                    <div style="border: 1px solid pink; width: 25%; height: 45px;">
                        
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
            <li>Tareas creadas: 0</li>
            <li>Tareas completadas: 0</li>
            <li>Tareas pendientes: 0</li>
        </ul>
    </div>
    <div style="background-color: {{ $color }};" class="card-estado">    
    </div>

    </div>

   
</div>