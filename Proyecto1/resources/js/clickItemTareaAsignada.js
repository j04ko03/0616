document.addEventListener('DOMContentLoaded', () => { 
    const cards = document.querySelectorAll('.idTareaAsignada');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            const tarea = JSON.parse(card.dataset.tarea);
            const url = card.dataset.url;
            console.log('URL de redirección:', url);
            console.log('Tarea data:', tarea);
            window.location.href = url;
        });
    });
});