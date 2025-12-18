/**
 * Control de contraseña de superusuario para solicitudes.
 * 
 * Verifica que la contraseña introducida coincida con la contraseña
 * de superusuario antes de permitir el envío del formulario de solicitud.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

const passWord = "sdGhaflJHTeifhnsb322wscadfgv4";
const inputPass = document.getElementById('clave');
const btnSolicitud = document.getElementById('btnSolicitud');
const formSolicitud = document.getElementById('formSolicitud');

/**
 * Verificar contraseña antes de enviar el formulario.
 */
if (btnSolicitud && inputPass && formSolicitud) {
    btnSolicitud.addEventListener('click', function () {
        if (passWord === inputPass.value) {
            formSolicitud.submit();
        } else {
            alert("Password Errónea");
        }
    });
}