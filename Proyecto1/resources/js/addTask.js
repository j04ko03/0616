/**
 * Gestión de creación de tareas con popup.
 * 
 * Maneja la funcionalidad completa para añadir tareas desde el tablero Kanban:
 * - Navegación entre tabs
 * - Abrir/cerrar popup de crear tarea
 * - Gestión de documentos adjuntos
 * - Gestión de etiquetas (tags)
 * - Gestión de subtareas
 * - Envío del formulario de tarea
 * - Establece la columna (estado) automáticamente según el botón clickeado
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

// TABS FUNCTIONALITY
const btnContainer = document.querySelector("#tab-container");
const tabsBtn = document.querySelectorAll(".tabs-btn");
const tabsContent = document.querySelectorAll(".tabs-content");

btnContainer.addEventListener("click", function (e) {
    const clicked = e.target.closest(".tabs-btn");
    if (!clicked) return;
    tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
    clicked.classList.add("btn-active");

    tabsContent.forEach((tab) => tab.classList.remove("content-active"));
    document
        .querySelector(`.content-section-${clicked.dataset.tab}`)
        .classList.add("content-active");
});

// POPUP FUNCTIONALITY
const taskPopup = document.getElementById('taskPopup');
const popupQuitBtn = document.getElementById('popupQuitBtn');
const addTaskButtons = document.querySelectorAll('.add-task');
const taskForm = document.getElementById('taskForm');
const taskColumnInput = document.getElementById('taskColumn');

/**
 * Abrir popup cuando se hace click en botón ADD TASK.
 * Guarda la columna (estado) donde se añadirá la tarea.
 */
addTaskButtons.forEach(button => {
    button.addEventListener('click', function () {
        const column = this.getAttribute('data-column');
        taskColumnInput.value = column;
        taskPopup.classList.add('popup-active');

        // Establecer fecha mínima como hoy
        const today = new Date().toISOString().split("T")[0];
        document.getElementById('fecha-limite').min = today;
    });
});

// Cerrar popup con el botón X
popupQuitBtn.addEventListener('click', closePopup);

/**
 * Cerrar popup al hacer click fuera del contenido.
 */
taskPopup.addEventListener('click', function (e) {
    if (e.target === taskPopup) {
        closePopup();
    }
});

/**
 * Cierra el popup y resetea el formulario.
 */
function closePopup() {
    taskPopup.classList.remove('popup-active');
    taskForm.reset();
    document.getElementById('popupSelectedDocuments').innerHTML = '';
    document.getElementById('popupTagsContainer').innerHTML = '';
    document.getElementById('popupTareasList').innerHTML = '';
}

// MANEJAR DOCUMENTOS
const popupDocInput = document.getElementById('popupDocumento');
const popupSelectedDocs = document.getElementById('popupSelectedDocuments');

/**
 * Mostrar documentos seleccionados en una lista.
 */
popupDocInput.addEventListener('change', function (e) {
    if (e.target.files.length > 0) {
        [...e.target.files].forEach(file => {
            popupSelectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`);
        });
    }
});

// MANEJAR ETIQUETAS (TAGS)
const newTagInput = document.getElementById('newTagInput');
const popupTagsContainer = document.getElementById('popupTagsContainer');

/**
 * Crear nueva etiqueta al presionar Enter.
 */
newTagInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const tagText = this.value.trim();
        if (tagText) {
            popupTagsContainer.insertAdjacentHTML('beforeend',
                `<span class="tags">${tagText}</span>`
            );
            this.value = '';
        }
    }
});

// MANEJAR SUBTAREAS
const popupAddSubtaskBtn = document.getElementById('popupAddSubtaskBtn');
const popupTareasList = document.getElementById('popupTareasList');

/**
 * Añadir nueva subtarea a la lista.
 */
popupAddSubtaskBtn.addEventListener('click', function () {
    const subtaskCount = popupTareasList.children.length + 1;
    popupTareasList.insertAdjacentHTML('beforeend',
        `<div class="popup-tarea">
            Subtarea ${subtaskCount}
            <button type="button" class="popup-remove-btn">X</button>
        </div>`
    );
});

/**
 * Eliminar subtarea al hacer click en el botón X.
 */
popupTareasList.addEventListener('click', function (e) {
    if (e.target.classList.contains('popup-remove-btn')) {
        e.target.closest('.popup-tarea').remove();
    }
});

// ENVIAR FORMULARIO
/**
 * Procesar el envío del formulario de crear tarea.
 * Actualmente solo muestra en consola, se puede extender para enviar al servidor.
 */
taskForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Procesar los datos del formulario
    const formData = new FormData(this);
    const column = taskColumnInput.value;

    console.log('Tarea creada para columna:', column);
    console.log('Datos del formulario:', Object.fromEntries(formData));

    // Cerrar popup después de enviar
    closePopup();

    // Aquí se puede añadir la lógica para añadir la tarea al tablero Kanban
    alert('Tarea creada exitosamente!');
});