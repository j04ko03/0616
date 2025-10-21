// En tu layout principal o en un script global
document.addEventListener('DOMContentLoaded', function() {

    const currentPath = window.location.pathname;
    const rutas = currentPath.split("/");
    const ultimaPalabra = rutas.pop();
    
    let titleElement = document.querySelector('.pestaña');

    let x = ultimaPalabra.charAt(0).toUpperCase() + ultimaPalabra.slice(1);

    
    if (titleElement && ultimaPalabra) {
        titleElement.textContent = `OrgaTime - ${x}`;
    }

});