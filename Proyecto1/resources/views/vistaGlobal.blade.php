@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/vistaGlobal.css') }}">
    <link rel="stylesheet" href="{{ url('/css/desplegableUsuarios.css') }}">
    <link rel="stylesheet" href="{{ url('/css/grupoItem.css') }}">
@endpush

@section('content')
    <div id="grid-container">
        <div id="tab-container">
            <button class="tabs-btn btn-active" data-tab="1">Usuarios</button>
            <button class="tabs-btn" data-tab="2">Solicitudes superUsuario (0)</button>
            <button class="tabs-btn" data-tab="3">Proyectos</button>
            <button class="tabs-btn" data-tab="4">Grupos</button>
        </div>
        <div id="main-content">
            <form>
                <input type="text" id="buscar" name="buscar">
                <button type="button" id="search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z">
                        </path>
                    </svg>
                </button>
            </form>
            <div class="tabs-content content-section-1 content-active">
                <!-- USUARIOS -->
                @foreach ($usuarios as $usuario)
                    <x-memberItem nombre="{{ $usuario['nombre'] }}" email="{{ $usuario['email'] }}" tipo="{{ $usuario['tipoUser'] }}"/>
                @endforeach
            </div>
            <div class="tabs-content content-section-2">
                <!-- SOLICITUDES SUPERUSUARIO -->
                @for ($i = 0; $i < 20; $i++)
                    <x-suRequestItem />
                @endfor
            </div>
            <div class="tabs-content content-section-3">
                <!-- PROYECTOS -->
                <p>3</p>

            </div>
            <div class="tabs-content content-section-4">
                <!-- GRUPOS -->
                <div class="contenedorPrincipal">
                    <div class="contenedorSecundario">
                        <h2>Grupos Creados</h2>
                    </div>
                    <div class="contenedorScroll" style="width: 100%; height: 80%; border: 1px solid green; display: flex; flex-wrap: wrap; justify-content: space-between; align-content: space-around;">
                        @foreach ($grupos as $grupo)
                            <x-groupComponent descripcion="{{ $grupo['descripcion'] }}" :miembros="$grupo->usuarios"/>
                        @endforeach
                        <div class="grupoCard" style="width: 100px">
                            <div class="grupoIcono">
                                <span>+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contenedor para crear grupos -->
                <div class="contenedorPrincipal">
                    <div class="contenedorSecundario">
                        <h2>Creación de grupos</h2>
                    </div>
                    <div style="width: 100%; height: 80%; display: flex; flex-direction: column; gap: 10px; border: 1px solid green">
                        <!-- Campos para la creación de usuarios -->
                        <div class="subContenedorSinMargen">
                            <input type="text" name="tituloGrupo" id="tituloGrupo" placeholder="Nombre del título" required maxlength="100">
                        </div>
                        <div class="subContenedorSinMargen">
                            <h3>Lista de usuarios a añadir</h3>
                        </div>
                        <div class="subContenedorSinMargen" style="height: 70%;">
                            <div class="user-dropdown">
                                <div class="contenedorBotonDesplegable ">
                                    <button style="width: 100%" type="button" id="add-user-btn">Añadir usuario</button>
                                </div>
                                <input type="text" class="user-search" placeholder="Buscar usuario...">
                                <div class="user-list">
                                    <div class="user-group">Usuarios</div>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id != 1 && $usuario->id !== auth()->user()->id)
                                            <div class="user-item" data-user="{{ $usuario->nombre }}" data-id="{{ $usuario->id }}" data-type="{{ $usuario->tipoUser }}">{{ $usuario->nombre }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div id="usuarios-seleccionados">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                            </div>
                        </div>
                        <div class="contenedorBotonFinal">
                            <button type="button" id="crearGrupo">Crear Grupo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        const denyBtns = document.querySelectorAll(".deny");
        const acceptBtn = document.querySelectorAll(".accept");

        denyBtns.forEach(btn => {
            btn.addEventListener("click", function(e) {
                const target = e.target.closest(".member").remove()
            })
        })
    </script>


    <script src="{{ url('/js/añadirUsuario.js') }}"></script>
@endsection
