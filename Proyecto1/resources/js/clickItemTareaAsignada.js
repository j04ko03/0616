/**
 * Gestión de clicks en tareas asignadas.
 * 
 * Maneja el evento de click en elementos de tareas asignadas (clase .idTareaAsignada)
 * y redirige a la URL del proyecto correspondiente almacenada en el atributo data-url.
 * También cambia el cursor para indicar que los elementos son clickeables.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// MANEJO DE CLICK EN TAREAS ASIGNADAS
document.addEventListener('DOMContentLoaded', function () {
    const tareasAsignadas = document.querySelectorAll('.idTareaAsignada');

    tareasAsignadas.forEach(tarea => {
        /**
         * Event listener para redirigir al hacer click en una tarea asignada.
         */
        tarea.addEventListener('click', function (e) {
            const url = this.getAttribute('data-url');

            if (url) {
                // Redirigir a la URL del proyecto (SiteController@verTarea -> ProjectController)
                window.location.href = url;
            } else {
                console.error('URL no encontrada en el atributo data-url');
            }
        });

        // Cambiar cursor para indicar que es clickeable
        tarea.style.cursor = 'pointer';
    });
});