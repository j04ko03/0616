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
        if (sprintDropdown.value === "all" || sprintDropdown.value === "") {
            task.classList.remove("filter-sprint");
        } else if (sprintDropdown.value === "no-sprint") {
            // Show only tasks with no sprint (empty dataset.sprint)
            if (!task.dataset.sprint || task.dataset.sprint === "") {
                task.classList.remove("filter-sprint");
            } else {
                task.classList.add("filter-sprint");
            }
        } else if (sprintDropdown.value != task.dataset.sprint) {
            task.classList.add("filter-sprint");
        } else {
            task.classList.remove("filter-sprint");
        }
    });
}
