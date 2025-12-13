// MANEJO DE CLICK EN TAREAS ASIGNADAS
document.addEventListener('DOMContentLoaded', function () {
    const tareasAsignadas = document.querySelectorAll('.idTareaAsignada');

    tareasAsignadas.forEach(tarea => {
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