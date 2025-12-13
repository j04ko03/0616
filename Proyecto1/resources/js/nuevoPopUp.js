/**
 * Popup de confirmaci贸n gen茅rico para formularios.
 * 
 * Intercepta el env铆o de formularios para mostrar un popup de confirmaci贸n
 * antes de enviar. El usuario debe hacer click en "Aceptar" para enviar
 * el formulario, o "Cancelar" para cerrar el popup sin enviar.
 * 
 * @author Joaqu韓 <joaquinmscollo@gmail.com>
 */

document.addEventListener("DOMContentLoaded", () => {

    const btnModificar = document.querySelector("form button[type='submit']");
    const popup = document.getElementById("popupConfirmar");
    const btnCancelar = document.getElementById("btnCancelar");
    const btnAceptar = document.getElementById("btnAceptar");

    /**
     * Interceptar el env铆o del formulario para mostrar popup de confirmaci贸n.
     */
    btnModificar.addEventListener("click", function (e) {
        e.preventDefault();
        popup.style.display = "flex";
    });

    /**
     * Cancelar la acci贸n y cerrar el popup.
     */
    btnCancelar.addEventListener("click", function () {
        popup.style.display = "none";
    });

    /**
     * Confirmar la acci贸n y enviar el formulario.
     */
    btnAceptar.addEventListener("click", function () {
        btnModificar.closest("form").submit();
    });

});
