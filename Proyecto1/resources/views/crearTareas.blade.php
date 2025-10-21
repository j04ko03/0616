@extends('layouts.barraNavegacion')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        :root {
            --color-primary: #83c427;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: "Lato", sans-serif;
        }

        body {
            background-color: #f4f5f7;
        }

        /*    CREAR PROYECTO CONTAINER    */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10px;
            box-sizing: border-box;
            height: 100%;
            width: 100%;
            font-family: "Zilla Slab", serif;
        }

        form {
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            height: auto;
            min-height: 450px;
            width: 100%;
            max-width: 900px;
            margin: 40px auto 0 auto;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        #quit-btn {
            position: absolute;
            right: 10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #000;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            font-size: .8rem;
            transition: all 400ms;
        }

        #quit-btn:hover {
            background-color: #313131;
        }

        form > div {
            box-sizing: border-box;
            margin-top: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr; /* Dos columnas iguales */
            height: 100%;
        }

        .left-column, .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .left-column {
            padding-right: 20px;
        }

        .right-column {
            padding-left: 20px;
        }

        form > div > div {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 100%;
        }

        .form-group label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        #titulo {
            background: #f9fafb;
            font-size: 2rem;
            font-weight: 600;
            border-bottom: 2px solid #83c427;
            transition: all 400ms;
        }

        #titulo:hover,
        #titulo:focus,
        #titulo:active {
            border: none;
            outline: none;
            box-shadow: none;
            border-bottom: 2px solid #83c427;
        }

        input, textarea {
            box-sizing: border-box;
            padding: 10px;
            transition: all 400ms;
        }

        input[type="number"],
        input[type="date"] {
            border: 2px solid transparent;
        }

        input[type="number"]:hover,
        input[type="number"]:active,
        input[type="number"]:focus,
        input[type="date"]:hover,
        input[type="date"]:active,
        input[type="date"]:focus {
            outline: none;
            box-shadow: none;
            border: 2px solid #83c427;
        }

        form button,
        input[type="submit"] {
            background: #83c427;
            border-radius: 7px;
            padding: 5px 15px;
            cursor: pointer;
            width: max-content;
            transition: all 400ms;
        }

        form button:hover,
        input[type="submit"]:hover {
            background-color: #b3eb65;
        }

        #tareas-container {
            margin-top: 20px;
        }

        #tareas {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 150px; /* Reducido de 300px */
            overflow-y: auto;
        }

        .tarea {
            color: #636363;
            font-size: .8rem;
            border: 1px solid #636363;
            border-radius: 5px;
            padding: 8px 12px;
            background-color: #ffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tarea .remove-user {
            background: none;
            border: none;
            color: #ff4444;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            padding: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tarea .remove-user:hover {
            color: #cc0000;
        }

        #add-documento:hover {
            background: #efefef;
        }

        #add-documento>input {
            opacity: 0;
            width: 20px;
            height: 20px;
        }

        #add-documento>span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 5px;
            font-size: .8rem;
            white-space: nowrap;
        }

        #add-documento img {
            width: 1.2rem;
        }

        #selected-documents {
            font-style: italic;
            color: #636363;
            margin-top: 10px;
            max-height: 200px;
            overflow: auto;
            list-style: inside;
        }

        #selected-documents>li {
            font-size: 1rem;
        }

        /* Estilos para el desplegable de usuarios */
        .user-dropdown {
            position: relative;
            margin-bottom: 20px;
        }

        .user-search {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .user-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 100;
            display: none;
        }

        .user-list.show {
            display: block;
        }

        .user-group {
            font-weight: bold;
            padding: 8px 12px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }

        .user-item {
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        .user-item:hover {
            background-color: #f0f0f0;
        }

        .submit-container {
            display: flex;
            justify-content: flex-start;
        }

        /* Estilos para el calendario */
        input[type="date"] {
            width: 100%;
            max-width: 200px;
        }

        /* ESTILOS PARA EL TEXTAREA CORREGIDO */
        #textArea {
            height: 200px;
            width: 100%; /* Cambiado de 300px a 100% */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            resize: none;
        }

        /* Mejorar el botón de añadir usuario */
        #add-user-btn {
            margin-top: 2px;
            display: flex;
            justify-content: flex-start;
        }

        #add-user-btn:hover {
            background-color: #b3eb65;
        }

        /* Nuevos estilos para la reorganización */
        .documents-section {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .containerAddUser_TextArea_AddTask{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        /* MEDIA QUERY CORREGIDA */
        @media (max-width: 600px) {
            main {
                padding: 0;
            }

            form {
                margin: 10px 0 0 0;
                border: 0;
                width: 100%;
                height: 100%;
            }

            form > div {
                grid-template-columns: 1fr;
            }
            
            .left-column {
                border-right: none;
                border-bottom: 1px solid #e0e0e0;
                padding-right: 0;
                padding-bottom: 20px;
            }
            
            .right-column {
                padding-left: 0;
                padding-top: 20px;
            }
            
            #textArea {
                height: 150px;
            }

            .submit-container {
                margin-top: 50px;
            }
        }

        /* Estilos para el desplegable de cursos */
        .objetivos-dropdown {
            position: relative;
            margin-bottom: 20px;
        }

        .cursos-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 100;
            display: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .cursos-list.show {
            display: block;
        }

        .curso-group {
            font-weight: bold;
            padding: 8px 12px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
            color: #83c427;
        }

        .curso-item {
            padding: 10px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .curso-item:hover {
            background-color: #f0f0f0;
            color: #83c427;
        }

        .curso-item:last-child {
            border-bottom: none;
        }

        /* Estilo para el textarea cuando tiene cursos seleccionados */
        #textArea.filled {
            background-color: #f9f9f9;
            border-color: #83c427;
        }

        #fecha-limite {
            margin-top: 20px;
        }

        #presupuesto {
            margin-top: 20px;
        }

        #fecha-limite #presupuesto {
            width: 500px;
        }

        #add-documento {
            box-sizing: border-box;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid #83c427;
            width: 100%;
            max-width: 250px;
            height: 1rem;
            padding: 20px;
            position: relative;
            transition: all 400ms;
            margin-top: 100px;
        }
    </style>
    <main>
        <form action="project" method="POST">
        @csrf
        <a id="quit-btn" href="http://localhost/0616/Proyecto1/public/home">X</a>
        <label for="titulo"></label>
        <input type="text" name="titulo" id="titulo" placeholder="TITULO TAREA..." required
            maxlength="100">
        <div>
            <!-- Columna izquierda -->
            <div class="left-column">
                <div class="form-group">
                    <label for="fecha-limite">Fecha límite</label>
                    <br>
                    <input type="date" name="fecha-limite" id="fecha-limite" required min="">
                </div>
                
                <div class="form-group">
                    <label for="presupuesto">Presupuesto</label>
                    <br>
                    <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€">
                </div>
                
                <div class="documents-section">
                    <label for="documento" id="add-documento">
                        <input type="file" name="documento" id="documento" multiple="true"
                                    accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .jpg, .jpeg, .png, .gif, .bmp">
                        <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                        </span>
                    </label>
                    <ul id="selected-documents"></ul>
                </div>
            </div>
            
            <!-- Columna derecha -->
            <div class="right-column">
                <div class="form-group">
                    <div class="user-dropdown">
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
                </div>
                
                <div class="form-group">
                    <div class="objetivos-dropdown">
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
                
                <div class="submit-container">
                    <input type="submit" value="Añadir tarea">
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