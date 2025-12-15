/**
 * Actualización del título de la página y limpieza de localStorage.
 * 
 * Funcionalidades:
 * 1. Actualiza el título de la página dinámicamente según la ruta actual
 * 2. Limpia el localStorage al salir de ciertas rutas específicas
 *    (crear-proyecto y tareas) para evitar mantener datos obsoletos
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', function () {

    const currentPath = window.location.pathname;
    const rutas = currentPath.split("/");
    const ultimaPalabra = rutas.pop();

    let titleElement = document.querySelector('.pestaña');

    // Capitalizar primera letra de la última parte de la ruta
    let x = ultimaPalabra.charAt(0).toUpperCase() + ultimaPalabra.slice(1);

    // Actualizar el título de la página
    if (titleElement && ultimaPalabra) {
        titleElement.textContent = `OrgaTime - ${x}`;
    }

    // LIMPIEZA DE LOCALSTORAGE al salir de rutas específicas
    const prev = document.referrer;
    const current = window.location.href;

    const rutasPermitidas = [
        '/0616/Proyecto1/public/crear-proyecto',
        '/0616/Proyecto1/public/tareas',
    ];

    /**
     * Verifica si una URL está en la lista de rutas permitidas.
     * 
     * @param {string} url - URL a verificar
     * @returns {boolean} true si la URL está en las rutas permitidas
     */
    function esRutaPermitida(url) {
        return rutasPermitidas.some(ruta => url.includes(ruta));
    }

    // Limpiar localStorage si venimos de crear-proyecto o tareas
    // y vamos a cualquier otra página
    if ((prev.includes('/0616/Proyecto1/public/crear-proyecto') || prev.includes('/0616/Proyecto1/public/tareas')) && !esRutaPermitida(current)) {
        console.log("Limpiando local Storage");
        localStorage.clear();
    }

});