<link rel="stylesheet" href="{{ url('/css/memberItem.css') }}">

@php
    $tipoUser = 'Usuario'; // valor por defecto
    switch ($tipo) {
        case 0:
            $tipoUser = 'SysAdmin';
            break;
        case 1:
            $tipoUser = 'Super User';
            break;
        case 2:
            $tipoUser = 'User';
            break;
        default:
            $tipoUser = 'Usuario';
    }
@endphp 

<div class="member">
    <div class="pfp">
        @php
            use Illuminate\Support\Facades\Storage;
            $fotoPath = 'assets/fotosUser/' . $img;
        @endphp

        @if($img && Storage::disk('public')->exists($fotoPath))
            <img id="fotoPerfil" src="{{ asset('storage/assets/fotosUser/' . $img) }}" alt="Foto de usuario">                            
        @else
            <img id="fotoPerfil" src="{{ asset('storage/assets/fotosUser/standarPerfil.png') }}" alt="Foto por defecto">
        @endif
    </div>
    <div>
        <span>
            <p>{{ $nombre }}</p>
            <button class="button-task">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                </svg>
            </button>
        </span>
        <p>{{ $tipoUser }}</p>
        <p>{{ $email }}</p>
    </div>
</div>
