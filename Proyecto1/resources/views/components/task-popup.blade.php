@props([
    'proyecto',
    'tarea' => null,
])

@php
    $isEdit = $tarea !== null;
    $action = $isEdit 
        ? route('tareas.update', $tarea->id) 
        : route('tareas.store');
    $method = $isEdit ? 'PUT' : 'POST';
    
    // Obtener todos los usuarios del proyecto
    $usuarios = $proyecto->usuarios;
    
    // Obtener todos los estados, sprints y tags disponibles
    $estados = \App\Models\Estado::all();
    $sprints = $sprints ?? $proyecto->sprints;
    $tags = \App\Models\Tag::all();
@endphp

<div id="taskPopup" class="popup-bg-task" style="display: {{ $isEdit ? 'flex' : 'none' }};">
    <form action="{{ $action }}" method="POST" id="task-form" class="task-popup-form">
        @method($method)
        @csrf
        
        <button type="button" id="quit-task-btn" class="quit-btn">X</button>
        
        <input type="text" 
               name="titulo" 
               id="titulo-tarea" 
               placeholder="TÍTULO TAREA *" 
               value="{{ old('titulo', $tarea?->titulo) }}" 
               required 
               maxlength="100">
        
        @error('titulo')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="task-form-container">
            <div class="task-form-grid">
                <!-- Columna Izquierda -->
                <div class="task-form-column">
                    <div class="form-group-task">
                        <label for="fechaEntrega">Fecha límite *</label>
                        <input type="date" 
                               name="fechaEntrega" 
                               id="fechaEntrega" 
                               value="{{ old('fechaEntrega', $tarea?->fechaEntrega ? \Carbon\Carbon::parse($tarea->fechaEntrega)->format('Y-m-d') : '') }}" 
                               required>
                    </div>
                    @error('fechaEntrega')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="form-group-task">
                        <label for="estado">Estado *</label>
                        <select name="estado" id="estado" required>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}" 
                                        {{ old('estado', $tarea?->estadoId ?? 1) == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('estado')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Columna Derecha -->
                <div class="task-form-column">
                    <div class="form-group-task">
                        <label for="idSprint">Sprint</label>
                        <select name="idSprint" id="idSprint">
                            <option value="">Sin sprint</option>
                            @foreach ($sprints as $sprint)
                                @if ($sprint->descripcion !== 'No Sprint')
                                    <option value="{{ $sprint->id }}" 
                                            {{ old('idSprint', $tarea?->idSprint) == $sprint->id ? 'selected' : '' }}>
                                        {{ $sprint->descripcion }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('idSprint')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="form-group-task">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" 
                                        {{ $tarea && in_array($tag->id, $tarea->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $tag->descripcion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('tags')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Descripción -->
            <div class="form-group-task form-group-full">
                <label for="descripcion">Descripción de la tarea</label>
                <textarea name="descripcion" 
                          id="descripcion" 
                          rows="4" 
                          placeholder="Describe la tarea...">{{ old('descripcion', $tarea?->descripcion) }}</textarea>
            </div>
            @error('descripcion')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <!-- Responsable y Asignados -->
            <div class="form-group-task">
                <label for="responsableId">Responsable *</label>
                @if($isEdit)
                    <input type="text" 
                           value="{{ $tarea->responsable->nombre }}" 
                           readonly 
                           class="readonly-field">
                    <input type="hidden" name="responsableId" value="{{ $tarea->responsableId }}">
                @else
                    <input type="text" 
                           value="{{ Auth::user()->nombre }}" 
                           readonly 
                           class="readonly-field">
                    <input type="hidden" name="responsableId" value="{{ Auth::id() }}">
                @endif
            </div>

            <div class="form-group-task">
                <label for="usuariosAsignados">Usuarios asignados</label>
                <select name="usuariosAsignados[]" id="usuariosAsignados" multiple>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" 
                                {{ $tarea && in_array($usuario->id, $tarea->usuarios->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $usuario->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('usuariosAsignados')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <!-- Campo oculto para proyectoId -->
            <input type="hidden" name="proyectoId" value="{{ $proyecto->id }}">

            <!-- Botones de acción -->
            <div class="task-form-actions">
                @if($isEdit)
                    <button type="button" id="delete-task-btn" class="btn-delete-task">
                        Eliminar tarea
                    </button>
                @endif
                <button type="submit" class="btn-submit-task">
                    {{ $isEdit ? 'Actualizar tarea' : 'Crear tarea' }}
                </button>
            </div>
        </div>
    </form>

    <!-- Confirmación de eliminación -->
    @if($isEdit)
    <form action="{{ route('tareas.destroy', $tarea->id) }}" 
          method="POST" 
          id="form-delete-task" 
          class="task-delete-confirmation">
        @method('DELETE')
        @csrf
        <p>¿Seguro que quieres eliminar esta tarea?</p>
        <span>
            <button type="button" id="cancel-delete-task-btn">No</button>
            <input type="submit" value="Eliminar">
        </span>
    </form>
    @endif
</div>