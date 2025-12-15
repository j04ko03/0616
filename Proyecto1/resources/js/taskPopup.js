/**
 * Gestión del popup de tareas - Versión alternativa.
 * 
 * Similar a popUpTarea.js pero con algunas diferencias:
 * - Usa un botón diferente para abrir (#boton en lugar de #add-task-btn)
 * - No incluye limpieza de URL al cerrar
 * - La función openTaskPopup solo imprime en consola en lugar de redirigir
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// TASK POPUP MANAGEMENT

// Elementos del DOM
const taskPopupBg = document.getElementById("taskPopup");
const taskForm = document.getElementById("task-form");
const quitTaskBtn = document.getElementById("quit-task-btn");
const deleteTaskBtn = document.getElementById("delete-task-btn");
const formDeleteTask = document.getElementById("form-delete-task");
const cancelDeleteTaskBtn = document.getElementById("cancel-delete-task-btn");

// Botón "Añadir tarea" del proyecto
const addTaskBtn = document.getElementById("boton");

// CONFIGURAR FECHA MÍNIMA COMO HOY
const today = new Date().toISOString().split("T")[0];
const fechaEntregaInput = document.getElementById("fechaEntrega");
if (fechaEntregaInput) {
    fechaEntregaInput.setAttribute("min", today);
    // Solo establecer valor por defecto si está vacío
    if (!fechaEntregaInput.value) {
        fechaEntregaInput.value = today;
    }
}

// ABRIR POPUP PARA CREAR TAREA
if (addTaskBtn) {
    addTaskBtn.addEventListener("click", function (e) {
        e.preventDefault();
        if (taskPopupBg) taskPopupBg.style.display = "flex";
    });
}

// CERRAR POPUP CON EL BOTÓN X
if (quitTaskBtn) {
    quitTaskBtn.addEventListener("click", function () {
        closeTaskPopup();
    });
}

// CERRAR POPUP AL HACER CLICK EN EL FONDO
if (taskPopupBg) {
    taskPopupBg.addEventListener("click", function (e) {
        if (e.target === taskPopupBg) {
            closeTaskPopup();
        }
    });
}

// EVITAR QUE EL CLICK EN EL FORMULARIO CIERRE EL POPUP
if (taskForm) {
    taskForm.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// MOSTRAR CONFIRMACIÓN DE ELIMINACIÓN
if (deleteTaskBtn) {
    deleteTaskBtn.addEventListener("click", function (e) {
        e.preventDefault();
        if (formDeleteTask && taskForm) {
            taskForm.style.display = "none";
            formDeleteTask.style.display = "flex";
        }
    });
}

// CANCELAR ELIMINACIÓN
if (cancelDeleteTaskBtn) {
    cancelDeleteTaskBtn.addEventListener("click", function (e) {
        e.preventDefault();
        if (formDeleteTask && taskForm) {
            formDeleteTask.style.display = "none";
            taskForm.style.display = "flex";
        }
    });
}

// EVITAR QUE EL CLICK EN LA CONFIRMACIÓN CIERRE EL POPUP
if (formDeleteTask) {
    formDeleteTask.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

/**
 * Cierra el popup de tareas y restaura el estado inicial.
 */
function closeTaskPopup() {
    if (taskPopupBg) taskPopupBg.style.display = "none";
    if (taskForm) {
        taskForm.style.display = "flex";
    }
    if (formDeleteTask) {
        formDeleteTask.style.display = "none";
    }
}

/**
 * Abre el popup de tareas para editar una tarea.
 * Función global que puede ser llamada desde otros scripts (items del kanban).
 * 
 * @param {number|null} tareaId - ID de la tarea a editar, null para crear nueva
 */
window.openTaskPopup = function (tareaId = null) {
    if (tareaId) {
        console.log("Editando tarea:", tareaId);
    }
    if (taskPopupBg) taskPopupBg.style.display = "flex";
};
