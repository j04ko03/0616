document.addEventListener('DOMContentLoaded', () => {
            //Cojemos el id del contenedor de todos los proyectos prueba
            const contenedorAllProyectos = document.getElementById('contenedorTodosProyectos');
            //Buscamos el id de la card a seleccionar
            const cards = document.querySelectorAll('.cardProyectoId');
            //Buscamos el id del contenedor que muestra el proyecto específico
            const contenedorMuestra = document.getElementById('contenedorProyectoEspecifico');
            //Cojemos el id de la foto de cerrar para volver a Proyectos
            const contenedroCerrar = document.getElementById('cerrarContenedor');

            const btnCerrar = document.getElementById('img');

            console.log(document.querySelectorAll('.cardProyectoId'));
            //Creamos un foreach para cada card existente en cardProyectoId y de este modo tener el objeto controlado
            cards.forEach(card => {
                    
                //Por la card obtenida (objeto independiente) haremos un evento click
                card.addEventListener('click', () => {
                    const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};
                    console.log('Card clicked');
                    console.log(data);

                    //Cambio estado de proyecto en el hidde
                    contenedroCerrar.style.backgroundColor = administrarColorProyecto(data.estadoId);
                    
                    const titulo = document.getElementById('tituloProyecto');
                    titulo.textContent = data.titulo;
                    const descripcion = document.getElementById('descripcionProyecto');
                    descripcion.textContent = data.descripcion;
                    const numTasks = document.getElementById('numeroTareas');
                    numTasks.textContent = `NUMBER OF TASKS: ${data.tareas.length}`;

                    const tipo = document.getElementById('tipoUsuario');
                    tipo.textContent = data.pivot.rol;

                    const presupuesto = document.getElementById('presupuesto');
                    presupuesto.textContent = `Presupuesto: ${data.presupuesto}€`;

                    const link = document.getElementById('link');
                    link.textContent = data.linkProyecto;
                    link.style.textDecoration = "underline"
                    link.style.color = "blue";
                    link.style.cursor = "pointer";

                    const linkOut = document.getElementById('linkOut');
                    linkOut.href = data.linkProyecto;
                    linkOut.target = "_blank";

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
                switch(color){
                    case "1":
                        colorDevuelto = "red";
                        break;
                    case "2":
                        colorDevuelto = "yellow";
                        break;
                    case "3":
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