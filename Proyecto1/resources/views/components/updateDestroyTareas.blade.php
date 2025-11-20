@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/crearTareas.css') }}">
@endpush

@section('content')
    <main>
        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <a id="quit-btn" href="{{ route('project.controller', ['idProyecto' => $tarea->proyectoId]) }}">X</a>
            
            <label for="titulo"></label>
            <input type="text" name="titulo" id="tituloTarea" placeholder="TITULO TAREA" required maxlength="100" 
                   value="{{ old('titulo', $tarea->titulo) }}">
            
            @error('titulo')
                <div class="error-message">{{ $message }}</div>
            @enderror
            
            <div>
                <div style="display: flex; flex-wrap: wrap;">
                    <div class="contenedorDesplegables">
                        <div class="bloqueIzquierda">
                            <div class="form-group">
                                <label for="fechaEntrega">Fecha límite</label>
                                <input type="date" name="fechaEntrega" id="fechaEntrega" required 
                                       value="{{ old('fechaEntrega', $tarea->fechaEntrega ? \Carbon\Carbon::parse($tarea->fechaEntrega)->format('Y-m-d') : '') }}"
                                       style="width: 100%">
                            </div>
                            @error('fechaEntrega')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" style="width: 100%">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" 
                                                {{ old('estado', $tarea->estadoId) == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('estado')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="bloqueDerecha">
                            <div class="form-group">
                                <label for="idSprint">Sprint:</label>
                                <select id="idSprint" name="idSprint" style="width: 100%">
                                    <option value="">Sin sprint</option>
                                    @foreach ($sprints as $sprint)
                                        <option value="{{ $sprint->id }}" 
                                                {{ old('idSprint', $tarea->idSprint) == $sprint->id ? 'selected' : '' }}>
                                            {{ $sprint->descripcion }}
                                        </option>    
                                    @endforeach
                                </select>
                            </div>
                            @error('idSprint')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="tags">Tags:</label>
                                <select id="tags" name="tags[]" multiple style="width: 100%">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" 
                                                {{ in_array($tag->id, $tarea->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
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
                </div>
                
                <div>
                    <div>
                        <div id="textArea-objetivos">
                            <label for="descripcion">Descripción de la tarea:</label>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="10" 
                                      placeholder="Descripción de la tarea">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                        </div>
                        @error('descripcion')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        {{-- <div class="user-dropdown">
                            <div style="margin-bottom: 20px">
                                <label>Responsable:</label>
                                <select name="responsableId" id="responsableId" style="width: 100%; margin-top: 5px;">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}" 
                                                {{ old('responsableId', $tarea->responsableId) == $usuario->id ? 'selected' : '' }}>
                                            {{ $usuario->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('responsableId')
                                <div class="error-message">{{ $message }}</div>
                            @enderror --}}

                            <div style="margin-bottom: 20px">
                                <label>Usuarios asignados:</label>
                                <select name="usuariosAsignados[]" id="usuariosAsignados" multiple style="width: 100%; margin-top: 5px;">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}" 
                                                {{ in_array($usuario->id, $tarea->usuarios->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $usuario->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('usuariosAsignados')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo oculto para proyectoId -->
                        <input type="hidden" name="proyectoId" value="{{ $tarea->proyectoId }}">
                        
                        <button type="submit" class="btn" id="updateTareaBtn">Actualizar Tarea</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("fechaEntrega").setAttribute("min", today);
        document.getElementById("fechaEntrega").value = today;
    </script>
    <script src="{{ url('/js/añadirUsuario.js') }}"></script>
    <script src="{{ url('/js/guardarTareaSinProyecto.js') }}"></script>
@endsection