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
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    // Contenedor de todos los proyectos
    const contenedorAllProyectos = document.getElementById('contenedorTodosProyectos');
    // Tarjetas de proyecto
    const cards = document.querySelectorAll('.cardProyectoId');
    // Contenedor que muestra el proyecto específico
    const contenedorMuestra = document.getElementById('contenedorProyectoEspecifico');
    // Botón para cerrar y volver a Proyectos
    const contenedorCerrar = document.getElementById('cerrarContenedor');
    const btnCerrar = document.getElementById('imagen');

    /**
     * Configurar cada tarjeta de proyecto para mostrar detalles al hacer click.
     */
    cards.forEach(card => {
        const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};

        // Configurar enlace del botón "Ver Proyecto"
        const btnVerProyecto = card.querySelector('.verProyectoBtn');
        if (btnVerProyecto) {
            btnVerProyecto.href = btnVerProyecto.href.replace(':id', data.id);
        }

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

            // Cambiar color de fondo del botón cerrar según estado
            if (contenedorCerrar) {
                contenedorCerrar.style.backgroundColor = administrarColorProyecto(data.estadoId);
            }

            // Rellenar datos del proyecto
            setTextContent('tituloProyecto', data.titulo);
            setTextContent('descripcionProyecto', data.descripcion);
            setTextContent('numeroTareas', `NUMBER OF TASKS: ${data.tareas ? data.tareas.length : 0}`);
            setTextContent('tipoUsuario', data.pivot ? data.pivot.rol : '');

            const nombreAdmin = (data.administrador && data.administrador.length > 0) ? data.administrador[0].nombre : 'Sin administrador';
            setTextContent('responsable', nombreAdmin);
            setTextContent('presupuesto', `Presupuesto: ${data.presupuesto}€`);

            const link = document.getElementById('link');
            if (link) {
                link.textContent = data.linkProyecto;
                link.style.textDecoration = "underline";
                link.style.color = "blue";
                link.style.cursor = "pointer";
            }

            const linkOut = document.getElementById('linkOut');
            if (linkOut) {
                linkOut.href = data.linkProyecto;
                linkOut.target = "_blank";
            }

            // Renderizar tareas
            const contenedorTareas = document.getElementById('contenedorTareasProyecto');
            if (contenedorTareas) {
                contenedorTareas.innerHTML = '';
                contenedorTareas.style.display = 'none';

                if (data.tareas) {
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
                }
            }

            // Alternar visibilidad de contenedores
            if (contenedorAllProyectos) contenedorAllProyectos.classList.add('oculto');
            if (contenedorMuestra) contenedorMuestra.classList.remove('oculto');
        });
    });

    /**
     * Helper para establecer texto de manera segura.
     */
    function setTextContent(id, text) {
        const el = document.getElementById(id);
        if (el) el.textContent = text;
    }

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
    if (btnCerrar) {
        btnCerrar.addEventListener('click', () => {
            if (contenedorMuestra) contenedorMuestra.classList.add('oculto');
            if (contenedorAllProyectos) contenedorAllProyectos.classList.remove('oculto');
        });
    }
});