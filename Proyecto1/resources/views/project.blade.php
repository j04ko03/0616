@extends('layouts.layoutPrivado')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/project.css') }}">
@endpush

@section('content')

    <body>
        <main>
            <div id="select-container">
                <select name="projects" id="projects">

                </select>
            </div>
            <div id="tab-container">
                <button class="tabs-btn btn-active" data-tab="1">Kanban</button>
                <button class="tabs-btn" data-tab="2">Product Backlog</button>
                <button class="tabs-btn" data-tab="3">Sprint Backlog</button>
                <button class="tabs-btn" data-tab="4">Integrantes</button>
                <select name="sprints" id="sprints">
                    <option value="sprint1">Sprint 1</option>
                    <option value="sprint2">Sprint 2</option>
                    <option value="sprint3">Sprint 3</option>
                    <option value="sprint4">Sprint 4</option>
                    <option value="sprint5">Sprint 5</option>
                </select>
            </div>
            <div>
                <div class="tabs-content content-section-1 content-active">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">

                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 2; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 4; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Las otras secciones (2, 3, 4) mantienen el mismo contenido pero con botones corregidos -->
                <div class="tabs-content content-section-2">
                    <!-- Contenido de Product Backlog (similar estructura pero con botones corregidos) -->
                    <div class="backlog">
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                    </div>
                </div>

                <div class="tabs-content content-section-3">
                    <div class="backlog">
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Nombre responsable</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                    </div>
                </div>

                <div class="tabs-content content-section-4">
                    @for ($i = 0; $i < 5; $i++)
                        <x-memberItem />
                    @endfor
                </div>
            </div>
        </main>
    </body>

    @component('components.popUpTarea')
    @endcomponent

    <script src="{{ url('/js/popUpTarea.js') }}"></script>

    <script>
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
    </script>
@endsection
