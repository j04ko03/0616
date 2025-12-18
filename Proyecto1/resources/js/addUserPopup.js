/**
 * Gestión del popup para añadir usuarios.
 * 
 * Maneja la apertura y cierre del popup de añadir usuario al proyecto.
 * Depende de la variable global 'popupBg' definida en otro script.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// ADD USER POP-UP
const formAddUser = document.getElementById("form-add-user");
const addUserBtn = document.getElementById("add-user");
const cancelAddUserBtn = document.getElementById("cancel-add-user-btn"); 

// Abrir popup al hacer click en el botón de añadir usuario
if (addUserBtn && formAddUser) {
    addUserBtn.addEventListener("click", function () {
        if (typeof popupBg !== 'undefined' && popupBg) {
            popupBg.style.display = "flex";
        }
        formAddUser.style.display = "flex";
    });
}

// Cerrar popup al hacer click en el botón de cancelar
if (cancelAddUserBtn && formAddUser) {
    cancelAddUserBtn.addEventListener("click", function () {
        if (typeof popupBg !== 'undefined' && popupBg) {
            popupBg.style.display = "none";
        }
        formAddUser.style.display = "none";
    });
}

// Evitar que clicks dentro del formulario cierren el popup
if (formAddUser) {
    formAddUser.addEventListener("click", function (e) {
        e.stopPropagation();
    });
}
