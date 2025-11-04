@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url(path: '/css/crearTareas.css') }}">
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
                        <br>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">
                    </div>
                    
                    <div class="form-group">
                        <label for="presupuesto">Presupuesto</label>
                        <br>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="00.01">
                    </div>
                    
                    <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento" multiple="true"
                                accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                            <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
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
                        <div>
                            <button type="button" id="add-user-btn">Añadir usuario</button>
                            <input type="text" class="user-search" placeholder="Buscar usuario..." style="display: none;">
                            <div class="user-list">
                                <div class="user-group">Grupos</div>
                                <div class="user-item" data-user="Grupo 1">Grupo 1</div>
                                <div class="user-item" data-user="Grupo 2">Grupo 2</div>
                                <div class="user-group">Usuarios</div>
                                <div class="user-item" data-user="Pepa">Pepa</div>
                                <div class="user-item" data-user="Juanjo">Juanjo</div>
                                <div class="user-item" data-user="María">María</div>
                                <div class="user-item" data-user="Carlos">Carlos</div>
                            </div>
                        </div>
                        <div id="tareas">
                            <!-- Los usuarios añadidos aparecerán aquí -->
                        </div>

                        <input type="submit" value="Añadir tarea" id="add-task-btn">
                    </div>
                </div>
            </div>
    </form>
    </main>

    <script src="/js/tareas.js"></script>
@endsection
