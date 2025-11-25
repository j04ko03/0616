// POP-UP UPDATE-DELETE PROJECT
const popupBg = document.getElementById("popup-bg");
const updateProjectBtn = document.getElementById("update-project");
const popupQuitBtn = document.getElementById("quit-btn");
const formUpdateProject = document.getElementById("update-project-form");

updateProjectBtn.addEventListener("click", function () {
    popupBg.style.display = "flex";
    formUpdateProject.style.display = "flex";
});

popupQuitBtn.addEventListener("click", function () {
    formUpdateProject.style.display = "none";
    popupBg.style.display = "none";
});

popupBg.addEventListener("click", function (e) {
    e.stopPropagation();
    formUpdateProject.style.display = "none";
    popupDeleteProject.style.display = "none";
    formAddUser.style.display = "none";
    popupBg.style.display = "none";
});

formUpdateProject.addEventListener("click", (e) => {
    e.stopPropagation();
});

// POP-UP DELETE PROJECT CONFIRMATION
const popupDeleteProject = document.getElementById(
    "popup-delete-project-confirmation"
);
const deleteProjectBtn = document.getElementById("delete-project");
const formDeleteProjectConfirmation = document.getElementById(
    "form-delete-project"
);
const cancelDeleteProjectBtnConfirmation = document.getElementById(
    "cancel-delete-project-btn"
);

deleteProjectBtn.addEventListener("click", function () {
    popupDeleteProject.style.display = "flex";
    formDeleteProjectConfirmation.style.display = "flex";
});

cancelDeleteProjectBtnConfirmation.addEventListener("click", function (e) {
    popupDeleteProject.style.display = "none";
    formDeleteProjectConfirmation.style.display = "none";
});

popupDeleteProject.addEventListener("click", function (e) {
    e.stopPropagation();
    formDeleteProjectConfirmation.style.display = "none";
    popupDeleteProject.style.display = "none";
});

formDeleteProjectConfirmation.addEventListener("click", function (e) {
    e.stopPropagation();
});
