// REDIRECT TO NEW URL WITH PROJECT ID
document.getElementById("projects").addEventListener("change", function (e) {
    window.location = `${e.target.value}`;
});

// ADD USER POP-UP
const popupBg = document.getElementById("popup-bg");
const formAddUser = document.getElementById("form-add-user");
const addUserBtn = document.getElementById("add-user");
const cancelAddUserBtn = document.getElementById("cancel-add-user-btn");

addUserBtn.addEventListener("click", function () {
    popupBg.style.display = "flex";
    formAddUser.style.display = "flex";
});

cancelAddUserBtn.addEventListener("click", function () {
    popupBg.style.display = "none";
    formAddUser.style.display = "none";
});

formAddUser.addEventListener("click", function (e) {
    e.stopPropagation();
});

// ADD GROUP POP-UP


// POP-UP UPDATE-DELETE PROJECT
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

// DELETE AND UPDATE USER FROM PROJECT
const popupUserProject = document.querySelectorAll(".popup-edit-user");
const formDeleteUserProject = document.getElementById("delete-user-project");
const formUpdateUserAdmin = document.getElementById("update-user-admin");

popupUserProject.forEach((popupUser) => {
    popupUser.addEventListener("click", function (e) {
        const clickedUpdate = e.target.closest(".user-admin");
        const clickedDelete = e.target.closest(".delete-user");

        if (clickedUpdate) {
            popupBg.style.display = "flex";

            const message = formUpdateUserAdmin.querySelector("p");
            message.textContent = `¿Seguro que quiere hacer administrador a ${popupUser.dataset.nombre}?`;
            popupBg.style.display = "flex";
            formUpdateUserAdmin.style.display = "flex";

            const userId = document.querySelector("#user_id_admin");

            if (userId) {
                userId.value = popupUser.dataset.id;
            } else {
                const hiddenInput = `<input type="hidden" name="user_id_admin" id="user_id_admin" value="${popupUser.dataset.id}">`;
                formUpdateUserAdmin.insertAdjacentHTML(
                    "beforeend",
                    hiddenInput
                );
            }
        } else if (clickedDelete) {
            const message = formDeleteUserProject.querySelector("p");
            message.textContent = `¿Seguro que quiere eliminar a ${popupUser.dataset.nombre}?`;
            popupBg.style.display = "flex";
            formDeleteUserProject.style.display = "flex";

            const userId = document.querySelector("#user_id_delete");

            if (userId) {
                userId.value = popupUser.dataset.id;
            } else {
                const hiddenInput = `<input type="hidden" name="user_id_delete" id="user_id_delete" value="${popupUser.dataset.id}">`;
                formDeleteUserProject.insertAdjacentHTML(
                    "beforeend",
                    hiddenInput
                );
            }
        }
    });
});

formDeleteUserProject.addEventListener("click", function (e) {
    e.stopPropagation();
});
formUpdateUserAdmin.addEventListener("click", function (e) {
    e.stopPropagation();
});

// GLOBAL BACKGROUND
popupBg.addEventListener("click", function (e) {
    e.stopPropagation();
    formUpdateProject.style.display = "none";
    popupDeleteProject.style.display = "none";
    formAddUser.style.display = "none";
    popupBg.style.display = "none";
    formDeleteUserProject.style.display = "none";
    formUpdateUserAdmin.style.display = "none";
});
