/**
 * Guardar tareas en localStorage sin proyecto asignado durante su creación.
 * 
 * Permite crear tareas temporales que se guardan en localStorage hasta
 * que se cree el proyecto. Útil para el flujo de creación de proyecto
 * donde se añaden tareas antes de guardar el proyecto.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

const tituloTarea = document.getElementById('tituloTarea');
const fechaEntrega = document.getElementById('fechaEntrega');
const presupuesto = document.getElementById('presupuesto');
const estado = document.getElementById('estado');
const sprint = document.getElementById('sprint');
const addTareaFantasma = document.getElementById('addTareaFantasma');
const textArea = document.getElementById('textArea');
const responsableId = document.getElementById('labelId');

/**
 * Guardar tarea temporal en localStorage al hacer click en añadir tarea.
 * La tarea se guarda con fecha/hora precisa para mantener orden.
 */
if (addTareaFantasma) {
    addTareaFantasma.addEventListener("click", function (e) {

        //Parseamos el JSON para añadir las tareas de la local a nuestra variable
        let tareasTemporales = JSON.parse(localStorage.getItem("tareasTemporales")) || [];
        const now = new Date();

        const horas = now.getHours();
        const minutos = now.getMinutes();
        const segundos = now.getSeconds();
        const milisegundos = now.getMilliseconds();

        //Recogemos Usuarios de la lista de las tareas
        const usuariosSeleccionadosArray = Array.from(document.querySelectorAll('#usuarios-seleccionados .usuario-seleccionado'))
            .map(div => ({
                id: div.dataset.id,
                nombre: div.dataset.name,
                tipo: div.dataset.tipo
            }));

        // Crear nueva tarea temporal
        const nuevaTarea = {
            titulo: tituloTarea ? tituloTarea.value : '',
            fechaEntrega: fechaEntrega ? `${fechaEntrega.value} ${String(horas).padStart(2, '0')}:${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}:${String(milisegundos).padStart(3, '0')}` : '',
            presupuesto: presupuesto ? presupuesto.value : 0,
            estado: estado ? estado.value : 1,
            descripcion: textArea ? textArea.value : '',
            responsableId: responsableId ? responsableId.dataset.id : null,
            isDeleted: 0,
            idSprint: sprint ? sprint.value : null,
            proyectoId: 1, // Placeholder
            usuariosAsignados: usuariosSeleccionadosArray
        };

        console.log(nuevaTarea);

        tareasTemporales.push(nuevaTarea);

        //Guardamos el array en el localStorage y lo parseamos a String
        localStorage.setItem("tareasTemporales", JSON.stringify(tareasTemporales));

        //Limpieza de campos usados
        if (tituloTarea) tituloTarea.value = "";
        if (fechaEntrega) fechaEntrega.value = "";
        if (presupuesto) presupuesto.value = "";
        if (estado) estado.value = "1";

        alert("Tarea guardada temporalmente. Ahora puedes volver al proyecto.");
    });
}
