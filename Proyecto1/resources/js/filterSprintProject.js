/**
 * Filtro de tareas por sprint en el proyecto.
 * 
 * Permite filtrar las tareas mostradas en el kanban y backlog
 * según el sprint seleccionado en el dropdown. Opciones disponibles:
 * - "all" o vacío: mostrar todas las tareas
 * - "no-sprint": mostrar solo tareas sin sprint asignado
 * - ID de sprint específico: mostrar solo tareas de ese sprint
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// FILTER TASKS BY SPRINT
const sprintDropdown = document.getElementById("sprints");
const tasksKanban = document.querySelectorAll(".task-card");
const tasksBacklog = document.querySelectorAll(".sprint-backlog");
const kanbanContainer = document.querySelector(".content-section-1");

// Listener para cuando cambia el sprint seleccionado
sprintDropdown.addEventListener("change", function () {
    filterTasks(tasksKanban);
    filterTasks(tasksBacklog);
});

// Aplicar el filtro al cargar la página
window.addEventListener("load", function () {
    filterTasks(tasksKanban);
    filterTasks(tasksBacklog);
});

/**
 * Filtra las tareas según el valor del dropdown de sprints.
 * Añade o quita la clase 'filter-sprint' para ocultar/mostrar tareas.
 * 
 * @param {NodeList} tasks - Lista de elementos de tareas a filtrar
 */
function filterTasks(tasks) {
    tasks.forEach((task) => {
        if (sprintDropdown.value === "all" || sprintDropdown.value === "") {
            // Mostrar todas las tareas
            task.classList.remove("filter-sprint");
        } else if (sprintDropdown.value === "no-sprint") {
            // Mostrar solo tareas sin sprint (dataset.sprint vacío)
            if (!task.dataset.sprint || task.dataset.sprint === "") {
                task.classList.remove("filter-sprint");
            } else {
                task.classList.add("filter-sprint");
            }
        } else if (sprintDropdown.value != task.dataset.sprint) {
            // Ocultar tareas que no coinciden con el sprint seleccionado
            task.classList.add("filter-sprint");
        } else {
            // Mostrar tareas que coinciden con el sprint seleccionado
            task.classList.remove("filter-sprint");
        }
    });
}
