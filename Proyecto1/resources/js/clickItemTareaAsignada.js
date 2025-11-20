document.addEventListener('DOMContentLoaded', () => { 
    const cards = document.querySelectorAll('.idTareaAsignada');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            const id = card.dataset.id;
            console.log('Card clicked:' + id);
        });
    });
});