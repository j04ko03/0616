// DELETE USER FROM PROJECT
const popupUserProject = document.querySelectorAll(".popup-edit-user");
const formDeleteUserProject = document.getElementById("delete-user-project");

popupUserProject.forEach((popupUser) => {
    popupUser.addEventListener("click", function (e) {
        let clicked = e.target.closest(".user-admin");
        if (!clicked) {
            clicked = e.target.closest(".delete-user");
        }

        if (clicked.classList.contains("user-admin")) {
            popupBg.style.display = "flex";
        } else {
            const message = formDeleteUserProject.querySelector("p");
            message.textContent = `¿Seguro que quiere eliminar a ${popupUser.dataset.nombre}?`;
            popupBg.style.display = "flex";
            formDeleteUserProject.style.display = "flex";
        }
    });
});
