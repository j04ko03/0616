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
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" @if ($project->id == $idProyecto) selected @endif>
                            {{ $project->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div id="tab-container">
                <button class="tabs-btn btn-active" data-tab="1">Kanban</button>
                <button class="tabs-btn" data-tab="2">Product Backlog</button>
                <button class="tabs-btn" data-tab="3">Sprint Backlog</button>
                <button class="tabs-btn" data-tab="4">Integrantes</button>
                <select name="sprints" id="sprints">
                    @foreach ($sprints as $sprint)
                        <option value="{{ $sprint->id }}" @if ($loop->index == 0) selected @endif>

                            {{ $sprint->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <div class="tabs-content content-section-1 content-active">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
                            @foreach ($proyecto->tareas as $tarea)
                                @php
                                    $asignados = $tarea->usuarios;
                                @endphp
                                @if ($tarea->estadoId == 1 && $tarea->usuarios->contains(Auth::user()->id))
                                    <x-taskItemProject :sprint="$tarea->idSprint" titulo="{{ $tarea->titulo }}"
                                        descripcion=" {{ $tarea->descripcion }}" :asignados="$tarea->usuarios" :tags="$tarea->tags"
                                        :responsable="$tarea->responsable->nombre" />
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            @foreach ($proyecto->tareas as $tarea)
                                @php
                                    $asignados = $tarea->usuarios;
                                @endphp
                                @if ($tarea->estadoId == 2 && $tarea->usuarios->contains(Auth::user()->id))
                                    <x-taskItemProject :sprint="$tarea->idSprint" titulo="{{ $tarea->titulo }}"
                                        descripcion=" {{ $tarea->descripcion }}" :asignados="$tarea->usuarios" :tags="$tarea->tags"
                                        :responsable="$tarea->responsable->nombre" />
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            @foreach ($proyecto->tareas as $tarea)
                                @php
                                    $asignados = $tarea->usuarios;
                                @endphp
                                @if ($tarea->estadoId == 2 && $tarea->usuarios->contains(Auth::user()->id))
                                    <x-taskItemProject :sprint="$tarea->idSprint" titulo="{{ $tarea->titulo }}"
                                        descripcion=" {{ $tarea->descripcion }}" :asignados="$tarea->usuarios" :tags="$tarea->tags"
                                        :responsable="$tarea->responsable->nombre" />
                                @endif
                            @endforeach
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
                            <span class="responsable-tarea">Responsable</span>
                            <span class="asignado-tarea">Asignado</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        @foreach ($proyecto->tareas as $tarea)
                            @php
                                $asignados = $tarea->usuarios;
                            @endphp
                            <x-backlogItem dataset="" :titulo="$tarea->titulo" class="" :descripcion="$tarea->descripcion"
                                :sprint="$tarea->sprint?->descripcion" :asignados="$tarea->usuarios" :estado="$tarea->estado->nombre" :tags="$tarea->tags"
                                :responsable="$tarea->responsable->nombre" />
                        @endforeach
                    </div>
                </div>

                <div class="tabs-content content-section-3">
                    <div class="backlog">
                        <div class="task-backlog">
                            <span class="titulo-tarea">Titulo</span>
                            <span class="descripcion-tarea">Descripcion</span>
                            <span class="sprint-tarea">Sprint</span>
                            <span class="tag-tarea">Tags</span>
                            <span class="responsable-tarea">Responsable</span>
                            <span class="responsable-tarea">Asignado</span>
                            <span class="estado-tarea">Estado</span>
                        </div>
                        @foreach ($proyecto->tareas as $tarea)
                            @php
                                $asignados = $tarea->usuarios;
                            @endphp

                            <x-backlogItem :dataset="$tarea->idSprint" :titulo="$tarea->titulo" class="sprint-backlog" :descripcion="$tarea->descripcion"
                                :sprint="$tarea->sprint?->descripcion" :asignados="$tarea->usuarios" :estado="$tarea->estado->nombre" :tags="$tarea->tags"
                                :responsable="$tarea->responsable->nombre" />
                        @endforeach
                    </div>
                </div>

                <div class="tabs-content content-section-4">
                    @foreach ($proyecto->usuarios as $usuario)
                        <x-memberItem nombre="{{ $usuario->nombre }}" email="{{ $usuario->email }}" />
                    @endforeach
                </div>
            </div>
        </main>
    </body>

    @component('components.popUpTarea')
    @endcomponent

    <script src="{{ url('/js/popUpTarea.js') }}"></script>

    <script>
        document.getElementById("projects").addEventListener("change", function(e) {
            window.location = `${e.target.value}`
        })

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

        const sprintDropdown = document.getElementById("sprints");
        const tasksKanban = document.querySelectorAll(".task-card");
        const tasksBacklog = document.querySelectorAll(".sprint-backlog");
        const kanbanContainer = document.querySelector(".content-section-1");

        sprintDropdown.addEventListener("change", function() {
            filterTasks(tasksKanban);
            filterTasks(tasksBacklog);
        })
        window.addEventListener("load", function() {
            filterTasks(tasksKanban);
            filterTasks(tasksBacklog);
        })

        function filterTasks(tasks) {
            tasks.forEach(task => {
                if (sprintDropdown.value !== task.dataset.sprint) {
                    task.classList.add("filter-sprint");
                } else {
                    task.classList.remove("filter-sprint");
                }
            })
        }
    </script>
@endsection
