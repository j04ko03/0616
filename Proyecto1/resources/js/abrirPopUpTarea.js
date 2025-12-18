/**
 * Abrir popup de tarea sin parámetros.
 * 
 * Función simple que abre el popup de tareas y resetea el formulario
 * para asegurar que cada apertura sea para crear una tarea nueva.
 * El reset también elimina el campo del responsable.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

/**
 * Abre el popup de tareas reseteando primero el formulario.
 * Esta función se expone globalmente para ser llamada desde otros scripts.
 */
window.openTaskPopup = function () {
    const taskForm = document.getElementById('taskForm');
    const popup = document.getElementById('popup');

    if (taskForm) taskForm.reset();
    if (typeof popup !== 'undefined' && popup) {
        popup.style.display = 'flex';
    } else {
        // Fallback or warning if popup not found
        console.warn('Popup element not found');
    }
};
