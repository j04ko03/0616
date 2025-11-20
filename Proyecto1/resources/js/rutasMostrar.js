document.addEventListener('DOMContentLoaded', function() {

    const currentPath = window.location.pathname;
    const rutas = currentPath.split("/");
    const ultimaPalabra = rutas.pop();
    
    let titleElement = document.querySelector('.pestaña');

    let x = ultimaPalabra.charAt(0).toUpperCase() + ultimaPalabra.slice(1);
    
    if (titleElement && ultimaPalabra) {
        titleElement.textContent = `OrgaTime - ${x}`;
    }

    //parte de limpira local
    const prev = document.referrer;
    const current = window.location.href;

    const rutasPermitidas = [
        '/0616/Proyecto1/public/crear-proyecto',
        '/0616/Proyecto1/public/tareas',
    ];

    function esRutaPermitida(url) {
        return rutasPermitidas.some(ruta => url.includes(ruta));
    }

    if ((prev.includes('/0616/Proyecto1/public/crear-proyecto') || prev.includes('/0616/Proyecto1/public/tareas')) && !esRutaPermitida(current)) {
        console.log("Limpiando local Storage");
        localStorage.clear();
    }

});