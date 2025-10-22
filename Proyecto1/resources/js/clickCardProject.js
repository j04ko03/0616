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

                    //Cambio estado de proyecto en el hidde
                    btnCerrar.style.backgroundColor = administrarColorProyecto(data.estado);
                    
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

            function administrarColorProyecto(color){
                let colorDevuelto;
                console.log(color);
                switch(color){
                    case 0:
                        colorDevuelto = "red";
                        break;
                    case 1:
                        colorDevuelto = "yellow";
                        break;
                    case 2:
                        colorDevuelto = "green";
                        break;
                    default:
                        colorDevuelto = "grey";
                        break;
                }
                return colorDevuelto;
            }

            //Abierto el contenedor del proyecto específico parra cerralo 
            btnCerrar.addEventListener('click', () => {
                contenedorMuestra.classList.add('oculto');
                contenedorAllProyectos.classList.remove('oculto');
            });
        });