@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url(path: '/css/crearTareas.css') }}">
@endpush

@section('content')
    <main>
        <form action="project" method="POST">
            <a id="quit-btn" href="http://localhost/0616/Proyecto1/public/home">X</a>
            <label for="titulo"></label>
            <input type="text" name="titulo" id="titulo" placeholder="TITULO TAREA..." required
                maxlength="100">
            <div>
                <div>
                    <div>
                        <label for="fecha-limite">Fecha límite</label>
                        <br>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">
                    </div>
                    
                    <div class="form-group">
                        <label for="presupuesto">Presupuesto</label>
                        <br>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="10">
                    </div>
                    
                    <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento" multiple="true"
                                accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                            <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                            </span>
                        </label>
                    <ul id="selected-documents"></ul>
                </div>
                <div>               
                    <div>
                        <div id="textArea-objetivos">
                            <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea. Haz clic para seleccionar cursos..." readonly></textarea>
                            <div class="cursos-list">
                                <div class="curso-group">Cursos Disponibles</div>
                                <div class="curso-item" data-curso="Matemáticas Avanzadas">Matemáticas Avanzadas</div>
                                <div class="curso-item" data-curso="Programación Web">Programación Web</div>
                                <div class="curso-item" data-curso="Diseño Gráfico">Diseño Gráfico</div>
                                <div class="curso-item" data-curso="Inglés Técnico">Inglés Técnico</div>
                                <div class="curso-item" data-curso="Gestión de Proyectos">Gestión de Proyectos</div>
                                <div class="curso-item" data-curso="Base de Datos">Base de Datos</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="button" id="add-user-btn">Añadir usuario</button>
                            <input type="text" class="user-search" placeholder="Buscar usuario..." style="display: none;">
                            <div class="user-list">
                                <div class="user-group">Grupos</div>
                                <div class="user-item" data-user="Grupo 1">Grupo 1</div>
                                <div class="user-item" data-user="Grupo 2">Grupo 2</div>
                                <div class="user-group">Usuarios</div>
                                <div class="user-item" data-user="Pepa">Pepa</div>
                                <div class="user-item" data-user="Juanjo">Juanjo</div>
                                <div class="user-item" data-user="María">María</div>
                                <div class="user-item" data-user="Carlos">Carlos</div>
                            </div>
                        </div>
                        <div id="tareas">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                        </div>
                        
                        <input type="submit" value="Añadir tarea" id="add-task-btn">
                    </div>
                </div>
            </div>
    </form>
    </main>

    <script>
        const selectedDocs = document.querySelector("#selected-documents");
        const docInput = document.querySelector("#documento");
        docInput.addEventListener('change', function(e) {
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

        addUserBtn.addEventListener('click', function() {
            userSearch.style.display = 'block';
            userList.classList.add('show');
            userSearch.focus();
        });

        userSearch.addEventListener('input', function() {
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
            item.addEventListener('click', function() {
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
                userElement.querySelector('.remove-user').addEventListener('click', function() {
                    userElement.remove();
                });
            }
        }

        // Cerrar el desplegable al hacer clic fuera
        document.addEventListener('click', function(e) {
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
        textArea.addEventListener('click', function() {
            cursosList.classList.toggle('show');
        });

        // Seleccionar curso
        cursoItems.forEach(item => {
            item.addEventListener('click', function() {
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
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.objetivos-dropdown')) {
                cursosList.classList.remove('show');
            }
        });

        // Opcional: Permitir escribir manualmente además de seleccionar
        textArea.addEventListener('focus', function() {
            this.removeAttribute('readonly');
        });
    </script>
@endsection
