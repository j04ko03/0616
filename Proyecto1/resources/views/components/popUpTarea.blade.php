@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/popUpTarea.css') }}">
@endpush


<form action="{{ route('addTask.store') }}" method="POST">
    @csrf
<div class="popup-overlay" id="taskPopup" style="display: none;">
    <div class="popup-content">
        <form id="taskForm" method="POST" action="{{ route('tareas.store') }}" enctype="multipart/form-data">
            @csrf
            <button type="button" class="popup-quit-btn" id="popupQuitBtn">X</button>
            
            <input type="text" name="titulo" class="popup-title" placeholder="TITULO TAREA" required maxlength="100">
            
            <div class="popup-form-grid">
                <!-- Columna izquierda -->
                <div class="popup-left-column">
                    <div class="form-group">
                        <label for="popup-fecha-limite">Fecha límite</label>
                        <br>
                        <input type="date" name="fecha_limite" id="popup-fecha-limite" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="popup-presupuesto">Presupuesto</label>
                        <br>
                        <input type="number" name="presupuesto" id="popup-presupuesto" placeholder="€€€">
                    </div>
                    
                    <div class="documents-section">
                        <label for="popup-documento" id="popup-add-documento">
                            <input type="file" name="documentos[]" id="popup-documento" multiple
                                   accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .jpg, .jpeg, .png, .gif, .bmp">
                            <p>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                            </p>
                        </label>
                        <ul id="popup-selected-documents"></ul>
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="popup-right-column">
                    <div class="form-group">
                        <label for="popup-descripcion">Descripción</label>
                        <textarea name="descripcion" id="popup-descripcion" cols="30" rows="10" placeholder="Descripción de la tarea..."></textarea>
                    </div>

                        <div class="user-dropdown">
                            <div style="margin-bottom: 20px">
                                <label>Responsable:</label>
                                <span id="labelId" data-id="{{ auth()->user()->id }}">{{ auth()->user()->nombre }}</span>
                            </div>
                            <button type="button" id="add-user-btn">Añadir usuario</button>
                            <input type="text" class="user-search" placeholder="Buscar usuario...">
                            <div class="user-list">
                                <div class="user-group">Usuarios</div>
                                @foreach ($usuarios as $usuario)
                                    @if ($usuario->id != 1 && $usuario->id !== auth()->user()->id)
                                        <div class="user-item" data-user="{{ $usuario->nombre }}" data-id="{{ $usuario->id }}" data-type="{{ $usuario->tipoUser }}">{{ $usuario->nombre }}</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    
                    <div class="submit-container">
                        <input type="hidden" id="taskColumn" name="estado" value="0">
                        <input type="hidden" name="proyecto_id" value="1">
                        <button type="submit" class="popup-submit-btn">Añadir tarea</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ url('/js/mostarUsuarios.js') }}"></script>
<script src="{{ url('/js/mostarUsuarios.js') }}"></script>
<script src="{{ url('/js/abrirPopUpTarea.js') }}"></script>