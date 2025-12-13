/**
 * Gesti贸n del popup para eliminar usuarios del proyecto.
 * 
 * Maneja el evento de click en los iconos de editar usuario para mostrar
 * el popup de confirmaci贸n de eliminaci贸n. Usa data attributes para
 * personalizar el mensaje con el nombre del usuario.
 * 
 * Depende de la variable global 'popupBg' definida en otro script.
 * 
 * @author Joaqu韓 <joaquinmscollo@gmail.com>
 */

// DELETE USER FROM PROJECT
const popupUserProject = document.querySelectorAll(".popup-edit-user");
const formDeleteUserProject = document.getElementById("delete-user-project");

popupUserProject.forEach((popupUser) => {
    popupUser.addEventListener("click", function (e) {
        // Buscar si se hizo click en el bot贸n de hacer admin
        let clicked = e.target.closest(".user-admin");

        // Si no, buscar si se hizo click en el bot贸n de eliminar
        if (!clicked) {
            clicked = e.target.closest(".delete-user");
        }

        // Si se hizo click en hacer admin, solo mostrar el popup de fondo
        if (clicked.classList.contains("user-admin")) {
            popupBg.style.display = "flex";
        } else {
            // Si se hizo click en eliminar, mostrar popup de confirmaci贸n
            const message = formDeleteUserProject.querySelector("p");
            message.textContent = `驴Seguro que quiere eliminar a ${popupUser.dataset.nombre}?`;
            popupBg.style.display = "flex";
            formDeleteUserProject.style.display = "flex";
        }
    });
});
