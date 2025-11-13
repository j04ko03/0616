@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/crearTareas.css') }}">
@endpush

@section('content')
    <main>
        <form action="project" method="POST">
            @csrf
            <a id="quit-btn" href="{{ route('home.controller') }}">X</a>
            <label for="titulo"></label>
            <input type="text" name="tituloTarea" id="tituloTarea" placeholder="TITULO TAREA" required maxlength="100">
            
            <div>
                <div style="display: flex; flex-wrap: wrap;">
                    <div class="contenedorDesplegables">
                        <div class="bloqueIzquierda">
                            <div class="form-group">
                                <label for="fecha-limite">Fecha límite</label>
                                <input type="date" name="fechaEntrega" id="fechaEntrega" required min=""
                                    style="width: 100%">
                            </div>

                            <div class="form-group">
                                <label for="presupuesto">Presupuesto</label>
                                <input type="number" name="presupuesto" id="presupuesto" placeholder="00.00€" step="00.01">
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" style="width: 100%">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="bloqueDerecha">
                                <div class="form-group">
                                    <label for="sprint">Sprint:</label>
                                    <select id="sprint" name="sprint" style="width: 100%">
                                        @foreach ($sprints as $sprint)
                                            <option value="{{ $sprint->id }}">{{ $sprint->descripcion }}</option>    
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag">Tags:</label>
                                    <select id="tag" name="tag" style="width: 100%">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                    </div>
                    <!--TODO ALMACENAR FICHEROS OPCIONAL BACKLOG-->
                    <!--<label for="documento" id="add-documento">
                                <input type="file" name="documento" id="documento" multiple="true"
                                    accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                                <span>Añadir documentos <img src="{{ url('/storage/assets/icons/upload.svg') }}" alt="Upload button">
                                </span>
                        </label>-->

                    <!--<ul id="selected-documents"></ul>-->
                </div>
                <div>
                    <div>
                        <div id="textArea-objetivos">
                            <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea"></textarea>
                        </div>
                    </div>

                    <div>
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
                        <div id="usuarios-seleccionados">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                        </div>
                        
                        <button id="addTareaFantasma">Añadir</button>
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
