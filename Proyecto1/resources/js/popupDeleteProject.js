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
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// POP-UP UPDATE-DELETE PROJECT
const popupBgKey = document.getElementById("popup-bg"); // Rename to avoid conflict if included with others
const updateProjectBtnKey = document.getElementById("update-project");
const popupQuitBtnKey = document.getElementById("quit-btn");
const formUpdateProjectKey = document.getElementById("update-project-form");

// Reuse or new variables? The logic below seems independent.

/**
 * Abrir popup de actualización de proyecto.
 */
if (updateProjectBtnKey) {
    updateProjectBtnKey.addEventListener("click", function () {
        if (popupBgKey) popupBgKey.style.display = "flex";
        if (formUpdateProjectKey) formUpdateProjectKey.style.display = "flex";
    });
}

/**
 * Cerrar popup de actualización con el botón X.
 */
if (popupQuitBtnKey) {
    popupQuitBtnKey.addEventListener("click", function () {
        if (formUpdateProjectKey) formUpdateProjectKey.style.display = "none";
        if (popupBgKey) popupBgKey.style.display = "none";
    });
}

/**
 * Cerrar todos los popups al hacer click en el fondo.
 */
if (popupBgKey) {
    popupBgKey.addEventListener("click", function (e) {
        e.stopPropagation();
        if (formUpdateProjectKey) formUpdateProjectKey.style.display = "none";
        // Check if other popups exist before accessing style
        const popupDelete = document.getElementById("popup-delete-project-confirmation");
        if (popupDelete) popupDelete.style.display = "none";

        const formAdd = document.getElementById("form-add-user");
        if (formAdd) formAdd.style.display = "none";

        popupBgKey.style.display = "none";
    });
}

/**
 * Evitar que clicks dentro del formulario cierren el popup.
 */
if (formUpdateProjectKey) {
    formUpdateProjectKey.addEventListener("click", (e) => {
        e.stopPropagation();
    });
}

// POP-UP DELETE PROJECT CONFIRMATION
const popupDeleteProjectKey = document.getElementById("popup-delete-project-confirmation");
const deleteProjectBtnKey = document.getElementById("delete-project");
const formDeleteProjectConfirmationKey = document.getElementById("form-delete-project");
const cancelDeleteProjectBtnConfirmationKey = document.getElementById("cancel-delete-project-btn");

/**
 * Abrir popup de confirmación de eliminación de proyecto.
 */
if (deleteProjectBtnKey) {
    deleteProjectBtnKey.addEventListener("click", function () {
        if (popupDeleteProjectKey) popupDeleteProjectKey.style.display = "flex";
        if (formDeleteProjectConfirmationKey) formDeleteProjectConfirmationKey.style.display = "flex";
    });
}

/**
 * Cancelar la eliminación y cerrar el popup de confirmación.
 */
if (cancelDeleteProjectBtnConfirmationKey) {
    cancelDeleteProjectBtnConfirmationKey.addEventListener("click", function (e) {
        if (popupDeleteProjectKey) popupDeleteProjectKey.style.display = "none";
        if (formDeleteProjectConfirmationKey) formDeleteProjectConfirmationKey.style.display = "none";
    });
}

/**
 * Cerrar popup de eliminación al hacer click en el fondo.
 */
if (popupDeleteProjectKey) {
    popupDeleteProjectKey.addEventListener("click", function (e) {
        e.stopPropagation();
        if (formDeleteProjectConfirmationKey) formDeleteProjectConfirmationKey.style.display = "none";
        popupDeleteProjectKey.style.display = "none";
    });
}

/**
 * Evitar que clicks dentro del formulario de confirmación cierren el popup.
 */
if (formDeleteProjectConfirmationKey) {
    formDeleteProjectConfirmationKey.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}
