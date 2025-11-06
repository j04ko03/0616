//Extraemos los datos de la local storage, en caso que haya se llena rray, sino se deja vacia
let tareasTemporales = JSON.parse(localStorage.getItem("tareasTemporales")) || [];

const contenedorTareas = document.getElementById("tareas");
const cerrar = document.getElementById("cerrarCrearProyecto");
const hacerPut = document.getElementById("project");
//Mostrar las tareas de la localStorage en el contenedor
function mostrarLocal(){
    //limpiamos el contenedor
    contenedorTareas.innerHTML = "";
    contenedorTareas.innerHTML = `<p id="add-tareas-msg"></p>`;

    //Recorremos array para ponerlas
    tareasTemporales.forEach((tarea, indice) => {
        contenedorTareas.innerHTML += `
             <div class="tarea">${tarea.titulo} <button class="borrarTarea" type="button" onclick="borrarTarea(${indice})">X</button></div>
        `;
    });
}

// Función para eliminar tareas
function borrarTarea(indice) {
    tareasTemporales.splice(indice, 1);
    localStorage.setItem("tareasTemporales", JSON.stringify(tareasTemporales));
    mostrarLocal();
}

//Mostrar tareas inicial
mostrarLocal();

cerrar.addEventListener("click", function(e){
    localStorage.clear();
})

//Al guardar proyecto borramos la localStorage
hacerPut.addEventListener("submit", function(e){
    // Agregar tareas como input hidden JSON
    const tareasInput = document.createElement("input");
    tareasInput.type = "hidden";
    tareasInput.name = "tareas";
    tareasInput.value = JSON.stringify(tareasTemp);
    form.appendChild(tareasInput);

    localStorage.clear();
})
