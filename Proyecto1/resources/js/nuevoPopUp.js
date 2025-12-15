/**
 * Popup de confirmación genérico para formularios.
 * 
 * Intercepta el envío de formularios para mostrar un popup de confirmación
 * antes de enviar. El usuario debe hacer click en "Aceptar" para enviar
 * el formulario, o "Cancelar" para cerrar el popup sin enviar.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener("DOMContentLoaded", () => {

    const btnModificar = document.querySelector("form button[type='submit']");
    const popup = document.getElementById("popupConfirmar");
    const btnCancelar = document.getElementById("btnCancelar");
    const btnAceptar = document.getElementById("btnAceptar");

    /**
     * Interceptar el envío del formulario para mostrar popup de confirmación.
     */
    if (btnModificar && popup) {
        btnModificar.addEventListener("click", function (e) {
            e.preventDefault();
            popup.style.display = "flex";
        });
    }

    /**
     * Cancelar la acción y cerrar el popup.
     */
    if (btnCancelar && popup) {
        btnCancelar.addEventListener("click", function () {
            popup.style.display = "none";
        });
    }

    /**
     * Confirmar la acción y enviar el formulario.
     */
    if (btnAceptar && btnModificar) {
        btnAceptar.addEventListener("click", function () {
            btnModificar.closest("form").submit();
        });
    }

});
