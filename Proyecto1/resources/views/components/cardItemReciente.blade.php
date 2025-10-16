<link rel="stylesheet" href="{{ url('/css/cardItem.css') }}">

@props(['titulo', 'descripcion' => '', 'type' => '0'])

<!--<div class="bg-white shadow-md rounded-xl p-4 hover:shadow-lg transition cursor-pointer">-->
<div class="card-cabecera">
    @if ($type === "1")
        <h2 class="titulo" style="margin-left: 3%">{{ $titulo }}</h2>
        <p class="texto-cortado">{{ $descripcion }}</p>
    @else
        <h2 class="titulo">{{ $titulo }}</h2>
        <p class="texto-cortado">{{ $descripcion }}</p>
    @endif
</div>