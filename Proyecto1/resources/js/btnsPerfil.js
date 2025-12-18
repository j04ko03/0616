/**
 * Navegación entre secciones del perfil de usuario.
 * 
 * Gestiona los botones de navegación en la página de perfil para alternar entre:
 * - Datos generales / Modificar datos
 * - Cerrar sesión (limpia localStorage)
 * - Solicitar Super Usuario (solo disponible para algunos usuarios)
 * - Crear incidencias
 * 
 * Incluye indicadores visuales (color verde) para la sección activa.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const btnDatosGenerales = document.getElementById('btnGeneralData');
    const btnCerrarSesion = document.getElementById('btnCloseSesion');
    const btnSolicitud = document.getElementById('btnSuperUser');
    const btnIncidencias = document.getElementById('btnIncidencias');

    const divSolicitud = document.getElementById('solicitarSuperUser');
    const divModificarDatos = document.getElementById('modificarDatos');
    const divCrearIncidencias = document.getElementById('crearIncidencias');

    // Mostrar modificar datos por defecto
    btnDatosGenerales.style.backgroundColor = "green";

    /**
     * Mostrar sección de datos generales/modificar datos.
     */
    btnDatosGenerales.addEventListener('click', () => {
        btnDatosGenerales.style.backgroundColor = "green";
        btnCerrarSesion.style.backgroundColor = "#ffffff";
        if (btnSolicitud) {
            btnSolicitud.style.backgroundColor = "#ffffff";
        }
        btnIncidencias.style.backgroundColor = "#ffffff";
        divModificarDatos.classList.remove('oculto');
        divSolicitud.classList.add('oculto');
        divCrearIncidencias.classList.add('oculto');
    });

    /**
     * Cerrar sesión y limpiar localStorage.
     */
    btnCerrarSesion.addEventListener('click', () => {
        btnDatosGenerales.style.backgroundColor = "#ffffff";
        btnCerrarSesion.style.backgroundColor = "green";
        if (btnSolicitud) {
            btnSolicitud.style.backgroundColor = "#ffffff";
        }
        btnIncidencias.style.backgroundColor = "#ffffff";
        localStorage.clear();
        console.log("Se limpia local Storage");
    });

    /**
     * Mostrar sección de solicitar super usuario (solo si existe el botón).
     */
    if (btnSolicitud) {
        btnSolicitud.addEventListener('click', () => {
            btnDatosGenerales.style.backgroundColor = "#ffffff";
            btnCerrarSesion.style.backgroundColor = "#ffffff";
            btnSolicitud.style.backgroundColor = "green";
            btnIncidencias.style.backgroundColor = "#ffffff";
            divModificarDatos.classList.add('oculto');
            divSolicitud.classList.remove('oculto');
            divCrearIncidencias.classList.add('oculto');
        });
    }

    /**
     * Mostrar sección de crear incidencias.
     */
    btnIncidencias.addEventListener('click', () => {
        btnDatosGenerales.style.backgroundColor = "#ffffff";
        btnCerrarSesion.style.backgroundColor = "#ffffff";
        if (btnSolicitud) {
            btnSolicitud.style.backgroundColor = "#ffffff";
        }
        btnIncidencias.style.backgroundColor = "green";
        divModificarDatos.classList.add('oculto');
        divSolicitud.classList.add('oculto');
        divCrearIncidencias.classList.remove('oculto');
    });
});