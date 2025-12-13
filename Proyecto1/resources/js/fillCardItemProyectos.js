/**
 * Rellena los contadores de tareas en las tarjetas de proyecto.
 * 
 * Para cada tarjeta de proyecto en la vista principal, cuenta las tareas
 * segÃºn su estado:
 * - Estado 1: Pendientes
 * - Estado 2: Por validar
 * - Estado 3: Completadas
 * 
 * Actualiza los contadores visuales en la tarjeta para mostrar
 * el progreso del proyecto.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.cardProyectoId');

    cards.forEach(card => {

        const data = card.dataset.proyecto ? JSON.parse(card.dataset.proyecto) : {};

        const tareasValidar = card.querySelector('#TareasValidar');
        const tareasCompletadas = card.querySelector('#TareasCompletadas');
        const tareasPendientes = card.querySelector('#TareasPendientes');

        let tareaCompletasCuenta = 0;
        let tareaPendienteCuenta = 0;
        let tareaValidarCuenta = 0;

        // Contar tareas por estado
        data.tareas.forEach(tarea => {
            switch (tarea.estadoId) {
                case '1':
                    tareaPendienteCuenta++;
                    break;
                case '2':
                    tareaValidarCuenta++;
                    break;
                case '3':
                    tareaCompletasCuenta++;
                    break;
                default:
                    break;
            }
        });

        // Actualizar los contadores en la interfaz
        tareasValidar.textContent = tareaValidarCuenta;
        tareasCompletadas.textContent = tareaCompletasCuenta;
        tareasPendientes.textContent = tareaPendienteCuenta;

    });
});