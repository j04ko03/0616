@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/crearProyecto.css') }}">
@endpush

@section('content')

    <body>
        <main>

            <form action="project" method="POST">
                <a id="quit-btn" href="proyectos">X</a>
                <label for="titulo"></label>
                <input type="text" name="titulo" id="titulo" placeholder="AÑADIR TÍTULO" required maxlength="100">
                <div>
                    <div>
                        <label for="fecha-limite">Fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">

                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="10">

                        <ul id="selected-documents"></ul>
                        <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento" multiple="true"
                                accept=".pdf, .doc, .docx, .odt, .rtf, .txt, .png, .jpg, .jpeg, .svg, .webp">
                            <p>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                            </p>
                        </label>
                    </div>
                    <div>
                        <a href="{{ route('tareas.controller') }}">
                            <button type="button" id="add-tareas-btn">Añadir tarea</button>
                        </a>
                        <div id="tareas">
                            <div class="tarea">TAREA <button class="remove-btn" type="button">X</button></div>
                            <div class="tarea">TAREA <button class="remove-btn" type="button">X</button></div>
                            <div class="tarea">TAREA <button class="remove-btn" type="button">X</button></div>
                            <div class="tarea">TAREA <button class="remove-btn" type="button">X</button></div>
                            <div class="tarea">TAREA <button class="remove-btn" type="button">X</button></div>
                        </div>
                        <input type="submit" value="Añadir proyecto" id="add-proyecto-btn">
                    </div>
                </div>
            </form>
        </main>
    </body>
    <script>
        const selectedDocs = document.querySelector("#selected-documents");
        const selectedDocsMsg = document.querySelector("#selected-documents-msg")
        const docInput = document.querySelector("#documento");

        docInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                [...e.target.files].forEach(file => {
                    selectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`)
                });
            }
        })

        const today = new Date().toISOString().split("T")[0];
        document.querySelector("#fecha-limite").min = today;



        const addTareasBtn = document.querySelector("#add-tareas-btn")
        const tareasContainer = document.querySelector("#tareas")
        const tarea = document.getElementsByClassName('tarea');

        tareasContainer.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-btn")) {
                e.target.closest(".tarea").remove();
            }
        })
    </script>
@endsection
