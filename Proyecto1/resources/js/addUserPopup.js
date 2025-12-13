/**
 * Gestión del popup para añadir usuarios.
 * 
 * Maneja la apertura y cierre del popup de añadir usuario al proyecto.
 * Depende de la variable global 'popupBg' definida en otro script.
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

// ADD USER POP-UP
const formAddUser = document.getElementById("form-add-user");
const addUserBtn = document.getElementById("add-user");
const cancelAddUserBtn = document.getElementById("cancel-add-user-btn");

// Abrir popup al hacer click en el botón de añadir usuario
addUserBtn.addEventListener("click", function () {
    popupBg.style.display = "flex";
    formAddUser.style.display = "flex";
});

// Cerrar popup al hacer click en el botón de cancelar
cancelAddUserBtn.addEventListener("click", function () {
    popupBg.style.display = "none";
    formAddUser.style.display = "none";
});

// Evitar que clicks dentro del formulario cierren el popup
formAddUser.addEventListener("click", function (e) {
    e.stopPropagation();
});
