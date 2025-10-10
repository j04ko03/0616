document.addEventListener('DOMContentLoaded', () => {
            const btnProyectos = document.getElementById('btn-proyectos');
            const btnTareas = document.getElementById('btn-tareas');
            const sectionProyectos = document.getElementById('section-proyectos');
            const sectionTareas = document.getElementById('section-tareas');

            btnProyectos.addEventListener('click', () => {
                sectionProyectos.style.display = 'block';
                sectionTareas.style.display = 'none';
                btnProyectos.style.color = '#16a34a';
                btnProyectos.style.borderBottom = '2px solid #16a34a';
                btnTareas.style.color = '#6b7280';       
                btnTareas.style.borderBottom = 'none';
            });

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