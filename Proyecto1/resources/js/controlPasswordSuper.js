/**
 * Control de contraseña de superusuario para solicitudes.
 * 
 * Verifica que la contraseña introducida coincida con la contraseña
 * de superusuario antes de permitir el envío del formulario de solicitud.
 * 
 * NOTA DE SEGURIDAD: Incluir contraseñas en el código JavaScript del cliente
 * no es seguro. Esta funcionalidad debería implementarse en el servidor.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// NOTA: Esta contraseña está expuesta en el cliente.
const passWord = "sdGhaflJHTeifhnsb322wscadfgv4";
const inputPass = document.getElementById('clave');
const btnSolicitud = document.getElementById('btnSolicitud');
const formSolicitud = document.getElementById('formSolicitud');

/**
 * Verificar contraseña antes de enviar el formulario.
 */
if (btnSolicitud && inputPass && formSolicitud) {
    btnSolicitud.addEventListener('click', function () {
        // console.log(inputPass.value);
        if (passWord === inputPass.value) {
            formSolicitud.submit();
        } else {
            alert("Password Errónea");
        }
    });
}