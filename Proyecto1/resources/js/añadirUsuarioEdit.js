document.addEventListener('DOMContentLoaded', function() {
    // -------------------- EDITAR GRUPO --------------------
    const addUserBtnEditar = document.getElementById('add-user-btn-editar');
    const userListEditar = document.getElementById('user-list-editar');
    const userSearchEditar = document.getElementById('user-search-editar');
    const usuariosSeleccionadosEditar = document.getElementById('usuarios-seleccionados-editar');
    const userItemsEditar = userListEditar.querySelectorAll('.user-item');

    // Mostrar/ocultar lista al hacer clic en el botón
    addUserBtnEditar.addEventListener('click', function() {
        userListEditar.classList.toggle('show');
        userSearchEditar.style.display = userListEditar.classList.contains('show') ? 'block' : 'none';
        
        if (userListEditar.classList.contains('show')) {
            userSearchEditar.focus();
        }
    });

    // Filtrar usuarios al escribir en el buscador
    userSearchEditar.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        userItemsEditar.forEach(item => {
            const userName = item.getAttribute('data-user').toLowerCase();
            item.style.display = userName.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Añadir usuario/grupo a la lista de seleccionados
    userItemsEditar.forEach(item => {
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
            const yaSeleccionado = Array.from(usuariosSeleccionadosEditar.children).some(
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

                usuariosSeleccionadosEditar.appendChild(usuarioDiv);

                // Añadir funcionalidad para eliminar
                usuarioDiv.querySelector('.remove-user').addEventListener('click', function() {
                    usuarioDiv.remove();
                });
            }

            // Ocultar lista después de seleccionar
            userListEditar.classList.remove('show');
            userSearchEditar.style.display = 'none';
            userSearchEditar.value = '';

            // Mostrar todos los items de nuevo
            userItemsEditar.forEach(i => i.style.display = 'block');
        });
    });

    // Ocultar lista al hacer clic fuera
    document.addEventListener('click', function(event) {
        if (!event.target.closest('#editarGrupoContainer .user-dropdown')) {
            userListEditar.classList.remove('show');
            userSearchEditar.style.display = 'none';
            userSearchEditar.value = '';
            userItemsEditar.forEach(i => i.style.display = 'block');
        }
    });
});