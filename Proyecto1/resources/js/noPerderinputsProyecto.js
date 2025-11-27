document.addEventListener("DOMContentLoaded", () => {

    const tituloInput = document.getElementById("titulo");
    const fechaLimiteInput = document.getElementById("fecha-limite");
    const linkInput = document.getElementById("link");
    const descripcionInput = document.getElementById("descripcion");
    const presupuestoInput = document.getElementById("presupuesto");
    
    const addTareas = document.getElementById("add-tareas-btn");
    const addProyecto = document.getElementById("add-proyecto-btn");
    const cerrarCrearProyecto = document.getElementById("cerrarCrearProyecto");

    //Variables recuperadas
    const tituloInputR = localStorage.getItem("tituloInput");
    const fechaLimiteInputR = localStorage.getItem("fechaLimiteInput");
    const linkInputR = localStorage.getItem("linkInput");
    const descripcionInputR = localStorage.getItem("descripcionInput");
    const presupuestoInputR = localStorage.getItem("presupuestoInput");

    try{
        if(tituloInputR){
            
            tituloInput.value = tituloInputR
        }

        if(fechaLimiteInputR){
            fechaLimiteInput.value = fechaLimiteInputR
        }

        if(tituloInputR){
            tituloInput.value = tituloInputR
        }

        if(linkInputR){
            linkInput.value = linkInputR
        }

        if(descripcionInputR){
            descripcionInput.value = descripcionInputR
        }

        if(presupuestoInputR){
            presupuestoInput.value = presupuestoInputR
        }

    }catch(e){
        console.log(e);
    }

    addTareas.addEventListener('click', () => {
        //Guardar en la local Storage
        localStorage.setItem("tituloInput", tituloInput.value);
        localStorage.setItem("fechaLimiteInput", fechaLimiteInput.value);
        localStorage.setItem("linkInput", linkInput.value);
        localStorage.setItem("descripcionInput", descripcionInput.value);
        localStorage.setItem("presupuestoInput", presupuestoInput.value);
    })

    addProyecto.addEventListener('click', () => {
        //Eliminar en la local Storage
        localStorage.removeItem("tituloInput");
        localStorage.removeItem("fechaLimiteInput");
        localStorage.removeItem("linkInput");
        localStorage.removeItem("descripcionInput");
        localStorage.removeItem("presupuestoInput");
    })

    cerrarCrearProyecto.addEventListener('click', () => {
        //Eliminar en la local Storage
        localStorage.clear();
    })

    window.addEventListener("hashchange", () => {
        console.log("Se va a cambiar de página a,", window.location.hash);
    });

});