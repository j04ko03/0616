@extends('layouts.barraNavegacion')

@section('content')
        <!--<div class="contenedor-padre" style="border: 1px solid black">-->
        <div class="container mx-auto p-4" style="border: 1px solid black;">
        <h1 class="h1" style="border: 1px solid red">DASHBOARD</h1>
        <div class="contenedorBtnsPrincipales" style="border: 1px solid blue">
                <button id="btn-proyectos"
                    class="btnInteractivoProyectos">
                    Proyectos recientes
                </button>
            <button id="btn-tareas"
                class="btnInteractivoTareas">
                Tareas asignadas
            </button>
        </div>

        <div id="section-proyectos" class="contenedorPadreGrid contenedorScroll">
            <div class="gridCards" style="border: 1px solid purple">
                @foreach($proyectosRecientes as $proyecto)
                    <x-cardItemReciente 
                        titulo="{{ $proyecto['titulo'] }}" 
                        descripcion="{{ $proyecto['descripcion'] }}"
                    />  
                @endforeach
            </div>
        </div>

        <!-- Queda oculto al cargar la página display: none; -->
        <div id="section-tareas" class="contenedorPadreGrid contenedorScroll oculto">
            <div class="gridCards margenElementsGridTareas">
                @foreach($tareasAsignadas as $tarea)
                        <x-listItemTarea
                            titulo="{{ $tarea['titulo'] }}"
                            descripcion="{{ $tarea['descripcion'] }}"
                            :tag="$tarea['tag']"
                        />
                @endforeach
            </div >
        </div>

        <h2 class="text-xl font-bold mb-2">Proyectos</h2>
        <div class="alturaFija contenedorScroll oculto">
            <div class="gridCardsProyectos"  style="border: 1px solid orange">
                @foreach ($proyectosTotal as $proyectoT)
                    <x-cardItempProyectos 
                        titulo="{{ $proyectoT['titulo'] }}" 
                        descripcion="{{ $proyectoT['descripcion'] }}"
                        estado="{{ $proyectoT['estado'] }}"
                    />
                @endforeach
            </div>
        </div>

        <div class="alturaFija" style="border: 1px solid orange">
            <div class="card-contenedor" style="height: 100%; display: flex; flex-wrap: wrap; justify-content: space-between; cursor: auto;">
                <div style="border: 1px solid black; height: 100%; width: 96%; display: flex; flex-direction: column; justify-content: flex-start; padding: 2%;">
                    <h2 class="text-xl font-bold mb-2" style="border: 1px solid purple; height: fit-content; width: fit-content;">Proyecto x</h2>
                    
                    <div style="border: 1px solid purple; width: 100%; height: 35%; margin-left: 1%; border-bottom: 3px solid green">
                        <div style="border: 1px solid rgb(22, 168, 42); width: auto; display: flex; flex-wrap: wrap;" class="texto-cortado">
                            <div style="border: 1px solid red; width: 50%; height: auto; display: flex; align-items: flex-start;">
                                <h3 class="text-l font-bold mb-2 texto-cortado" style="border: 1px solid red; white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0">Descripción</h3>
                            </div>
                            <div style="border: 1px solid rgb(212, 132, 13); width: 50%; height: 100%; display: flex; justify-content: flex-end;">
                                <div style="border: 1px solid blue; width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                                <div style="border: 1px solid blue; width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                                <div style="border: 1px solid blue; width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                            </div>
                        </div>

                        <div style="border: 1px solid red; white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0; height: 100px;" class="contenedorScroll">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores natus fugit reiciendis corrupti, reprehenderit pariatur recusandae iusto id odit! Amet natus, tenetur modi laborum vel eligendi. Architecto itaque aliquam aut.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi facere omnis nostrum sed quas similique debitis iure harum porro hic. Doloremque, iusto nam. Dolorem officiis ab beatae eligendi pariatur sunt?
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia commodi harum, velit earum accusantium sed saepe, eius nemo labore excepturi nisi debitis beatae sint ad cupiditate totam natus inventore reprehenderit.
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores natus fugit reiciendis corrupti, reprehenderit pariatur recusandae iusto id odit! Amet natus, tenetur modi laborum vel eligendi. Architecto itaque aliquam aut.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi facere omnis nostrum sed quas similique debitis iure harum porro hic. Doloremque, iusto nam. Dolorem officiis ab beatae eligendi pariatur sunt?
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia commodi harum, velit earum accusantium sed saepe, eius nemo labore excepturi nisi debitis beatae sint ad cupiditate totam natus inventore reprehenderit.
                            </p>
                        </div>

                    </div>

                    <div style="border: 1px solid red; width: 100%; height: auto; display: flex; align-items: flex-start; margin-left: 1%; overflow: hidden; margin-top: 10px;">
                                <h3 class="text-l font-bold mb-2 texto-cortado" style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0">Link del proyecto  </h3>
                                <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-left: 3px; flex: 1;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero architecto a optio eius, dolorem ullam! Itaque debitis veniam repudiandae architecto exercitationem necessitatibus dicta ut cum corrupti, numquam adipisci recusandae eum!º</p>
                    </div>

                    <div style="border: 1px solid red; width: 99%; height: auto; display: flex; align-items: center; justify-content: space-around; margin-left: 2%; margin-top: 10px;">
                        <div style="border: 1px solid red;">
                            <p>Presupuesto: 00,00€</p>
                        </div>        
                        <div style="border: 1px solid red;">
                            <p>Responsable: xxxxxx</p>
                        </div>
                        <div style="border: 1px solid red; width: 10%; display: flex; justify-content: center; background-color: green; border-radius: 10px;">
                            <p>Entrega</p>
                        </div>
                    </div>

                    <div style="border: 1px solid red; width: 99%; height: auto; display: flex; align-items: center; justify-content: space-between; margin-left: 2%; margin-top: 10px;">
                        <div style="border: 1px solid purple; width: 10%; height: 20px;">
                            <h3 class="text-l font-bold mb-2 texto-cortado">TASKS</h3>
                        </div>
                        <div style="border: 1px solid purple; width: 90%; height: 20px; display: flex; justify-content: flex-end;">
                            <h3 class="text-l font-bold mb-2 texto-cortado" style="border: 1px solid yellow; width: fit-content;">NUMBER OF TASKS: X</h3>
                            <img src="../storage/assets/icons/plus.png" alt="" style="width: fit-content; height: 20px; cursor: pointer; margin-left: 5%;">
                            <img src="../storage/assets/icons/menos.png" alt="" style="width: fit-content; height: 20px; cursor: pointer; margin-left: 5%; display: none;">
                        </div>
                    </div>

                    <div style="border: 1px solid red; width: 99%; height: 120px; margin-left: 2%; margin-top: 10px; display: flex; flex-direction: column; gap: 5px; "
                    class="contenedorScroll">
                            @foreach($tareasAsignadas as $tarea)
                                <x-cardItemReciente
                                    titulo="{{ $tarea['titulo'] }}"
                                    type="1"
                                />
                            @endforeach
                    </div>

                </div>             
                <div style="border: 1px solid green; height: 100%; width: 3%; background-color: red; display: flex; justify-content: center; padding-top: 0.5%; border-radius: 0 0.75rem 0.75rem 0;">
                    <img src="../storage/assets/icons/cerrar.png" alt="" style="width: 85%; height: fit-content; cursor: pointer;">
                </div>
            </div>
        </div>
    </div>   
    
    <script src="{{ url('/js/btnHome.js') }}"></script>
@endsection