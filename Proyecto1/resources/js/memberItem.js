/**
 * Menú de opciones para miembros del proyecto.
 * 
 * Gestiona el popup de opciones que aparece al hacer click en el botón
 * de opciones de cada miembro del proyecto. Permite:
 * - Mostrar/ocultar popup de opciones
 * - Cerrar el popup al hacer click fuera
 * - Evitar propagación de eventos
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

const btnOptions = document.querySelectorAll(".button-member");
const member = document.querySelectorAll(".member");
const popupOptionsUser = document.querySelectorAll(".popup-edit-user");

/**
 * Mostrar popup de opciones al hacer click en el botón de opciones del miembro.
 */
btnOptions.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const memberClicked = e.currentTarget.closest(".member");

        // Encontrar el popup correspondiente a este miembro
        const popupUser = Array.from(popupOptionsUser).filter((user) => {
            if (user.dataset.id !== memberClicked.dataset.id) {
                user.classList.remove("display");
            }
            return user.dataset.id === memberClicked.dataset.id;
        })[0];

        popupUser.classList.toggle("display");

        e.stopPropagation();
    });
});

/**
 * Cerrar todos los popups al hacer click en cualquier parte del documento.
 */
document.addEventListener("click", function () {
    popupOptionsUser.forEach((popup) => popup.classList.remove("display"));
});

/**
 * Evitar que clicks dentro del popup lo cierren.
 */
popupOptionsUser.forEach((popup) => {
    popup.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});
