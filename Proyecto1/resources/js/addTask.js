        // Tabs functionality (tu código existente)
        const btnContainer = document.querySelector("#tab-container");
        const tabsBtn = document.querySelectorAll(".tabs-btn");
        const tabsContent = document.querySelectorAll(".tabs-content");

        btnContainer.addEventListener("click", function(e) {
            const clicked = e.target.closest(".tabs-btn");
            if (!clicked) return;
            tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
            clicked.classList.add("btn-active");

            tabsContent.forEach((tab) => tab.classList.remove("content-active"));
            document
                .querySelector(`.content-section-${clicked.dataset.tab}`)
                .classList.add("content-active");
        });

        // POPUP FUNCTIONALITY
        const taskPopup = document.getElementById('taskPopup');
        const popupQuitBtn = document.getElementById('popupQuitBtn');
        const addTaskButtons = document.querySelectorAll('.add-task');
        const taskForm = document.getElementById('taskForm');
        const taskColumnInput = document.getElementById('taskColumn');

        // Abrir popup cuando se hace click en ADD TASK
        addTaskButtons.forEach(button => {
            button.addEventListener('click', function() {
                const column = this.getAttribute('data-column');
                taskColumnInput.value = column;
                taskPopup.classList.add('popup-active');
                
                // Establecer fecha mínima como hoy
                const today = new Date().toISOString().split("T")[0];
                document.getElementById('fecha-limite').min = today;
            });
        });

        // Cerrar popup
        popupQuitBtn.addEventListener('click', closePopup);

        // Cerrar popup al hacer click fuera del contenido
        taskPopup.addEventListener('click', function(e) {
            if (e.target === taskPopup) {
                closePopup();
            }
        });

        function closePopup() {
            taskPopup.classList.remove('popup-active');
            taskForm.reset();
            document.getElementById('popupSelectedDocuments').innerHTML = '';
            document.getElementById('popupTagsContainer').innerHTML = '';
            document.getElementById('popupTareasList').innerHTML = '';
        }

        // Manejar documentos (de tu código original)
        const popupDocInput = document.getElementById('popupDocumento');
        const popupSelectedDocs = document.getElementById('popupSelectedDocuments');

        popupDocInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                [...e.target.files].forEach(file => {
                    popupSelectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`);
                });
            }
        });

        // Manejar etiquetas
        const newTagInput = document.getElementById('newTagInput');
        const popupTagsContainer = document.getElementById('popupTagsContainer');

        newTagInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tagText = this.value.trim();
                if (tagText) {
                    popupTagsContainer.insertAdjacentHTML('beforeend', 
                        `<span class="tags">${tagText}</span>`
                    );
                    this.value = '';
                }
            }
        });

        // Manejar subtareas (de tu código original adaptado)
        const popupAddSubtaskBtn = document.getElementById('popupAddSubtaskBtn');
        const popupTareasList = document.getElementById('popupTareasList');

        popupAddSubtaskBtn.addEventListener('click', function() {
            const subtaskCount = popupTareasList.children.length + 1;
            popupTareasList.insertAdjacentHTML('beforeend',
                `<div class="popup-tarea">
                    Subtarea ${subtaskCount}
                    <button type="button" class="popup-remove-btn">X</button>
                </div>`
            );
        });

        // Eliminar subtareas
        popupTareasList.addEventListener('click', function(e) {
            if (e.target.classList.contains('popup-remove-btn')) {
                e.target.closest('.popup-tarea').remove();
            }
        });

        // Enviar formulario
        taskForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Aquí puedes procesar los datos del formulario
            const formData = new FormData(this);
            const column = taskColumnInput.value;
            
            console.log('Tarea creada para columna:', column);
            console.log('Datos del formulario:', Object.fromEntries(formData));
            
            // Cerrar popup después de enviar
            closePopup();
            
            // Aquí puedes añadir la lógica para añadir la tarea al tablero Kanban
            alert('Tarea creada exitosamente!');
        });