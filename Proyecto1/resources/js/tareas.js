const selectedDocs = document.querySelector("#selected-documents");
const docInput = document.querySelector("#documento");
docInput.addEventListener('change', function (e) {
    if (e.target.files.length > 0) {
        selectedDocs.textContent = 'Documentos:';
        [...e.target.files].forEach(file => {
            selectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`)
        });
    } else {
        selectedDocs.textContent = '';
    }
})

const today = new Date().toISOString().split("T")[0];
document.querySelector("#fecha-limite").min = today;

// Funcionalidad para el desplegable de usuarios
const addUserBtn = document.getElementById('add-user-btn');
const userSearch = document.querySelector('.user-search');
const userList = document.querySelector('.user-list');
const tareasContainer = document.getElementById('tareas');
const userItems = document.querySelectorAll('.user-item');

addUserBtn.addEventListener('click', function () {
    userSearch.style.display = 'block';
    userList.classList.add('show');
    userSearch.focus();
});

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

// Añadir usuario a la lista
userItems.forEach(item => {
    item.addEventListener('click', function () {
        const userName = this.getAttribute('data-user');
        addUserToList(userName);
        userSearch.value = '';
        userSearch.style.display = 'none';
        userList.classList.remove('show');
    });
});

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

// Cerrar el desplegable al hacer clic fuera
document.addEventListener('click', function (e) {
    if (!e.target.closest('.user-dropdown')) {
        userSearch.style.display = 'none';
        userList.classList.remove('show');
    }
});

// Funcionalidad para el desplegable de cursos
const textArea = document.getElementById('textArea');
const cursosList = document.querySelector('.cursos-list');
const cursoItems = document.querySelectorAll('.curso-item');

// Mostrar/ocultar lista de cursos al hacer clic en el textarea
textArea.addEventListener('click', function () {
    cursosList.classList.toggle('show');
});

// Seleccionar curso
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

// Cerrar el desplegable al hacer clic fuera
document.addEventListener('click', function (e) {
    if (!e.target.closest('.objetivos-dropdown')) {
        cursosList.classList.remove('show');
    }
});

// Opcional: Permitir escribir manualmente además de seleccionar
textArea.addEventListener('focus', function () {
    this.removeAttribute('readonly');
});