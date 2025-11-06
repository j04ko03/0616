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
            <input type="text" name="titulo" id="titulo" placeholder="TITULO TAREA..." required
                maxlength="100">
            <div>
                <div>
                    <div>
                        <label for="fecha-limite">Fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">
                    </div>
                    
                    <div class="form-group">
                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="00.01">
                    </div>
                    
                    <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento" multiple="true"
                                accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                            <span>Añadir documentos <img src="{{ url('/storage/assets/icons/upload.svg') }}" alt="Upload button">
                            </span>
                        </label>
                    <ul id="selected-documents"></ul>
                </div>
                <div>               
                    <div>
                        <div id="textArea-objetivos">
                            <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea"></textarea>
                        </div>
                    </div>

                    <div>
                        <div class="user-dropdown">
                            <button type="button" id="add-user-btn">Añadir usuario</button>
                            <input type="text" class="user-search" placeholder="Buscar usuario...">
                            <div class="user-list">
                                {{-- <div class="user-group">Grupos</div>
                                <div class="user-item" data-user="Grupo 1" data-type="grupo">Grupo 1</div>
                                <div class="user-item" data-user="Grupo 2" data-type="grupo">Grupo 2</div> --}}
                                <div class="user-group">Usuarios</div>
                                <div class="user-item" data-user="Pepa" data-type="usuario">Pepa</div>
                                <div class="user-item" data-user="Juanjo" data-type="usuario">Juanjo</div>
                                <div class="user-item" data-user="María" data-type="usuario">María</div>
                                <div class="user-item" data-user="Carlos" data-type="usuario">Carlos</div>
                            </div>
                        </div>
                        <div id="usuarios-seleccionados">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                        </div>

                        <input type="submit" value="Añadir tarea" id="add-task-btn">
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="{{ url('/js/añadirUsuario.js') }}"></script>
@endsection