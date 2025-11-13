<link rel="stylesheet" href="{{ url('/css/grupoItem.css') }}">

@php
    // Obtener la primera letra de la descripción y convertirla a mayúscula
    $inicial = strtoupper(mb_substr($descripcion, 0, 1));
    
@endphp

<div class="grupoCard" data-id="{{ $grupoId }}" data-nombre="{{ $descripcion }}" data-usuarios='@json($miembros)' data-url="{{ route('grupos.update', $grupoId) }}">
    <div class="grupoIcono">
        <!-- Puedes poner un icono o una inicial aquí -->
        <span>{{ $inicial }}</span>
    </div>
    <div class="grupoInfo">
        <h3>{{ $descripcion }}</h3>
        <small>Miembros: {{ $miembros->count() }}</small>
    </div>
    <div class="grupoMenu" title="Eliminar grupo" role="button" tabindex="0">
         <form action="{{ route('grupos.destroy', $grupoId) }}" method="POST" class="form-eliminar-grupo">
            @csrf
            @method('Delete')
            <button type="submit" style="background:none; border:none; padding:0; cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 448 512">
                    <!-- FontAwesome Trash Icon -->
                    <path d="M135.2 17.7C140.9 7.3 151.9 0 164.4 0h119.2c12.5 0 23.5 7.3 29.2 17.7l17.1 34.3H432c8.8 0 16 7.2 16 16s-7.2 16-16 16h-16v336c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V68H16c-8.8 0-16-7.2-16-16s7.2-16 16-16h121.7l17.5-34.3zM384 68H64v336c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V68z"/>
                </svg>
            </button>
         </form>
    </div>
</div>