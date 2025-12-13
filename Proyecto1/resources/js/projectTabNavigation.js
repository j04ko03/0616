/**
 * Navegaci贸n entre tabs del proyecto.
 * 
 * Gestiona la navegaci贸n entre diferentes pesta帽as (tabs) del proyecto mediante
 * event delegation. Cuando se hace click en un bot贸n de tab, se activa visualmente
 * y se muestra el contenido correspondiente.
 * 
 * @author Joaqu韓 <joaquinmscollo@gmail.com>
 */

// NAVIGATION BETWEEN TABS
const btnContainer = document.querySelector("#tab-container");
const tabsBtn = document.querySelectorAll(".tabs-btn");
const tabsContent = document.querySelectorAll(".tabs-content");

/**
 * Event listener para manejar clicks en los botones de tabs.
 * Usa event delegation para detectar clicks en .tabs-btn dentro del contenedor.
 */
btnContainer.addEventListener("click", function (e) {
    const clicked = e.target.closest(".tabs-btn");
    if (!clicked) return;

    // Remover clase activa de todos los botones
    tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
    clicked.classList.add("btn-active");

    // Remover clase activa de todo el contenido
    tabsContent.forEach((tab) => tab.classList.remove("content-active"));

    // Mostrar el contenido correspondiente usando el data-tab del bot贸n
    document
        .querySelector(`.content-section-${clicked.dataset.tab}`)
        .classList.add("content-active");
});
