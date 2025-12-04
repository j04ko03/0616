// MANEJO DE CLICK EN TAREAS ASIGNADAS
document.addEventListener('DOMContentLoaded', function() {
    const tareasAsignadas = document.querySelectorAll('.idTareaAsignada');
    
    tareasAsignadas.forEach(tarea => {
        tarea.addEventListener('click', function(e) {
            e.preventDefault();
            
            const url = this.getAttribute('data-url');
            const tareaData = JSON.parse(this.getAttribute('data-tarea'));
            const tareaId = this.getAttribute('data-id');
            
            console.log('Click en tarea:', {
                id: tareaId,
                url: url,
                data: tareaData
            });
            
            // Redirigir a la URL de verTarea
            if (url) {
                window.location.href = url;
            } else {
                console.error('No se encontró la URL para la tarea');
            }
        });
        
        // Cambiar cursor para indicar que es clickeable
        tarea.style.cursor = 'pointer';
    });
});