/**
 * Gestor completo de tareas - formularios y selectores múltiples.
 * 
 * Funcionalidades principales:
 * 1. Gestión de documentos adjuntos
 * 2. Configuración de fecha mínima
 * 3. Selector de usuarios con búsqueda
 * 4. Selector de cursos/objetivos con textarea
 * 5. Añadir/eliminar usuarios de la lista
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

// DOCUMENTOS
const selectedDocs = document.querySelector("#selected-documents");
const docInput = document.querySelector("#documento");

/**
 * Mostrar documentos seleccionados en la lista.
 */
docInput.addEventListener('change', function (e) {
    if (e.target.files.length > 0) {
        selectedDocs.textContent = 'Documentos:';
        [...e.target.files].forEach(file => {
            selectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`);
        });
    } else {
        selectedDocs.textContent = '';
    }
});

// FECHA MÍNIMA
const today = new Date().toISOString().split("T")[0];
document.querySelector("#fecha-limite").min = today;

// SELECTOR DE USUARIOS CON BÚSQUEDA
const addUserBtn = document.getElementById('add-user-btn');
const userSearch = document.querySelector('.user-search');
const userList = document.querySelector('.user-list');
const tareasContainer = document.getElementById('tareas');
const userItems = document.querySelectorAll('.user-item');

/**
 * Mostrar lista de usuarios al hacer click en añadir usuario.
 */
addUserBtn.addEventListener('click', function () {
    userSearch.style.display = 'block';
    userList.classList.add('show');
    userSearch.focus();
});

/**
 * Filtrar usuarios mientras se escribe en el buscador.
 */
userSearch.addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    userItems.forEach(item => {
        const userName = item.getAttribute('data-user').toLowerCase();
        if (userName.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

/**
 * Añadir usuario a la lista al hacer click.
 */
userItems.forEach(item => {
    item.addEventListener('click', function () {
        const userName = this.getAttribute('data-user');
        addUserToList(userName);
        userSearch.value = '';
        userSearch.style.display = 'none';
        userList.classList.remove('show');
    });
});

/**
 * Añade un usuario a la lista de tareas evitando duplicados.
 * 
 * @param {string} userName - Nombre del usuario a añadir
 */
function addUserToList(userName) {
    // Verificar si el usuario ya está en la lista
    const existingUsers = Array.from(tareasContainer.querySelectorAll('.tarea .user-name'));
    const isUserAlreadyAdded = existingUsers.some(el => el.textContent === userName);

    if (!isUserAlreadyAdded) {
        const userElement = document.createElement('div');
        userElement.className = 'tarea';
        userElement.innerHTML = `
            <span class="user-name">${userName}</span>
            <button class="remove-user" type="button">×</button>
        `;
        tareasContainer.appendChild(userElement);

        // Añadir funcionalidad al botón de eliminar
        userElement.querySelector('.remove-user').addEventListener('click', function () {
            userElement.remove();
        });
    }
}

/**
 * Cerrar el desplegable al hacer clic fuera.
 */
document.addEventListener('click', function (e) {
    if (!e.target.closest('.user-dropdown')) {
        userSearch.style.display = 'none';
        userList.classList.remove('show');
    }
});

// SELECTOR DE CURSOS/OBJETIVOS
const textArea = document.getElementById('textArea');
const cursosList = document.querySelector('.cursos-list');
const cursoItems = document.querySelectorAll('.curso-item');

/**
 * Mostrar/ocultar lista de cursos al hacer clic en el textarea.
 */
textArea.addEventListener('click', function () {
    cursosList.classList.toggle('show');
});

/**
 * Seleccionar curso y añadirlo al textarea.
 */
cursoItems.forEach(item => {
    item.addEventListener('click', function () {
        const cursoNombre = this.getAttribute('data-curso');

        // Si el textarea está vacío, añadir el primer curso
        if (!textArea.value) {
            textArea.value = cursoNombre;
        } else {
            // Si ya tiene contenido, añadir con coma
            const cursosActuales = textArea.value.split(', ');

            // Verificar si el curso ya está seleccionado
            if (!cursosActuales.includes(cursoNombre)) {
                textArea.value += ', ' + cursoNombre;
            }
        }

        // Añadir clase para estilo visual
        textArea.classList.add('filled');

        // Ocultar la lista después de seleccionar
        cursosList.classList.remove('show');
    });
});

/**
 * Cerrar el desplegable de cursos al hacer clic fuera.
 */
document.addEventListener('click', function (e) {
    if (!e.target.closest('.objetivos-dropdown')) {
        cursosList.classList.remove('show');
    }
});

/**
 * Permitir escribir manualmente en el textarea además de seleccionar.
 */
textArea.addEventListener('focus', function () {
    this.removeAttribute('readonly');
});