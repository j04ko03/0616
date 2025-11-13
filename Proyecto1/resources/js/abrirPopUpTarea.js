/* JavaScript para que se abra el popUp sin parámetros
    También resetea el formulario, así hacemos que cada vez sea una tarea nueva.
    En el reset, de paso, también elimina el campo del responsable
*/

window.openTaskPopup = function() {
    document.getElementById('taskForm').reset();
    popup.style.display = 'flex';
};
