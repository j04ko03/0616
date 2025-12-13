/**
 * Controlador de visibilidad de la barra de navegación.
 * 
 * Oculta la navbar en las páginas de signup y signin,
 * mostrándola en el resto de páginas de la aplicación.
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

const hostWithPort = window.location.href;
const navbar = document.getElementById('navbar');
console.log(hostWithPort);

// Ocultar navbar en páginas de autenticación
if (hostWithPort.includes('signup') || hostWithPort.includes('signin')) {
    navbar.style.display = 'none';
} else {
    navbar.style.display = 'sticky';
};