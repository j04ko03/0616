/**
 * Abrir popup de tarea sin parámetros.
 * 
 * Función simple que abre el popup de tareas y resetea el formulario
 * para asegurar que cada apertura sea para crear una tarea nueva.
 * El reset también elimina el campo del responsable.
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

/**
 * Abre el popup de tareas reseteando primero el formulario.
 * Esta función se expone globalmente para ser llamada desde otros scripts.
 */
window.openTaskPopup = function () {
    document.getElementById('taskForm').reset();
    popup.style.display = 'flex';
};
