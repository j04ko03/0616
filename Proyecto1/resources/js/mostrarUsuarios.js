/**
 * Carga dinámica de lista de usuarios mediante AJAX.
 * 
 * Carga la lista de usuarios desde el servidor cuando se abre el popup
 * de crear tarea. Los usuarios se agrupan por tipo (Administradores y Usuarios normales).
 * 
 * @author Joaqu�n <joaquinmscollo@gmail.com>
 */

document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('taskPopup');
    const userListContainer = document.getElementById('user-list-container');

    /**
     * Mostrar popup y cargar usuarios al hacer click en añadir tarea.
     */
    document.querySelectorAll('.add-task').forEach(btn => {
        btn.addEventListener('click', function () {

            popup.style.display = 'flex'; // Mostrar popup


            cargarUsuarios(); // Cargar lista de usuarios
        });
    });

    /**
     * Cargar usuarios desde el controlador mediante fetch.
     * Agrupa usuarios por tipo: Administradores (tipoUser 1) y Usuarios normales (tipoUser 2).
     */
    function cargarUsuarios() {
        userListContainer.innerHTML = '<div class="loading">Cargando usuarios...</div>';

        fetch('{{ route("usuarios.lista") }}')
            .then(response => response.json())
            .then(usuarios => {
                if (usuarios.length > 0) {
                    let html = '';

                    // Agrupar por tipoUser
                    const administradores = usuarios.filter(u => u.tipoUser == 1);
                    const usuariosNormales = usuarios.filter(u => u.tipoUser == 2);

                    if (administradores.length > 0) {
                        html += '<div class="user-group">Administradores</div>';
                        administradores.forEach(usuario => {
                            html += `<div class="user-item" data-user-id="${usuario.id}">
                                        ${usuario.nombre} (${usuario.email})
                                    </div>`;
                        });
                    }

                    if (usuariosNormales.length > 0) {
                        html += '<div class="user-group">Usuarios</div>';
                        usuariosNormales.forEach(usuario => {
                            html += `<div class="user-item" data-user-id="${usuario.id}">
                                        ${usuario.nombre} (${usuario.email})
                                    </div>`;
                        });
                    }

                    userListContainer.innerHTML = html;
                } else {
                    userListContainer.innerHTML = '<div class="no-users">No hay usuarios disponibles</div>';
                }
            })
            .catch(error => {
                console.error('Error cargando usuarios:', error);
                userListContainer.innerHTML = '<div class="error">Error al cargar usuarios</div>';
            });
    }

    /**
     * Cerrar popup al hacer click en el botón de cerrar.
     */
    document.getElementById('popupQuitBtn').addEventListener('click', function () {
        popup.style.display = 'none';
    });
});