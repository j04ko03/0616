/**
 * Ocultar/mostrar contenedor de tareas del proyecto.
 * 
 * Gestiona los botones para expandir y contraer la lista de tareas
 * asociadas a un proyecto. Incluye bot贸n de expansi贸n (+),
 * contracci贸n (-) y bot贸n de cerrar (X).
 * 
 * @author Joaqu韓 <joaquinmscollo@gmail.com>
 */

const buttonPlus = document.getElementById('plus');
const buttonLess = document.getElementById('less');
const contenedorTareas = document.getElementById('contenedorTareasProyecto');
const btnCerrar = document.getElementById('img');

/**
 * Expandir el contenedor de tareas.
 */
buttonPlus.addEventListener('click', () => {
    contenedorTareas.style.display = 'block';
    buttonPlus.classList.add('oculto');
    buttonLess.classList.remove('oculto');
});

/**
 * Contraer el contenedor de tareas.
 */
buttonLess.addEventListener('click', () => {
    contenedorTareas.style.display = 'none';
    buttonPlus.classList.remove('oculto');
    buttonLess.classList.add('oculto');
});

/**
 * Cerrar el contenedor de tareas con el bot贸n X.
 */
btnCerrar.addEventListener('click', () => {
    contenedorTareas.style.display = 'none';
    buttonPlus.classList.remove('oculto');
    buttonLess.classList.add('oculto');
});  