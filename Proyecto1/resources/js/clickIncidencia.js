document.addEventListener('DOMContentLoaded', () => {

    // Seleccionamos todos los iconos de papelera
    const papeleras = document.querySelectorAll('.IncidenciaCard .papelera');

    papeleras.forEach(icon => {
        icon.addEventListener('click', (e) => {
            e.stopPropagation(); // evita que se dispare el clic de la tarjeta completa

            const card = icon.closest('.IncidenciaCard'); // obtiene la tarjeta padre
            const incidenciaId = card.dataset.id; // obtenemos el data-id

            console.log('Eliminar incidencia con ID:', incidenciaId);
            
        });
    });

});
