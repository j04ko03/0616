/**
 * Redirección al hacer click en proyectos recientes.
 * 
 * Maneja la navegación desde las tarjetas de proyectos recientes
 * hacia la vista detallada del proyecto. Extrae el ID del proyecto
 * desde el data attribute y redirige.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const pros = document.querySelectorAll('.cardProjectCabecera');

    pros.forEach(pro => {
        /**
         * Redirigir al proyecto al hacer click en la tarjeta.
         */
        pro.addEventListener('click', () => {
            if (pro.dataset.projecte) {
                try {
                    const proyecto = JSON.parse(pro.dataset.projecte);
                    const idProyecto = proyecto.id;
                    const url = `/project/${idProyecto}`;
                    window.location.href = "/0616/Proyecto1/public" + url;
                } catch (e) {
                    console.error("Error parsing project data", e);
                }
            }
        });
    });
}); 