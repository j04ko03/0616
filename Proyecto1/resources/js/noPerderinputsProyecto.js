/**
 * Persistencia de datos del formulario de proyecto usando localStorage.
 * 
 * Previene la pérdida de datos del formulario cuando el usuario navega
 * entre la página de crear proyecto y la página de añadir tareas.
 * 
 * Funcionalidades:
 * - Guardar inputs del proyecto en localStorage al ir a añadir tareas
 * - Recuperar datos guardados al volver a la página de crear proyecto
 * - Limpiar localStorage al crear el proyecto o cerrar el formulario
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener("DOMContentLoaded", () => {

    const tituloInput = document.getElementById("titulo");
    const fechaLimiteInput = document.getElementById("fecha-limite");
    const linkInput = document.getElementById("link");
    const descripcionInput = document.getElementById("descripcion");
    const presupuestoInput = document.getElementById("presupuesto");

    const addTareas = document.getElementById("add-tareas-btn");
    const addProyecto = document.getElementById("add-proyecto-btn");
    const cerrarCrearProyecto = document.getElementById("cerrarCrearProyecto");

    // RECUPERAR datos guardados de localStorage
    const tituloInputR = localStorage.getItem("tituloInput");
    const fechaLimiteInputR = localStorage.getItem("fechaLimiteInput");
    const linkInputR = localStorage.getItem("linkInput");
    const descripcionInputR = localStorage.getItem("descripcionInput");
    const presupuestoInputR = localStorage.getItem("presupuestoInput");

    /**
     * Restaurar valores de los inputs desde localStorage si existen.
     */
    try {
        if (tituloInputR && tituloInput) {
            tituloInput.value = tituloInputR;
        }

        if (fechaLimiteInputR && fechaLimiteInput) {
            fechaLimiteInput.value = fechaLimiteInputR;
        }

        if (linkInputR && linkInput) {
            linkInput.value = linkInputR;
        }

        if (descripcionInputR && descripcionInput) {
            descripcionInput.value = descripcionInputR;
        }

        if (presupuestoInputR && presupuestoInput) {
            presupuestoInput.value = presupuestoInputR;
        }

    } catch (e) {
        console.log(e);
    }

    /**
     * Guardar datos en localStorage antes de ir a añadir tareas.
     */
    if (addTareas) {
        addTareas.addEventListener('click', () => {
            //Guardar en la local Storage
            if (tituloInput) localStorage.setItem("tituloInput", tituloInput.value);
            if (fechaLimiteInput) localStorage.setItem("fechaLimiteInput", fechaLimiteInput.value);
            if (linkInput) localStorage.setItem("linkInput", linkInput.value);
            if (descripcionInput) localStorage.setItem("descripcionInput", descripcionInput.value);
            if (presupuestoInput) localStorage.setItem("presupuestoInput", presupuestoInput.value);
        });
    }

    /**
     * Limpiar localStorage al crear el proyecto exitosamente.
     */
    if (addProyecto) {
        addProyecto.addEventListener('click', () => {
            //Eliminar en la local Storage
            localStorage.removeItem("tituloInput");
            localStorage.removeItem("fechaLimiteInput");
            localStorage.removeItem("linkInput");
            localStorage.removeItem("descripcionInput");
            localStorage.removeItem("presupuestoInput");
        });
    }

    /**
     * Limpiar todo localStorage al cerrar el formulario.
     */
    if (cerrarCrearProyecto) {
        cerrarCrearProyecto.addEventListener('click', () => {
            //Eliminar en la local Storage
            localStorage.clear();
        });
    }

    /**
     * Detectar cambios de página (aunque no se usa actualmente).
     */
    window.addEventListener("hashchange", () => {
        console.log("Se va a cambiar de página a,", window.location.hash);
    });

});