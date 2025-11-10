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
                    const userId = this.getAttribute('data-id');

                    let tipoUsuario = "usuario";

                    switch(userType){
                        case "1":
                            tipoUsuario = "Super Usuario"
                            break;
                        case "2":
                            tipoUsuario = "Usuario normal"
                            break;
                        default:
                            tipoUsuario = "Usuario normal"
                            break;
                    }
                    
                    // Verificar si ya está seleccionado
                    const yaSeleccionado = Array.from(usuariosSeleccionados.children).some(
                        div => div.textContent.includes(userName)
                    );
                    
                    if (!yaSeleccionado) {
                        const usuarioDiv = document.createElement('div');
                        usuarioDiv.className = 'usuario-seleccionado';

                        usuarioDiv.dataset.id = userId;
                        usuarioDiv.dataset.name = userName;
                        usuarioDiv.dataset.tipo = userType;

                        usuarioDiv.innerHTML = `
                            <span>${userName} (${tipoUsuario})</span>
                            <button type="button" class="remove-user">×</button>
                        `;

                        // Crear input oculto
                        const inputHidden = document.createElement('input');
                        inputHidden.type = 'hidden';
                        inputHidden.name = 'usuarios[]';
                        inputHidden.value = userId;
                        inputHidden.className = 'input-usuario-hidden';

                        usuarioDiv.appendChild(inputHidden);

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
            const fechaInput = document.getElementById('fecha-limite');
            if (fechaInput) {
                fechaInput.min = today;
            }
        });