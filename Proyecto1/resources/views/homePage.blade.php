@extends('layouts.barraNavegacion')

@section('content')
    <!--<div class="contenedor-padre" style="border: 1px solid black">-->
    <div class="container mx-auto p-4" style="border: 1px solid black;">
        <h1 class="h1">DASHBOARD</h1>
        <div class="contenedorBtnsPrincipales">
            <button id="btn-proyectos" class="btnInteractivoProyectos">
                Proyectos recientes
            </button>
            <button id="btn-tareas" class="btnInteractivoTareas">
                Tareas asignadas
            </button>
        </div>

        <div id="section-proyectos" class="contenedorPadreGrid contenedorScroll">
            <div class="gridCards">
                @foreach ($proyectosRecientes as $proyecto)
                    <x-cardItemReciente titulo="{{ $proyecto['titulo'] }}" descripcion="{{ $proyecto['descripcion'] }}" />
                @endforeach
            </div>
        </div>

        <!-- Queda oculto al cargar la página display: none; -->
        <div id="section-tareas" class="contenedorPadreGrid contenedorScroll oculto">
            <div class="gridCards margenElementsGridTareas">
                @foreach ($tareasAsignadas as $tarea)
                    <x-listItemTarea titulo="{{ $tarea['titulo'] }}" descripcion="{{ $tarea['descripcion'] }}"
                        :tag="$tarea['tag']" />
                @endforeach
            </div>
        </div>

        <!--pasamos objeto como JSON-->
        <h2 class="text-xl font-bold mb-2">Proyectos</h2>
        <div class="alturaFija contenedorScroll" id="contenedorTodosProyectos">
            <div class="gridCardsProyectos">
                @foreach ($proyectosTotal as $proyectoT)
                    <x-cardItempProyectos class="cardProyectoId"
                        titulo="{{ $proyectoT['titulo'] }}" 
                        descripcion="{{ $proyectoT['descripcion'] }}"
                        estado="{{ $proyectoT['estado'] }}"
                        :data-proyecto="$proyectoT"
                    />
                @endforeach
            </div>
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
                            <div style="width: 50%; height: 100%; display: flex; justify-content: flex-end;">
                                <div style="width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                                <div style="width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                                <div style="width: 50px; height: 25px; background-color: blue; margin-left: 2px;">

                                </div>
                            </div>
                        </div>

                        <div style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0; height: 100px;" class="contenedorScroll">
                            <p id="descripcionProyecto"></p>
                        </div>

                    </div>

                    <div style="width: 100%; height: auto; display: flex; align-items: flex-start; margin-left: 1%; overflow: hidden; margin-top: 10px;">
                                <h3 class="text-l font-bold mb-2 texto-cortado" style="white-space: normal; overflow-wrap: break-word; word-break: break-all; margin: 0">Link del proyecto  </h3>
                                <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-left: 3px; flex: 1;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero architecto a optio eius, dolorem ullam! Itaque debitis veniam repudiandae architecto exercitationem necessitatibus dicta ut cum corrupti, numquam adipisci recusandae eum!º</p>
                    </div>

                    <div style="width: 99%; height: auto; display: flex; align-items: center; justify-content: space-around; margin-left: 2%; margin-top: 10px;">
                        <div>
                            <p>Presupuesto: 00,00€</p>
                        </div>        
                        <div>
                            <p>Responsable: xxxxxx</p>
                        </div>
                        <div style="width: 10%; display: flex; justify-content: center; background-color: green; border-radius: 10px;">
                            <p>Entrega</p>
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
                <div id="cerrarContenedor" style="height: 100%; width: 3%; background-color: red; display: flex; justify-content: center; padding-top: 0.5%; border-radius: 0 0.75rem 0.75rem 0;">
                    <img src="../storage/assets/icons/cerrar.png" alt="" style="width: 85%; height: fit-content; cursor: pointer;">
                </div>
            </div>
        </div>
    </div>   
    
    <script src="{{ url('/js/btnHome.js') }}"></script>

    <script>
            const buttonPlus = document.getElementById('plus');
            const buttonLess = document.getElementById('less');
            const contenedorTareas = document.getElementById('contenedorTareasProyecto');

            buttonPlus.addEventListener('click', () => {
                contenedorTareas.style.display = 'block';
                buttonPlus.classList.add('oculto');
                buttonLess.classList.remove('oculto');
            });  

            buttonLess.addEventListener('click', () => {
                contenedorTareas.style.display = 'none';
                buttonPlus.classList.remove('oculto');
                buttonLess.classList.add('oculto');
            });  
        
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            //Cojemos el id del contenedor de todos los proyectos
            const contenedorAllProyectos = document.getElementById('contenedorTodosProyectos');
            //Buscamos el id de la card a seleccionar
            const cards = document.querySelectorAll('.cardProyectoId');
            //Buscamos el id del contenedor que muestra el proyecto específico
            const contenedorMuestra = document.getElementById('contenedorProyectoEspecifico');
            //Cojemos el id de la foto de cerrar para volver a Proyectos
            const btnCerrar = document.getElementById('cerrarContenedor');

            console.log(document.querySelectorAll('.cardProyectoId'));
            //Creamos un foreach para cada card existente en cardProyectoId y de este modo tener el objeto controlado
            cards.forEach(card => {
                    
                //Por la card obtenida (objeto independiente) haremos un evento click
                card.addEventListener('click', () => {
                    const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};
                    console.log('Card clicked');
                    console.log(data);
                    console.log(data.titulo);
                    console.log(data.descripcion);
                    console.log(data.estado);
                    
                    data.tareas.forEach(tarea => {
                        console.log(tarea.titulo);
                        console.log(tarea.descripcion);
                        tarea.tag.forEach(tag => {
                            console.log(tag.descripcion);
                            console.log(tag.color);
                        });
                    });

                    const titulo = document.getElementById('tituloProyecto');
                    titulo.textContent = data.titulo;
                    const descripcion = document.getElementById('descripcionProyecto');
                    descripcion.textContent = data.descripcion;
                    const numTasks = document.getElementById('numeroTareas');
                    numTasks.textContent = `NUMBER OF TASKS: ${data.tareas.length}`;

                    const contenedorTareas = document.getElementById('contenedorTareasProyecto');
                    contenedorTareas.innerHTML = ''; // Limpiamos el contenedor antes de agregar nuevas tareas
                    contenedorTareas.style.display = 'none';
                                        
                    data.tareas.forEach(tarea => {                        
                        const tareaElemento = document.createElement('div');
                        tareaElemento.classList.add('card-cabecera');
                        tareaElemento.style.marginBottom = '5px';

                        const tituloTarea = document.createElement('h2');
                        tituloTarea.classList.add('titulo');
                        tituloTarea.style.marginLeft = '3%';
                        tituloTarea.textContent = tarea.titulo;
                        
                        tareaElemento.appendChild(tituloTarea);
                        contenedorTareas.appendChild(tareaElemento);
                    });

                    //Al hacer click en la card, ocultamos el contenedor de todos los proyectos
                    contenedorAllProyectos.classList.add('oculto');
                    //Mostramos el contenedor del proyecto específico
                    contenedorMuestra.classList.remove('oculto');
                });
            });



            //Abierto el contenedor del proyecto específico parra cerralo 
            btnCerrar.addEventListener('click', () => {
                contenedorMuestra.classList.add('oculto');
                contenedorAllProyectos.classList.remove('oculto');
            });
        });
    </script>

@endsection
