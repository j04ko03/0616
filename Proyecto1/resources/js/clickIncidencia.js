/**
 * Gestión de click en icono de eliminar incidencia.
 * 
 * Captura clicks en el icono de papelera de las tarjetas de incidencia.
 * Evita que el click se propague a la tarjeta completa.
 * Actualmente solo imprime en consola el ID de la incidencia a eliminar.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {

    // Seleccionamos todos los iconos de papelera
    const papeleras = document.querySelectorAll('.IncidenciaCard .papelera');

    papeleras.forEach(icon => {
        /**
         * Capturar click en icono de eliminar incidencia.
         */
        icon.addEventListener('click', (e) => {
            e.stopPropagation(); // evita que se dispare el clic de la tarjeta completa

            const card = icon.closest('.IncidenciaCard'); // obtiene la tarjeta padre
            if (card) {
                const incidenciaId = card.dataset.id; // obtenemos el data-id
                console.log('Eliminar incidencia con ID:', incidenciaId);
                // Aquí iría la lógica para elimiar la incidencia (petición fetch/axios)
            }
        });
    });
});
