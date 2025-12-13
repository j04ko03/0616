/**
 * Gestión de popups de actualización y eliminación de proyectos.
 * 
 * Maneja dos popups principales:
 * 1. Popup de actualización/edición de proyecto
 * 2. Popup de confirmación de eliminación de proyecto
 * 
 * Incluye lógica para abrir, cerrar y gestionar clicks en el fondo
 * para cerrar los popups.
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

// POP-UP UPDATE-DELETE PROJECT
const popupBg = document.getElementById("popup-bg");
const updateProjectBtn = document.getElementById("update-project");
const popupQuitBtn = document.getElementById("quit-btn");
const formUpdateProject = document.getElementById("update-project-form");

/**
 * Abrir popup de actualización de proyecto.
 */
updateProjectBtn.addEventListener("click", function () {
    popupBg.style.display = "flex";
    formUpdateProject.style.display = "flex";
});

/**
 * Cerrar popup de actualización con el botón X.
 */
popupQuitBtn.addEventListener("click", function () {
    formUpdateProject.style.display = "none";
    popupBg.style.display = "none";
});

/**
 * Cerrar todos los popups al hacer click en el fondo.
 */
popupBg.addEventListener("click", function (e) {
    e.stopPropagation();
    formUpdateProject.style.display = "none";
    popupDeleteProject.style.display = "none";
    formAddUser.style.display = "none";
    popupBg.style.display = "none";
});

/**
 * Evitar que clicks dentro del formulario cierren el popup.
 */
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

/**
 * Abrir popup de confirmación de eliminación de proyecto.
 */
deleteProjectBtn.addEventListener("click", function () {
    popupDeleteProject.style.display = "flex";
    formDeleteProjectConfirmation.style.display = "flex";
});

/**
 * Cancelar la eliminación y cerrar el popup de confirmación.
 */
cancelDeleteProjectBtnConfirmation.addEventListener("click", function (e) {
    popupDeleteProject.style.display = "none";
    formDeleteProjectConfirmation.style.display = "none";
});

/**
 * Cerrar popup de eliminación al hacer click en el fondo.
 */
popupDeleteProject.addEventListener("click", function (e) {
    e.stopPropagation();
    formDeleteProjectConfirmation.style.display = "none";
    popupDeleteProject.style.display = "none";
});

/**
 * Evitar que clicks dentro del formulario de confirmación cierren el popup.
 */
formDeleteProjectConfirmation.addEventListener("click", function (e) {
    e.stopPropagation();
});
