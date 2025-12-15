/**
 * Gestión del popup para eliminar usuarios del proyecto.
 * 
 * Maneja el evento de click en los iconos de editar usuario para mostrar
 * el popup de confirmación de eliminación. Usa data attributes para
 * personalizar el mensaje con el nombre del usuario.
 * 
 * Depende de la variable global 'popupBg' definida en otro script.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// DELETE USER FROM PROJECT
const popupUserProject = document.querySelectorAll(".popup-edit-user");
const formDeleteUserProject = document.getElementById("delete-user-project");

// Ensure popupBg is available or check safely
// const popupBg = document.getElementById("popup-bg"); // Assuming global variable strategy from other files

if (popupUserProject.length > 0 && formDeleteUserProject) {
    popupUserProject.forEach((popupUser) => {
        popupUser.addEventListener("click", function (e) {
            // Buscar si se hizo click en el botón de hacer admin
            let clicked = e.target.closest(".user-admin");

            // Si no, buscar si se hizo click en el botón de eliminar
            if (!clicked) {
                clicked = e.target.closest(".delete-user");
            }

            if (clicked) {
                // Si se hizo click en hacer admin, solo mostrar el popup de fondo
                if (typeof popupBg !== 'undefined' && popupBg && clicked.classList.contains("user-admin")) {
                    popupBg.style.display = "flex";
                } else if (clicked.classList.contains("delete-user")) {
                    // Si se hizo click en eliminar, mostrar popup de confirmación
                    const message = formDeleteUserProject.querySelector("p");
                    if (message) {
                        message.textContent = `¿Seguro que quiere eliminar a ${popupUser.dataset.nombre}?`;
                    }
                    if (typeof popupBg !== 'undefined' && popupBg) {
                        popupBg.style.display = "flex";
                    }
                    formDeleteUserProject.style.display = "flex";
                }
            }
        });
    });
}
