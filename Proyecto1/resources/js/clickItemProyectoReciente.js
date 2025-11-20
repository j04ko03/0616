document.addEventListener('DOMContentLoaded', () => {
    const pros = document.querySelectorAll('.cardProjectCabecera');
    pros.forEach(pro => {
        pro.addEventListener('click', () => {
            const proyecto = JSON.parse(pro.dataset.projecte);
            console.log(proyecto);
            window.location.href = `/ver-proyecto/${proyecto.id}`;
        });
    });
}); 