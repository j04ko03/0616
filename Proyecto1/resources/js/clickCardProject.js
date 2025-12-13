/**
 * Visualización de detalles de proyecto al hacer click en tarjetas.
 * 
 * Maneja la expansión de tarjetas de proyecto para mostrar información detallada:
 * - Título, descripción, presupuesto
 * - Lista de tareas asociadas
 * - Rol del usuario en el proyecto
 * - Administrador del proyecto
 * - Link externo del proyecto
 * - Color según estado del proyecto
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    //Cojemos el id del contenedor de todos los proyectos prueba
    const contenedorAllProyectos = document.getElementById('contenedorTodosProyectos');
    //Buscamos el id de la card a seleccionar
    const cards = document.querySelectorAll('.cardProyectoId');
    //Buscamos el id del contenedor que muestra el proyecto específico
    const contenedorMuestra = document.getElementById('contenedorProyectoEspecifico');
    //Cojemos el id de la foto de cerrar para volver a Proyectos
    const contenedroCerrar = document.getElementById('cerrarContenedor');

    const btnCerrar = document.getElementById('imagen');

    console.log(document.querySelectorAll('.cardProyectoId'));

    /**
     * Configurar cada tarjeta de proyecto para mostrar detalles al hacer click.
     */
    cards.forEach(card => {
        const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};

        //Pasar id del proyecto por enlace
        const btnVerProyecto = card.querySelector('.verProyectoBtn');
        btnVerProyecto.href = btnVerProyecto.href.replace(':id', data.id);

        // Evitar propagación del click en enlaces internos
        const enlaces = card.querySelectorAll('a');
        enlaces.forEach(enlace => {
            enlace.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        });

        /**
         * Mostrar detalles del proyecto al hacer click en la tarjeta.
         */
        card.addEventListener('click', (e) => {
            e.stopPropagation();

            console.log('Card clicked');
            console.log(data);

            //Cambio estado de proyecto con el color correspondiente
            console.log('Fetching project details for ID:', data.estadoId);
            contenedroCerrar.style.backgroundColor = administrarColorProyecto(data.estadoId);

            const titulo = document.getElementById('tituloProyecto');
            titulo.textContent = data.titulo;
            const descripcion = document.getElementById('descripcionProyecto');
            descripcion.textContent = data.descripcion;
            const numTasks = document.getElementById('numeroTareas');
            numTasks.textContent = `NUMBER OF TASKS: ${data.tareas.length}`;

            const tipo = document.getElementById('tipoUsuario');
            tipo.textContent = data.pivot.rol;

            const nombreAdmin = data.administrador && data.administrador.length > 0 ? data.administrador[0].nombre : 'Sin administrador';
            const administrador = document.getElementById('responsable');
            administrador.textContent = nombreAdmin;

            const presupuesto = document.getElementById('presupuesto');
            presupuesto.textContent = `Presupuesto: ${data.presupuesto}€`;

            const link = document.getElementById('link');
            link.textContent = data.linkProyecto;
            link.style.textDecoration = "underline";
            link.style.color = "blue";
            link.style.cursor = "pointer";

            const linkOut = document.getElementById('linkOut');
            linkOut.href = data.linkProyecto;
            linkOut.target = "_blank";

            const contenedorTareas = document.getElementById('contenedorTareasProyecto');
            contenedorTareas.innerHTML = ''; // Limpiamos el contenedor antes de agregar nuevas tareas
            contenedorTareas.style.display = 'none';

            // Crear elementos para cada tarea del proyecto
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

    /**
     * Asigna un color según el estado del proyecto.
     * 
     * @param {number} color - ID del estado del proyecto
     * @returns {string} Color RGB correspondiente al estado
     */
    function administrarColorProyecto(color) {
        let colorDevuelto;
        switch (color) {
            case 1:
                colorDevuelto = "red";
                break;
            case 2:
                colorDevuelto = "yellow";
                break;
            case 3:
                colorDevuelto = "green";
                break;
            default:
                colorDevuelto = "grey";
                break;
        }
        return colorDevuelto;
    }

    /**
     * Cerrar vista detallada y volver a la lista de proyectos.
     */
    btnCerrar.addEventListener('click', () => {
        console.log('img clc');
        contenedorMuestra.classList.add('oculto');
        contenedorAllProyectos.classList.remove('oculto');
    });
});