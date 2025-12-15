/**
 * Navegación entre tabs del proyecto.
 * 
 * Gestiona la navegación entre diferentes pestañas (tabs) del proyecto mediante
 * event delegation. Cuando se hace click en un botón de tab, se activa visualmente
 * y se muestra el contenido correspondiente.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

// NAVIGATION BETWEEN TABS
const btnContainer = document.querySelector("#tab-container");
const tabsBtn = document.querySelectorAll(".tabs-btn");
const tabsContent = document.querySelectorAll(".tabs-content");

/**
 * Event listener para manejar clicks en los botones de tabs.
 * Usa event delegation para detectar clicks en .tabs-btn dentro del contenedor.
 */
if (btnContainer) {
    btnContainer.addEventListener("click", function (e) {
        const clicked = e.target.closest(".tabs-btn");
        if (!clicked) return;

        // Remover clase activa de todos los botones
        tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
        clicked.classList.add("btn-active");

        // Remover clase activa de todo el contenido
        tabsContent.forEach((tab) => tab.classList.remove("content-active"));

        // Mostrar el contenido correspondiente usando el data-tab del botón
        const content = document.querySelector(`.content-section-${clicked.dataset.tab}`);
        if (content) {
            content.classList.add("content-active");
        }
    });
}
