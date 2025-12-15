/**
 * Recuperar tareas temporales de localStorage para crear proyecto.
 * 
 * Muestra las tareas guardadas temporalmente en localStorage y permite:
 * - Visualizar tareas temporales
 * - Eliminar tareas individuales
 * - Enviar tareas junto con el formulario del proyecto
 * - Limpiar localStorage al cerrar o guardar
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

//Extraemos los datos de la local storage, en caso que haya se llena array, sino se deja vacia
let tareasTemporales = JSON.parse(localStorage.getItem("tareasTemporales")) || [];

const contenedorTareas = document.getElementById("tareas");
const cerrar = document.getElementById("cerrarCrearProyecto");
const hacerPut = document.getElementById("project");

/**
 * Mostrar las tareas de localStorage en el contenedor visual.
 */
function mostrarLocal() {
    if (!contenedorTareas) return;

    //limpiamos el contenedor
    contenedorTareas.innerHTML = "";
    contenedorTareas.innerHTML = `<p id="add-tareas-msg"></p>`;

    //Recorremos array para ponerlas
    tareasTemporales.forEach((tarea, indice) => {
        contenedorTareas.innerHTML += `
             <div class="tarea">${tarea.titulo} <button class="borrarTarea remove-btn" type="button" onclick="borrarTarea(${indice})">X</button></div>
        `;
    });
}

/**
 * Eliminar una tarea temporal específica del localStorage.
 * 
 * @param {number} indice - Índice de la tarea a eliminar en el array
 */
window.borrarTarea = function (indice) {
    tareasTemporales.splice(indice, 1);
    localStorage.setItem("tareasTemporales", JSON.stringify(tareasTemporales));
    mostrarLocal();
};

//Mostrar tareas inicial
mostrarLocal();

/**
 * Limpiar localStorage al cerrar el formulario.
 */
if (cerrar) {
    cerrar.addEventListener("click", function (e) {
        localStorage.clear();
    });
}

/**
 * Al guardar proyecto, enviar tareas como input hidden y limpiar localStorage.
 */
if (hacerPut) {
    hacerPut.addEventListener("submit", function (e) {
        // Agregar tareas como input hidden JSON
        const tareasInput = document.createElement("input");
        tareasInput.type = "hidden";
        tareasInput.name = "tareas";
        tareasInput.value = JSON.stringify(tareasTemporales);
        hacerPut.appendChild(tareasInput);

        localStorage.clear();
    });
}
