const buttonPlus = document.getElementById('plus');
const buttonLess = document.getElementById('less');
const contenedorTareas = document.getElementById('contenedorTareasProyecto');
const btnCerrar = document.getElementById('img');

buttonPlus.addEventListener('click', () => {
    contenedorTareas.style.display = 'block';
    buttonPlus.classList.add('oculto');
    buttonLess.classList.remove('oculto');
});

buttonLess.addEventListener('click', () => {
    contenedorTareas.style.display = 'none';
    buttonPlus.classList.remove('oculto');
    buttonLess.classList.add('oculto');
});  

btnCerrar.addEventListener('click', () => {
    contenedorTareas.style.display = 'none';
    buttonPlus.classList.remove('oculto');
    buttonLess.classList.add('oculto');
});  