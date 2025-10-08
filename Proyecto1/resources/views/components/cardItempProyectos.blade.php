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

<div class="bg-gray-100 h-80 rounded-xl shadow-sm hover:shadow-lg transition cursor-pointer" style="height: 300px; position: relative;">
   <div class="p-4" style="border: 1px solid hotpink; height: 300px;">
        <div class="h-30px bg-white shadow-md rounded-xl p-2">
            <div style="height: 90px;">

            </div>
        </div>
   <div style="border: 1px solid red; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
        <div style="border: 1px solid blueviolet;">
            <h2 class="text-lg font-semibold">{{ $titulo }}</h2>
        </div>
        <div style="border: 1px solid yellow; padding-right: 10px;">
            <p class="text-gray-600" style="font-size: 12px;">Fecha de entrega</p>
        </div>
    </div>

    <div style="border: 1px solid blue; margin-top: 15%; position: absolute; bottom: 10%; left:0; right: 0;">
        <ul>
            <li style="font-size: 14px">Tareas creadas: 0</li>
            <li style="font-size: 14px">Tareas completadas: 0</li>
            <li style="font-size: 14px">Tareas pendientes: 0</li>
        </ul>
    </div>
    <div style="border:1px solid firebrick; position: absolute; bottom: 0; left:0; right: 0; height: 15px; background-color: {{ $color }};" class="shadow-md rounded-xl p-2">

    </div>

    </div>

   
</div>