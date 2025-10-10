const hostWithPort = window.location.href;
const navbar = document.getElementById('navbar');
console.log(hostWithPort);

if (hostWithPort.includes('signup') || hostWithPort.includes('register')) {
    console.log('estoy en signup')
    navbar.style.display = 'none';
} else {
    navbar.style.display = 'sticky';
};