document.addEventListener("DOMContentLoaded", () => {

    const btnModificar = document.querySelector("form button[type='submit']");
    const popup = document.getElementById("popupConfirmar");
    const btnCancelar = document.getElementById("btnCancelar");
    const btnAceptar = document.getElementById("btnAceptar");

    // Abrir popup antes de enviar --> Modificable por VIEW
    btnModificar.addEventListener("click", function (e) {
        e.preventDefault();
        popup.style.display = "flex";
    });

    // Cancelar → cerrar popup
    btnCancelar.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Aceptar → enviar formulario
    btnAceptar.addEventListener("click", function () {
        btnModificar.closest("form").submit();
    });

});
