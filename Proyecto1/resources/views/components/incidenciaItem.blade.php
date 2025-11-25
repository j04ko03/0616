 <link rel="stylesheet" href="{{ url('/css/incidenciaItem.css') }}">

 <div class="IncidenciaCard contenedorScroll" data-id="{{ $id }}" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: start;">
    <div class="" style="display: flex; flex-direction: column; width: 90%">
        <div>
            <p>{{ $nombreUser }}</p>
        </div>
        <div style="padding-left: 2%">
            <p>{{ $descripcion }}</p>
        </div>
    </div>
    <div style="width: 10%; height: 10%;">
        <img id="papelera" class="papelera" src="../storage/assets/icons/papelera.png" alt="foto papelera" style="width: 25%; object-fit: contain">
    </div>
 </div>