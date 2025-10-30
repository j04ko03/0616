@push('styles')
    <link rel="stylesheet" href="{{ asset('css/addTask.css') }}">
@endpush

@section('content')

    <body>
        <main>
            <div id="select-container">
                <select name="projects" id="projects">
                    <option value="Proyecto 1">Proyecto 1</option>
                    <option value="Proyecto 2">Proyecto 2</option>
                    <option value="Proyecto 3">Proyecto 3</option>
                    <option value="Proyecto 4">Proyecto 4</option>
                </select>
            </div>
            <div id="tab-container">
                <button class="tabs-btn btn-active" data-tab="1">Kanban</button>
                <button class="tabs-btn" data-tab="2">Product Backlog</button>
                <button class="tabs-btn" data-tab="3">Sprint Backlog</button>
                <button class="tabs-btn" data-tab="4">Integrantes</button>
            </div>
            <div>
                <!-- Tus secciones de contenido existentes... -->
                <div class="tabs-content content-section-1 content-active">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
                            <!-- contenido de tarea existente -->
                        </div>
                        <button class="add-task" data-column="todo">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <button class="add-task" data-column="progress">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <button class="add-task" data-column="done">+ ADD TASK</button>
                    </div>
                </div>
                <!-- resto de tus secciones... -->
            </div>
        </main>

        <!-- POPUP PARA AÑADIR TAREA -->
        <div class="popup-overlay" id="taskPopup">
            <div class="popup-content">
                <button class="popup-quit-btn" id="popupQuitBtn">X</button>

                <form id="taskForm">
                    <input type="text" name="titulo" class="popup-title" placeholder="AÑADIR TÍTULO DE TAREA" required
                        maxlength="100">

                    <div class="popup-form-grid">
                        <div class="popup-form-column">
                            <label class="popup-label" for="fecha-limite">Fecha límite</label>
                            <input type="date" name="fecha-limite" class="popup-input popup-date-input" id="fecha-limite"
                                required>

                            <label class="popup-label" for="responsable">Responsable</label>
                            <input type="text" name="responsable" class="popup-input" id="responsable"
                                placeholder="Nombre del responsable">

                            <div class="popup-documents-container">
                                <label class="popup-label">Documentos</label>
                                <ul class="popup-selected-documents" id="popupSelectedDocuments"></ul>
                                <label class="popup-add-documento" id="popupAddDocumento">
                                    <input type="file" name="documento" id="popupDocumento" multiple="true"
                                        accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                                    <p>Añadir documentos</p>
                                </label>
                            </div>
                        </div>

                        <div class="popup-form-column">
                            <label class="popup-label">Etiquetas</label>
                            <div class="tags-container" id="popupTagsContainer">
                                <!-- Las etiquetas se añadirán aquí dinámicamente -->
                            </div>
                            <input type="text" class="popup-input" id="newTagInput"
                                placeholder="Añadir etiqueta (presiona Enter)">

                            <label class="popup-label">Descripción</label>
                            <textarea name="descripcion" class="popup-input" rows="4" placeholder="Descripción de la tarea..."></textarea>

                            <button type="button" class="popup-add-tarea-btn" id="popupAddSubtaskBtn">+ Añadir
                                subtarea</button>

                            <div class="popup-tareas-list" id="popupTareasList">
                                <!-- Las subtareas se añadirán aquí -->
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="taskColumn" name="column">
                    <button type="submit" class="popup-submit-btn">Crear Tarea</button>
                </form>
            </div>
        </div>
    </body>
@endsection
