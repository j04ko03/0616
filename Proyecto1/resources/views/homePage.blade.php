@extends('layouts.layoutPrivado')

 @push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homePageBlade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cardItem.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfilBlade.css') }}">
@endpush

@section('content')

    <h1 class="h1" style="margin-left: 3.5%; margin-top: 1%;">DASHBOARD</h1>
    <div class="container mx-auto p-4">
        <div class="contenedorBtnsPrincipales">
            <button id="btn-proyectos" class="btnInteractivoProyectos">
                Proyectos recientes
            </button>
            <button id="btn-tareas" class="btnInteractivoTareas">
                Tareas asignadas
            </button>
        </div>

        <div id="section-proyectos" class="contenedorPadreGrid contenedorScroll">
            @if($proyectosRecientes->isEmpty())
                <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center;">
                    <h2 class="h2" style="color: grey">No hay proyectos Recientes</h2>
                </div>
            @else
                <div class="gridCards">
                    @foreach ($proyectosRecientes as $proyecto)
                        <x-cardItemReciente titulo="{{ $proyecto['titulo'] }}" descripcion="{{ $proyecto['descripcion'] }}" />
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Queda oculto al cargar la página display: none; -->
        <div id="section-tareas" class="contenedorPadreGrid contenedorScroll oculto">
            
                @if ($tareasAsignadas->isEmpty())
                    <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center;">
                        <h2 class="h2" style="color: grey">No hay tareas Asignadas</h2>
                    </div>
                @else
                    <div class="gridCards margenElementsGridTareas">
                        @foreach($tareasAsignadas as $tarea)
                        <x-listItemTarea
                            titulo="{{ $tarea['titulo'] }}"
                            descripcion="{{ $tarea['descripcion'] }}"
                            :tag="$tarea['tags']"
                        />
                        @endforeach
                    </div>
                @endif
                
        </div>

        <!--pasamos objeto como JSON-->
        <h2 class="text-xl font-bold mb-2" style="margin-top: 2%; border-bottom: 1px solid #e5e7eb;">Proyectos</h2>
        <div class="alturaFija contenedorScroll" id="contenedorTodosProyectos">
            @if ($proyectosTotal->isEmpty())
                <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center;">
                    <h2 class="h2" style="color: grey">No hay proyectos Asignadas</h2>
                </div>
            @else
                <div class="gridCardsProyectos">
                @foreach ($proyectosTotal as $proyectoT)
                    <x-cardItemProyectos class="cardProyectoId"
                        titulo="{{ $proyectoT['titulo'] }}" 
                        descripcion="{{ $proyectoT['descripcion'] }}"
                        estado="{{ $proyectoT['estadoId'] }}"
                        fechaEntrega="{{ $proyectoT['fechaEntrega'] }}"
                        :data-proyecto="$proyectoT"
                    />
                @endforeach
                </div>
            @endif
        </div>

        <div class="alturaFija oculto" id="contenedorProyectoEspecifico">
            <div class="card-contenedor" style="height: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; cursor: auto;">
                <div style="height: 100%; width: 96%; display: flex; flex-direction: column; justify-content: flex-start; padding: 2%;">
                    <h2 id="tituloProyecto" class="text-xl font-bold mb-2" style="height: fit-content; width: fit-content;">Proyecto x</h2>
                    
                    <div style="width: 100%; height: 35%; margin-left: 1%; border-bottom: 3px solid green">
                        <div style="width: auto; display: flex; flex-wrap: wrap;" class="texto-cortado">
                            <div style="width: 50%; height: auto; display: flex; align-items: flex-start;">
                                <h3 class="text-l font-bold mb-2 texto-cortado" style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0">Descripción</h3>
                            </div>
                            <div id="tagsCompartidos" style="width: 50%; height: 100%; display: flex; justify-content: flex-end;">
                                <div style="width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                            </div>
                        </div>

                        <div style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0; height: 100px;" class="contenedorScroll">
                            <p id="descripcionProyecto"></p>
                        </div>

                    </div>

                    <div style="width: 100%; height: auto; display: flex; align-items: flex-start; margin-left: 1%; overflow: hidden; margin-top: 10px;">
                                <h3 class="text-l font-bold mb-2 texto-cortado" style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0">Link del proyecto:  </h3>
                                <a id="linkOut" href=""><p id="link" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-left: 3px; flex: 1;">X</p></a>
                    </div>

                    <div style="width: 99%; height: auto; display: flex; align-items: center; justify-content: space-around; margin-left: 2%; margin-top: 10px;">
                        <div>
                            <p  id="presupuesto">Presupuesto: 00,00€</p>
                        </div>        
                        <div>
                            <p id="tipoUsuario">xxxxxx</p>
                        </div>
                        <div>
                            <p>Responsable:</p>
                        </div>
                    </div>

                    <div style="width: 99%; height: auto; display: flex; align-items: center; justify-content: space-between; margin-left: 2%; margin-top: 10px;">
                        <div style="width: 10%; height: 20px;">
                            <h3 class="text-l font-bold mb-2 texto-cortado">TASKS</h3>
                        </div>
                        <div style="width: 90%; height: 20px; display: flex; justify-content: flex-end;">
                            <h3 id="numeroTareas" class="text-l font-bold mb-2 texto-cortado" style="width: fit-content;">NUMBER OF TASKS: X</h3>
                            <img id="plus" src="../storage/assets/icons/plus.png" alt="" style="width: fit-content; height: 20px; cursor: pointer; margin-left: 5%;">
                            <img id="less" src="../storage/assets/icons/menos.png" class="oculto" alt="" style="width: fit-content; height: 20px; cursor: pointer; margin-left: 5%;">
                        </div>
                    </div>

                    <div id="contenedorTareasProyecto" class="contenedorScroll" style="width: 99%; height: 120px; margin-left: 2%; margin-top: 10px; display: flex; flex-direction: column; gap: 5px;">
                            @foreach($tareasAsignadas as $tarea)
                                <x-cardItemReciente
                                    titulo="{{ $tarea['titulo'] }}"
                                    type="1"
                                />
                            @endforeach
                    </div>

                </div>             
                <div id="cerrarContenedor" style="height: 100%; width: 3%; display: flex; justify-content: center; padding-top: 0.5%; border-radius: 0 0.75rem 0.75rem 0;">
                    <img id="imagen" src="../storage/assets/icons/cerrar.png" alt="" style="width: 85%; height: fit-content; cursor: pointer;">
                </div>
            </div>
        </div>
    </div>   
    
    <script src="{{ url('/js/btnHome.js') }}"></script>
    <script src="{{ url('/js/btnHideProject.js') }}"></script>
    <script src="{{ url('/js/clickCardProject.js') }}"></script>

@endsection
