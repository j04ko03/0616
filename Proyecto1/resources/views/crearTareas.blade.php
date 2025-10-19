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
            font-family: "Lato", sans-serif;
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
        }

        form {
            box-sizing: border-box;
            padding: 20px;

            border: 1px solid black;
            border-radius: 10px;

            height: auto;
            min-height: 700px;
            width: 100%;
            max-width: 900px;

            margin: 40px auto 0 auto;

            display: flex;
            flex-direction: column;
            font-family: "Lato", sans-serif;

            position: relative;
        }

        #quit-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #000;
            color: #fff;
            font-size: 24px;
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

        form>div {
            flex: 1;
            box-sizing: border-box;
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            height: 100%;
        }

        form>div>div {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 100%;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        #titulo {
            background: #f9fafb;
            font-size: 2rem;
            font-family: "Zilla Slab", serif;
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
            padding: 10px 20px;
            cursor: pointer;
            width: max-content;
            border: none;
            color: white;
            font-weight: bold;

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
            overflow: auto;
            max-height: 300px;
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
            margin-top: 10px;

            transition: all 400ms;
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
            justify-content: flex-end;
            margin-top: 20px;
        }

        /* Estilos para el calendario */
        input[type="date"] {
            width: 100%;
            max-width: 200px;
        }

        /* Estilos para el textarea de objetivos */
        #textArea {
            width: 100%;
            min-height: 150px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            resize: vertical;
        }

        @media (width < 600px) {
            main {
                padding: 0;
            }

            form {
                margin: 10px 0 0 0;
                border: 0;
                width: 100%;
                height: 100%;
            }

            form>div {
                grid-template-columns: 1fr;
            }

            .submit-container {
                margin-top: 50px;
            }
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
                <div>
                    <div class="form-group">
                        <label for="fecha-limite">Fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">
                    </div>
                    
                    <div class="form-group">
                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€">
                    </div>
                    
                    <label for="documento" id="add-documento">
                        <input type="file" name="documento" id="documento" multiple="true"
                                    accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .jpg, .jpeg, .png, .gif, .bmp">
                        <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                        </span>
                    </label>
                    <ul id="selected-documents"></ul>
                </div>
                <div>
                    <div class="form-group">
                        <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea..."></textarea>
                    </div>
                    
                    <div id="tareas-container">
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
                </div>
            </div>
            <div class="submit-container">
                <input type="submit" value="Añadir tarea">
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
    </script>
@endsection