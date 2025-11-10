const tituloTarea = document.getElementById('tituloTarea');
const fechaEntrega = document.getElementById('fechaEntrega');
const presupuesto = document.getElementById('presupuesto');
//Puedo obtener el user con auth o con id
const estado = document.getElementById('estado');
const sprint = document.getElementById('sprint');
const addTareaFantasma = document.getElementById('addTareaFantasma');
const textArea = document.getElementById('textArea');
const responsableId = document.getElementById('labelId');

//Vamos a crear una funcion para guardar las tareas en el local storage, pero antes debemos recuperar de local las tareas en caso de que existan
addTareaFantasma.addEventListener("click", function(e){

    //Parseamos el JSON para añadir las tareas de la local a nuestra variable
    let tareasTemporales = JSON.parse(localStorage.getItem("tareasTemporales")) || [];
    const now = new Date();

    const horas = now.getHours();        
    const minutos = now.getMinutes();    
    const segundos = now.getSeconds();   
    const milisegundos = now.getMilliseconds();

    //Creamos una tarea
    const nuevaTarea = {
        titulo: tituloTarea.value,
        fechaEntrega: `${fechaEntrega.value} ${String(horas).padStart(2,'0')}:${String(minutos).padStart(2,'0')}:${String(segundos).padStart(2,'0')}:${String(milisegundos).padStart(3,'0')}`,
        presupuesto: presupuesto.value,
        estado: estado.value,
        descripcion: textArea.value,
        responsableId: responsableId.dataset.id,
        isDeleted: 0,
        idSprint: sprint.value,
        proyectoId: 1
    };

    console.log(nuevaTarea);

    tareasTemporales.push(nuevaTarea);

    //Guardamos el array en el localStorage y lo parseamos a String
    localStorage.setItem("tareasTemporales", JSON.stringify(tareasTemporales));

    //Limpieza de campos usados
    tituloTarea.value = "";
    fechaEntrega.value = "";
    presupuesto.value = "";
    estado.value = "1";

    alert("Tarea guardada temporalmente. Ahora puedes volver al proyecto.");

}); 