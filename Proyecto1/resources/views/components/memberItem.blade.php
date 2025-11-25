<link rel="stylesheet" href="{{ url('/css/memberItem.css') }}">

<div class="member" data-id="{{ $id }}">
    <div class="pfp">
        @php
            use Illuminate\Support\Facades\Storage;
            $fotoPath = 'assets/fotosUser/' . $img;
        @endphp

        @if($img && Storage::disk('public')->exists($fotoPath))
            <img id="fotoPerfil" src="{{ asset('storage/assets/fotosUser/' . $img) }}" alt="Foto de usuario" style="width: 100%; height: 100%; object-fit: contain;">                            
        @else
            <img id="fotoPerfil" src="{{ asset('storage/assets/fotosUser/standarPerfil.png') }}" alt="Foto por defecto" style="width: 100%; height: 100%; object-fit: contain;">
        @endif
    </div>
    <div>
        <span>
            <p>{{ $nombre }}</p>
            <button class="button-member" style="display:{{ $style }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                </svg>
            </button>
        </span>
        <p>Tipo: {{ $rol }}</p>
        <p>{{ $email }}</p>
    </div>

    <span class="popup-edit-user" data-id="{{ $id }}">
        <p>Hacer administrador</p>
        <p>Eliminar usuario</p>
    </span>
</div>
