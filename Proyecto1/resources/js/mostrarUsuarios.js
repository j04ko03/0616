document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('taskPopup');
    const userListContainer = document.getElementById('user-list-container');
    
    document.querySelectorAll('.add-task').forEach(btn => {
        btn.addEventListener('click', function() {

            popup.style.display = 'flex'; // Mostrar popup
            
            
            cargarUsuarios(); // Cargar lista de usuarios
        });
    });
    
    // Función para cargar usuarios desde el controlador
    function cargarUsuarios() {
        userListContainer.innerHTML = '<div class="loading">Cargando usuarios...</div>';
        
        fetch('{{ route("usuarios.lista") }}')
            .then(response => response.json())
            .then(usuarios => {
                if (usuarios.length > 0) {
                    let html = '';
                    
                    // Agrupar por tipoUser si quieres
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
    
    document.getElementById('popupQuitBtn').addEventListener('click', function() {
        popup.style.display = 'none';
    });
});