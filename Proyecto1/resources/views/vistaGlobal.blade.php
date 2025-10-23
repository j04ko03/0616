@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/vistaGlobal.css') }}">
@endpush

@section('content')
    <main>
        <div id="tab-container">
            <button class="tabs-btn btn-active" data-tab="1">Usuarios</button>
            <button class="tabs-btn" data-tab="2">Solicitudes superUsuario</button>
            <button class="tabs-btn" data-tab="3">Proyectos</button>
            <button class="tabs-btn" data-tab="4">Grupos</button>
        </div>
        <div id="main-content">
            <div class="tabs-content content-section-1 content-active">
                <!-- USUARIOS -->

            </div>
            <div class="tabs-content content-section-2 content-active">
                <!-- SOLICITUDES SUPERUSUARIO -->

            </div>
            <div class="tabs-content content-section-3 content-active">
                <!-- PROYECTOS -->

            </div>
            <div class="tabs-content content-section-4 content-active">
                <!-- GRUPOS -->

            </div>
        </div>
    </main>
@endsection
