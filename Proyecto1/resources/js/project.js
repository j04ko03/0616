/**
 * Gestión completa de la vista de proyecto.
 * 
 * Este archivo gestiona todas las funcionalidades principales de la página de proyecto:
 * - Configuración de fecha mínima para inputs de fecha
 * - Redirección entre proyectos mediante dropdown
 * - Gestión de múltiples popups:
 *   - Añadir usuario
 *   - Actualizar/modificar proyecto
 *   - Eliminar proyecto (confirmación)
 *   - Eliminar usuario de proyecto
 *   - Promover usuario a administrador
 *   - Añadir grupo de usuarios
 * 
 * Todos los popups comparten un fondo común (#popup-bg) para mejorar UX.
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

// CONFIGURACIÓN DE FECHA MÍNIMA
const todayProject = new Date().toISOString().split("T")[0];
const inputDateProject = document.querySelector("#fecha-limite");
if (inputDateProject) {
    inputDateProject.min = todayProject;
}

// REDIRECCIÓN ENTRE PROYECTOS
const projectsSelect = document.getElementById("projects");
if (projectsSelect) {
    projectsSelect.addEventListener("change", function (e) {
        window.location = `${e.target.value}`;
    });
}

// ELEMENTO GLOBAL DE FONDO DE POPUP
const popupBg = document.getElementById("popup-bg");

// ==================== POPUP DE AÑADIR USUARIO ====================
const formAddUser = document.getElementById("form-add-user");
const addUserBtn = document.getElementById("add-user");
const cancelAddUserBtn = document.getElementById("cancel-add-user-btn");

if (addUserBtn) {
    addUserBtn.addEventListener("click", function () {
        if (popupBg && formAddUser) {
            popupBg.style.display = "flex";
            formAddUser.style.display = "flex";
        }
    });
}

if (cancelAddUserBtn) {
    cancelAddUserBtn.addEventListener("click", function () {
        if (popupBg && formAddUser) {
            popupBg.style.display = "none";
            formAddUser.style.display = "none";
        }
    });
}

if (formAddUser) {
    formAddUser.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// ==================== POPUP DE ACTUALIZAR/ELIMINAR PROYECTO ====================
const updateProjectBtn = document.getElementById("update-project");
const popupQuitBtn = document.getElementById("quit-btn");
const formUpdateProject = document.getElementById("update-project-form");

if (updateProjectBtn) {
    updateProjectBtn.addEventListener("click", function () {
        if (popupBg && formUpdateProject) {
            popupBg.style.display = "flex";
            formUpdateProject.style.display = "flex";
        }
    });
}

if (popupQuitBtn) {
    popupQuitBtn.addEventListener("click", function () {
        if (popupBg && formUpdateProject) {
            formUpdateProject.style.display = "none";
            popupBg.style.display = "none";
        }
    });
}

if (formUpdateProject) {
    formUpdateProject.addEventListener("click", (e) => {
        e.stopPropagation();
    });
}

// ==================== POPUP DE CONFIRMACIÓN DE ELIMINAR PROYECTO ====================
const popupDeleteProject = document.getElementById("popup-delete-project-confirmation");
const deleteProjectBtn = document.getElementById("delete-project");
const formDeleteProjectConfirmation = document.getElementById("form-delete-project");
const cancelDeleteProjectBtnConfirmation = document.getElementById("cancel-delete-project-btn");

if (deleteProjectBtn) {
    deleteProjectBtn.addEventListener("click", function () {
        if (popupDeleteProject && formDeleteProjectConfirmation) {
            popupDeleteProject.style.display = "flex";
            formDeleteProjectConfirmation.style.display = "flex";
        }
    });
}

if (cancelDeleteProjectBtnConfirmation) {
    cancelDeleteProjectBtnConfirmation.addEventListener("click", function (e) {
        if (popupDeleteProject && formDeleteProjectConfirmation) {
            popupDeleteProject.style.display = "none";
            formDeleteProjectConfirmation.style.display = "none";
        }
    });
}

if (popupDeleteProject) {
    popupDeleteProject.addEventListener("click", function (e) {
        e.stopPropagation();
        if (formDeleteProjectConfirmation) {
            formDeleteProjectConfirmation.style.display = "none";
        }
        popupDeleteProject.style.display = "none";
    });
}

if (formDeleteProjectConfirmation) {
    formDeleteProjectConfirmation.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// ==================== ELIMINAR Y PROMOVER USUARIOS DEL PROYECTO ====================
const popupUserProject = document.querySelectorAll(".popup-edit-user");
const formDeleteUserProject = document.getElementById("delete-user-project");
const formUpdateUserAdmin = document.getElementById("update-user-admin");

if (popupUserProject.length > 0) {
    popupUserProject.forEach((popupUser) => {
        popupUser.addEventListener("click", function (e) {
            const clickedUpdate = e.target.closest(".user-admin");
            const clickedDelete = e.target.closest(".delete-user");

            // Si se hace click en promover a admin
            if (clickedUpdate && popupBg && formUpdateUserAdmin) {
                const message = formUpdateUserAdmin.querySelector("p");
                if (message) message.textContent = `¿Seguro que quiere hacer administrador a ${popupUser.dataset.nombre}?`;
                popupBg.style.display = "flex";
                formUpdateUserAdmin.style.display = "flex";

                const userId = document.querySelector("#user_id_admin");
                if (userId) {
                    userId.value = popupUser.dataset.id;
                } else {
                    const hiddenInput = `<input type="hidden" name="user_id_admin" id="user_id_admin" value="${popupUser.dataset.id}">`;
                    formUpdateUserAdmin.insertAdjacentHTML("beforeend", hiddenInput);
                }
            }
            // Si se hace click en eliminar usuario
            else if (clickedDelete && popupBg && formDeleteUserProject) {
                const message = formDeleteUserProject.querySelector("p");
                if (message) message.textContent = `¿Seguro que quiere eliminar a ${popupUser.dataset.nombre}?`;
                popupBg.style.display = "flex";
                formDeleteUserProject.style.display = "flex";

                const userId = document.querySelector("#user_id_delete");
                if (userId) {
                    userId.value = popupUser.dataset.id;
                } else {
                    const hiddenInput = `<input type="hidden" name="user_id_delete" id="user_id_delete" value="${popupUser.dataset.id}">`;
                    formDeleteUserProject.insertAdjacentHTML("beforeend", hiddenInput);
                }
            }
        });
    });
}

const cancelBtnUpdateUser = document.getElementById("cancel-update-user-admin");
const cancelBtnRemoveUser = document.getElementById("cancel-remove-user");

if (cancelBtnUpdateUser) {
    cancelBtnUpdateUser.addEventListener("click", function () {
        if (formUpdateUserAdmin && popupBg) {
            formUpdateUserAdmin.style.display = "none";
            popupBg.style.display = "none";
        }
    });
}

if (cancelBtnRemoveUser) {
    cancelBtnRemoveUser.addEventListener("click", function () {
        if (formDeleteUserProject && popupBg) {
            formDeleteUserProject.style.display = "none";
            popupBg.style.display = "none";
        }
    });
}

if (formDeleteUserProject) {
    formDeleteUserProject.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

if (formUpdateUserAdmin) {
    formUpdateUserAdmin.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// ==================== AÑADIR GRUPO ====================
const cancelAddGrpBtn = document.getElementById("cancel-add-grp-btn");
const formAddGrp = document.getElementById("add-grp-form");
const addGrpBtn = document.getElementById("add-group");

if (addGrpBtn) {
    addGrpBtn.addEventListener("click", function () {
        if (popupBg && formAddGrp) {
            popupBg.style.display = "flex";
            formAddGrp.style.display = "flex";
        }
    });
}

if (cancelAddGrpBtn) {
    cancelAddGrpBtn.addEventListener("click", function () {
        if (popupBg && formAddGrp) {
            popupBg.style.display = "none";
            formAddGrp.style.display = "none";
        }
    });
}

if (formAddGrp) {
    formAddGrp.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}

// ==================== CERRAR POPUPS AL HACER CLICK EN EL FONDO ====================
if (popupBg) {
    popupBg.addEventListener("click", function (e) {
        e.stopPropagation();
        if (formUpdateProject) formUpdateProject.style.display = "none";
        if (popupDeleteProject) popupDeleteProject.style.display = "none";
        if (formAddUser) formAddUser.style.display = "none";
        popupBg.style.display = "none";
        if (formDeleteUserProject) formDeleteUserProject.style.display = "none";
        if (formUpdateUserAdmin) formUpdateUserAdmin.style.display = "none";
        if (formAddGrp) formAddGrp.style.display = "none";
    });
}
