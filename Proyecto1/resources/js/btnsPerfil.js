document.addEventListener('DOMContentLoaded', () => {   
        const btnDatosGenerales = document.getElementById('btnGeneralData');
        const btnCerrarSesion = document.getElementById('btnCloseSesion');
        const btnSolicitud = document.getElementById('btnSuperUser');
        const btnIncidencias = document.getElementById('btnIncidencias');

        const divSolicitud = document.getElementById('solicitarSuperUser');
        const divModificarDatos = document.getElementById('modificarDatos');

        btnDatosGenerales.style.backgroundColor = "green";

        btnDatosGenerales.addEventListener('click', () => {
            btnDatosGenerales.style.backgroundColor = "green";
            btnCerrarSesion.style.backgroundColor = "#ffffff";
            btnSolicitud.style.backgroundColor = "#ffffff";
            btnIncidencias.style.backgroundColor = "#ffffff";
            divModificarDatos.classList.remove('oculto');
            divSolicitud.classList.add('oculto');
        });

        btnCerrarSesion.addEventListener('click', () => {
            btnDatosGenerales.style.backgroundColor = "#ffffff";
            btnCerrarSesion.style.backgroundColor = "green";
            btnSolicitud.style.backgroundColor = "#ffffff";
            btnIncidencias.style.backgroundColor = "#ffffff";
        });

        btnSolicitud.addEventListener('click', () => {
            btnDatosGenerales.style.backgroundColor = "#ffffff";
            btnCerrarSesion.style.backgroundColor = "#ffffff";
            btnSolicitud.style.backgroundColor = "green";
            btnIncidencias.style.backgroundColor = "#ffffff";
            divModificarDatos.classList.add('oculto');
            divSolicitud.classList.remove('oculto');
        });

        btnIncidencias.addEventListener('click', () => {
            btnDatosGenerales.style.backgroundColor = "#ffffff";
            btnCerrarSesion.style.backgroundColor = "#ffffff";
            btnSolicitud.style.backgroundColor = "#ffffff";
            btnIncidencias.style.backgroundColor = "green";
            divModificarDatos.classList.add('oculto');
            divSolicitud.classList.remove('oculto');
        });
});