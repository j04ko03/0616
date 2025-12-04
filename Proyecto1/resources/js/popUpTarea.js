// TASK POPUP MANAGEMENT
// Elementos del DOM
const taskPopupBg = document.getElementById("taskPopup");
const taskForm = document.getElementById("task-form");
const quitTaskBtn = document.getElementById("quit-task-btn");
const deleteTaskBtn = document.getElementById("delete-task-btn");
const formDeleteTask = document.getElementById("form-delete-task");
const cancelDeleteTaskBtn = document.getElementById("cancel-delete-task-btn");
const addTaskBtn = document.getElementById("boton");

// Configurar fecha mínima como hoy
const today = new Date().toISOString().split("T")[0];
const fechaEntregaInput = document.getElementById("fechaEntrega");
if (fechaEntregaInput) {
    fechaEntregaInput.setAttribute("min", today);
    // Solo establecer valor por defecto si está vacío y no estamos en modo edición
    if (!fechaEntregaInput.value) {
        fechaEntregaInput.value = today;
    }
}

// ABRIR POPUP PARA CREAR TAREA
if (addTaskBtn) {
    addTaskBtn.addEventListener("click", function (e) {
        e.preventDefault();
        taskPopupBg.style.display = "flex";
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
        if (formDeleteTask) {
            taskForm.style.display = "none";
            formDeleteTask.style.display = "flex";
        }
    });
}

// CANCELAR ELIMINACIÓN
if (cancelDeleteTaskBtn) {
    cancelDeleteTaskBtn.addEventListener("click", function (e) {
        e.preventDefault();
        formDeleteTask.style.display = "none";
        taskForm.style.display = "flex";
    });
}

// EVITAR QUE EL CLICK EN LA CONFIRMACIÓN CIERRE EL POPUP
if (formDeleteTask) {
    formDeleteTask.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// FUNCIÓN PARA CERRAR EL POPUP
function closeTaskPopup() {
    taskPopupBg.style.display = "none";
    if (taskForm) {
        taskForm.style.display = "flex";
    }
    if (formDeleteTask) {
        formDeleteTask.style.display = "none";
    }
    
    // Limpiar la URL para quitar el tareaId si existe
    const url = window.location.href;
    if (url.includes('/project/')) {
        const pathParts = url.split('/project/')[1].split('/');
        if (pathParts.length > 1) {
            // Hay un tareaId en la URL, eliminarlo
            const baseUrl = url.split('/project/')[0];
            const projectId = pathParts[0];
            window.history.pushState({}, '', `${baseUrl}/project/${projectId}`);
        }
    }
}

// ABRIR POPUP PARA EDITAR TAREA (desde otros scripts)
window.openTaskPopup = function (tareaId = null) {
    if (tareaId) {
        console.log("Editando tarea:", tareaId);
    }
    taskPopupBg.style.display = "flex";
};