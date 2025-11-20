// FILTER TASKS BY SPRINT
const sprintDropdown = document.getElementById("sprints");
const tasksKanban = document.querySelectorAll(".task-card");
const tasksBacklog = document.querySelectorAll(".sprint-backlog");
const kanbanContainer = document.querySelector(".content-section-1");

sprintDropdown.addEventListener("change", function () {
    filterTasks(tasksKanban);
    filterTasks(tasksBacklog);
});
window.addEventListener("load", function () {
    filterTasks(tasksKanban);
    filterTasks(tasksBacklog);
});

function filterTasks(tasks) {
    tasks.forEach((task) => {
        if (sprintDropdown.value !== task.dataset.sprint) {
            task.classList.add("filter-sprint");
        } else {
            task.classList.remove("filter-sprint");
        }
    });
}
