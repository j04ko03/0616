// POPUP FUNCTIONALITY
document.addEventListener('DOMContentLoaded', function() {
    const taskPopup = document.getElementById('taskPopup');
    const popupQuitBtn = document.getElementById('popupQuitBtn');
    const addTaskButtons = document.querySelectorAll('.add-task');
    const taskForm = document.getElementById('taskForm');
    const taskColumnInput = document.getElementById('taskColumn');

    // Abrir popup cuando se hace click en ADD TASK 
    if (addTaskButtons.length > 0) {
        addTaskButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const column = this.closest('.kanban-task-container').querySelector('h3').textContent;
                
                if (taskColumnInput) {
                    // Convertir nombre de columna a valor numérico
                    let estado = 0; // TO DO por defecto
                    if (column.includes('PROGRESS')) estado = 1;
                    if (column.includes('DONE')) estado = 2;
                    taskColumnInput.value = estado;
                }
                
                if (taskPopup) {
                    taskPopup.style.display = 'flex';
                    document.body.style.overflow = 'hidden'; // Prevenir scroll del body
                    
                    // Establecer fecha mínima como hoy
                    const today = new Date().toISOString().split("T")[0];
                    const fechaInput = document.getElementById('popup-fecha-limite');
                    if (fechaInput) {
                        fechaInput.min = today;
                        // Establecer fecha por defecto a 7 días desde hoy
                        const nextWeek = new Date();
                        nextWeek.setDate(nextWeek.getDate() + 7);
                        fechaInput.value = nextWeek.toISOString().split("T")[0];
                    }
                }
            });
        });
    }

    // Cerrar popup
    if (popupQuitBtn) {
        popupQuitBtn.addEventListener('click', closePopup);
    }

    // Cerrar popup al hacer click fuera del contenido
    if (taskPopup) {
        taskPopup.addEventListener('click', function(e) {
            if (e.target === taskPopup) {
                closePopup();
            }
        });
    }

    // Cerrar con ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && taskPopup.style.display === 'flex') {
            closePopup();
        }
    });

    function closePopup() {
        if (taskPopup) {
            taskPopup.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restaurar scroll
        }
        if (taskForm) {
            taskForm.reset();
        }
        const selectedDocs = document.getElementById('popup-selected-documents');
        if (selectedDocs) {
            selectedDocs.innerHTML = '';
        }
        const tareasContainer = document.getElementById('popup-tareas');
        if (tareasContainer) {
            tareasContainer.innerHTML = '';
        }
        const descripcion = document.getElementById('popup-descripcion');
        if (descripcion) {
            descripcion.value = '';
        }
        
        // Resetear dropdown de usuarios
        const userSearch = document.querySelector('.user-search');
        const userList = document.querySelector('.user-list');
        if (userSearch) userSearch.style.display = 'none';
        if (userList) userList.classList.remove('show');
    }

    // Funcionalidad de documentos
    const popupSelectedDocs = document.getElementById('popup-selected-documents');
    const popupDocInput = document.getElementById('popup-documento');

    if (popupDocInput && popupSelectedDocs) {
        popupDocInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                popupSelectedDocs.innerHTML = '<strong>Documentos seleccionados:</strong>';
                Array.from(e.target.files).forEach(file => {
                    const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB
                    popupSelectedDocs.insertAdjacentHTML("beforeend", 
                        `<li>${file.name} (${fileSize} MB)</li>`
                    );
                });
            } else {
                popupSelectedDocs.innerHTML = '';
            }
        });
    }

    // Funcionalidad para el desplegable de usuarios
    const popupAddUserBtn = document.getElementById('popup-add-user-btn');
    const popupUserSearch = document.querySelector('.user-search');
    const popupUserList = document.querySelector('.user-list');
    const popupTareasContainer = document.getElementById('popup-tareas');
    const popupUserItems = document.querySelectorAll('.user-item');

    if (popupAddUserBtn && popupUserSearch && popupUserList) {
        popupAddUserBtn.addEventListener('click', function() {
            const isVisible = popupUserSearch.style.display === 'block';
            popupUserSearch.style.display = isVisible ? 'none' : 'block';
            popupUserList.classList.toggle('show', !isVisible);
            
            if (!isVisible) {
                popupUserSearch.focus();
                // Mostrar todos los items al abrir
                popupUserItems.forEach(item => item.style.display = 'block');
            }
        });

        popupUserSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            popupUserItems.forEach(item => {
                const userName = item.getAttribute('data-user').toLowerCase();
                if (userName.includes(searchTerm) || searchTerm === '') {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    // Añadir usuario a la lista
    if (popupUserItems.length > 0 && popupTareasContainer) {
        popupUserItems.forEach(item => {
            item.addEventListener('click', function() {
                const userName = this.getAttribute('data-user');
                addUserToPopupList(userName);
                if (popupUserSearch) {
                    popupUserSearch.value = '';
                    popupUserSearch.style.display = 'none';
                }
                if (popupUserList) {
                    popupUserList.classList.remove('show');
                }
            });
        });
    }

    function addUserToPopupList(userName) {
        if (!popupTareasContainer) return;
        
        const existingUsers = Array.from(popupTareasContainer.querySelectorAll('.tarea .user-name'));
        const isUserAlreadyAdded = existingUsers.some(el => el.textContent === userName);
        
        if (!isUserAlreadyAdded) {
            const userElement = document.createElement('div');
            userElement.className = 'tarea';
            userElement.innerHTML = `
                <span class="user-name">${userName}</span>
                <button class="remove-user" type="button">×</button>
            `;
            popupTareasContainer.appendChild(userElement);
            
            userElement.querySelector('.remove-user').addEventListener('click', function() {
                userElement.remove();
            });
        }
    }

    // Cerrar el desplegable al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-dropdown') && 
            !e.target.classList.contains('user-search')) {
            if (popupUserSearch) {
                popupUserSearch.style.display = 'none';
            }
            if (popupUserList) {
                popupUserList.classList.remove('show');
            }
        }
    });

    // Manejar el envío del formulario
    if (taskForm) {
        taskForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validación básica
            const titulo = document.querySelector('.popup-title').value.trim();
            if (!titulo) {
                alert('Por favor, ingresa un título para la tarea');
                return;
            }

            // Recoger usuarios seleccionados
            const usuariosSeleccionados = Array.from(popupTareasContainer.querySelectorAll('.user-name'))
                .map(el => el.textContent);
            
            // Limpiar inputs de usuarios anteriores
            const existingUserInputs = taskForm.querySelectorAll('input[name="usuarios[]"]');
            existingUserInputs.forEach(input => input.remove());
            
            // Añadir usuarios al formulario
            usuariosSeleccionados.forEach(usuario => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'usuarios[]';
                input.value = usuario;
                taskForm.appendChild(input);
            });

            // Mostrar loading
            const submitBtn = taskForm.querySelector('.popup-submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Creando tarea...';
            submitBtn.disabled = true;

            // Enviar formulario
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    closePopup();
                    alert('Tarea creada exitosamente!');
                    // Recargar para ver los cambios
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    alert('Error: ' + (data.message || 'No se pudo crear la tarea'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor: ' + error.message);
            })
            .finally(() => {
                // Restaurar botón
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Prevenir envío con Enter en campos de texto
    const textInputs = taskForm.querySelectorAll('input[type="text"], textarea');
    textInputs.forEach(input => {
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
            }
        });
    });
});