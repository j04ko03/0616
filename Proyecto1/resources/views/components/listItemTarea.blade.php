<link rel="stylesheet" href="{{ asset('css/cardItem.css') }}">

<!--<div style="background-color: grey; width= 100%; height: 50px; border: 1px solid black">  -->
    <div class="card-cabecera">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; height: 100%; padding: 0 10px; border: 1px solid greenyellow;">
            <div style="border: 1px solid black; padding: 5px; cursor: pointer; word-wrap: break-word; overflow-wrap: break-word; max-width: 100%;">
            <p>{{ $titulo }}</p>
            </div> 
            <div style="border: 1px solid black; padding: 5px;  width: 50%; display: flex; flex-wrap: wrap; justify-content: flex-end; align-items: center;">
                @foreach ($tag as $etiqueta)
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; 
                    background-color: {{ $etiqueta['color'] }}; padding: 3px; margin:3px; min-width: 50px; border-radius: 0.75rem;">
                        <p>{{ $etiqueta ['descripcion'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    