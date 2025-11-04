@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/crearTareas.css') }}">
@endpush

@section('content')
    <main>
        <form action="project" method="POST">
        @csrf
            <a id="quit-btn" href="{{ route('home.controller') }}">X</a>
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
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="00.01">
                    </div>
                    
                    <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento" multiple="true"
                                accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                            <span>Añadir documentos <img src="{{ url('/storage/assets/icons/upload.svg') }}" alt="Upload button">
                            </span>
                        </label>
                    <ul id="selected-documents"></ul>
                </div>
                <div>               
                    <div>
                        <div id="textArea-objetivos">
                            <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea"></textarea>
                        </div>
                    </div>

                    <div>
                        <div class="user-dropdown">
                            <button type="button" id="add-user-btn">Añadir usuario</button>
                            <input type="text" class="user-search" placeholder="Buscar usuario...">
                            <div class="user-list">
                                <div class="user-group">Grupos</div>
                                <div class="user-item" data-user="Grupo 1" data-type="grupo">Grupo 1</div>
                                <div class="user-item" data-user="Grupo 2" data-type="grupo">Grupo 2</div>
                                <div class="user-group">Usuarios</div>
                                <div class="user-item" data-user="Pepa" data-type="usuario">Pepa</div>
                                <div class="user-item" data-user="Juanjo" data-type="usuario">Juanjo</div>
                                <div class="user-item" data-user="María" data-type="usuario">María</div>
                                <div class="user-item" data-user="Carlos" data-type="usuario">Carlos</div>
                            </div>
                        </div>
                        <div id="usuarios-seleccionados">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                        </div>

                        <input type="submit" value="Añadir tarea" id="add-task-btn">
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        // ✅ FUNCIONALIDAD PARA AÑADIR USUARIOS
        document.addEventListener('DOMContentLoaded', function() {
            const addUserBtn = document.getElementById('add-user-btn');
            const userList = document.querySelector('.user-list');
            const userSearch = document.querySelector('.user-search');
            const usuariosSeleccionados = document.getElementById('usuarios-seleccionados');
            const userItems = document.querySelectorAll('.user-item');

            // Mostrar/ocultar lista al hacer clic en el botón
            addUserBtn.addEventListener('click', function() {
                userList.classList.toggle('show');
                userSearch.style.display = userList.classList.contains('show') ? 'block' : 'none';
                
                if (userList.classList.contains('show')) {
                    userSearch.focus();
                }
            });

            // Filtrar usuarios al escribir en el buscador
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

            // Añadir usuario/grupo a la lista de seleccionados
            userItems.forEach(item => {
                item.addEventListener('click', function() {
                    const userName = this.getAttribute('data-user');
                    const userType = this.getAttribute('data-type');
                    
                    // Verificar si ya está seleccionado
                    const yaSeleccionado = Array.from(usuariosSeleccionados.children).some(
                        div => div.textContent.includes(userName)
                    );
                    
                    if (!yaSeleccionado) {
                        const usuarioDiv = document.createElement('div');
                        usuarioDiv.className = 'usuario-seleccionado';
                        usuarioDiv.innerHTML = `
                            <span>${userName} (${userType})</span>
                            <button type="button" class="remove-user">×</button>
                        `;
                        usuariosSeleccionados.appendChild(usuarioDiv);

                        // Añadir funcionalidad para eliminar
                        usuarioDiv.querySelector('.remove-user').addEventListener('click', function() {
                            usuarioDiv.remove();
                        });
                    }

                    // Ocultar lista después de seleccionar
                    userList.classList.remove('show');
                    userSearch.style.display = 'none';
                    userSearch.value = '';
                    
                    // Mostrar todos los items de nuevo
                    userItems.forEach(i => i.style.display = 'block');
                });
            });

            // Ocultar lista al hacer clic fuera
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.user-dropdown')) {
                    userList.classList.remove('show');
                    userSearch.style.display = 'none';
                    userSearch.value = '';
                    userItems.forEach(i => i.style.display = 'block');
                }
            });

            // Fecha mínima hoy
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha-limite').min = today;
        });
    </script>
@endsection