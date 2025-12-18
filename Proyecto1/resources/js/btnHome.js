/**
 * Alternancia entre vistas de Proyectos y Tareas en el home.
 * 
 * Gestiona los botones de navegación en la página principal para alternar
 * entre la sección de proyectos y la sección de tareas.
 * Incluye estilos visuales para indicar la sección activa.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
    const btnProyectos = document.getElementById('btn-proyectos');
    const btnTareas = document.getElementById('btn-tareas');
    const sectionProyectos = document.getElementById('section-proyectos');
    const sectionTareas = document.getElementById('section-tareas');

    /**
     * Mostrar sección de proyectos y ocultar tareas.
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
     * Mostrar sección de tareas y ocultar proyectos.
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
