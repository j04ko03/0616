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
                <p>1</p>
            </div>
            <div class="tabs-content content-section-2">
                <!-- SOLICITUDES SUPERUSUARIO -->
                <p>2</p>
            </div>
            <div class="tabs-content content-section-3">
                <!-- PROYECTOS -->
                <p>3</p>

            </div>
            <div class="tabs-content content-section-4">
                <!-- GRUPOS -->
                <p>4</p>
            </div>
        </div>
    </main>
    <script>
        const btnContainer = document.querySelector("#tab-container");
        const tabsBtn = document.querySelectorAll(".tabs-btn");
        const tabsContent = document.querySelectorAll(".tabs-content");

        btnContainer.addEventListener("click", function(e) {
            const clicked = e.target.closest(".tabs-btn");
            if (!clicked) return;
            tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
            clicked.classList.add("btn-active");

            tabsContent.forEach((tab) => tab.classList.remove("content-active"));
            document
                .querySelector(`.content-section-${clicked.dataset.tab}`)
                .classList.add("content-active");
        });
    </script>
@endsection
