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