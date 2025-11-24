document.addEventListener('DOMContentLoaded', () => {
    const pros = document.querySelectorAll('.cardProjectCabecera');
    pros.forEach(pro => {
        pro.addEventListener('click', () => {
            const proyecto = JSON.parse(pro.dataset.projecte);
            console.log(proyecto);
            const idProyecto = proyecto.id;
            const url = `/project/${idProyecto}`;
            console.log('Redirecting to:', url);
            window.location.href = "/0616/Proyecto1/public" + url;
        });
    });
}); 