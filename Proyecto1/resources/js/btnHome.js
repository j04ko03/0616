/**
 * Alternancia entre vistas de Proyectos y Tareas en el home.
 * 
 * Gestiona los botones de navegaci贸n en la p谩gina principal para alternar
 * entre la secci贸n de proyectos y la secci贸n de tareas.
 * Incluye estilos visuales para indicar la secci贸n activa.
 * 
 * @author Joaqu韓 <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const btnProyectos = document.getElementById('btn-proyectos');
    const btnTareas = document.getElementById('btn-tareas');
    const sectionProyectos = document.getElementById('section-proyectos');
    const sectionTareas = document.getElementById('section-tareas');

    /**
     * Mostrar secci贸n de proyectos y ocultar tareas.
     */
    btnProyectos.addEventListener('click', () => {
        sectionProyectos.style.display = 'block';
        sectionTareas.style.display = 'none';
        btnProyectos.style.color = '#16a34a';
        btnProyectos.style.borderBottom = '2px solid #16a34a';
        btnTareas.style.color = '#6b7280';
        btnTareas.style.borderBottom = 'none';
    });

    /**
     * Mostrar secci贸n de tareas y ocultar proyectos.
     */
    btnTareas.addEventListener('click', () => {
        sectionProyectos.style.display = 'none';
        sectionTareas.style.display = 'block';
        btnTareas.style.color = '#16a34a';
        btnTareas.style.borderBottom = '2px solid #16a34a';
        btnProyectos.style.color = '#6b7280';
        btnProyectos.style.borderBottom = 'none';

        btnProyectos.style.color = '#6b7280';
    });
});
