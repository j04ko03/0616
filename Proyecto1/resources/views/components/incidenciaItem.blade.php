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
        <form action="{{ route('incidencias.destroy', $id) }}" method="POST" class="delete-incidencia-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="papelera" style="background:none; border:none; cursor:pointer;">
                <img src="../storage/assets/icons/papelera.png" alt="foto papelera" style="width: 25%; object-fit: contain;">
            </button>
        </form>
    </div>
 </div>