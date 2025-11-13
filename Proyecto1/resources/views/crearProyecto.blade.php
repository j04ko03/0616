@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/crearProyecto.css') }}">
@endpush

@section('content')

    <body>
        <main>

            <form action="{{ route('createProject.controller') }}" method="POST" id="project">
                @csrf
                <a id="cerrarCrearProyecto" href="proyectos">X</a>
                <label for="titulo"></label>
                <input type="text" name="titulo" id="titulo" placeholder="AÑADIR TÍTULO *" required maxlength="100">
                <div>
                    <div>
                        <label for="fecha-limite">Fecha límite *</label>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">

                        <label for="link">Link del proyecto</label>
                        <input type="url" name="link" id="link">

                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" maxlength="255">


                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="00.01">

                    </div>
                    <div>
                        <a href="{{ route('tareas.controller') }}">
                            <button type="button" id="add-tareas-btn">Añadir tarea</button>
                        </a>
                        <div id="tareas">
                        </div>
                        <input type="submit" value="Añadir proyecto" id="add-proyecto-btn">
                    </div>
                </div>
            </form>
        </main>
    </body>
    <script>
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
    <script src="{{ url('/js/recuperarTareaSinProyecto.js') }}"></script>
@endsection
