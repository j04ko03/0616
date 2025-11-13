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
                <a href="{{ $proyecto->linkProyecto }}" target="_blank">{{ $proyecto->linkProyecto }}</a>
                @php
                    $user = Auth::user();
                    $userProject = $proyecto->usuarios->firstWhere('id', $user->id);
                @endphp
                @if ($user && $userProject->pivot->rol === 'Administrador')
                    <button id="update-project">Modificar proyecto</button>
                @endif
            </div>
            <div type="button" id="boton">
                <a href="#" onclick="document.getElementById('taskPopup').style.display = 'flex'">Añadir tarea</a>
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
                
                <div class="tabs-content content-section-2">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 8; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 6; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 10; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="tabs-content content-section-3">
                    <div class="kanban-task-container">
                        <h3 class="todo">TO DO</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 5; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3 class="progreso">IN PROGRESS</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 6; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                    <div class="kanban-task-container">
                        <h3 class="done">DONE</h3>
                        <div class="task-container">
                            @for ($i = 0; $i < 4; $i++)
                                <x-taskItemProject />
                            @endfor
                        </div>
                    </div>
                </form>
            </div>
            <div id="popup-delete-project-confirmation">
                <form action="{{ route('deleteProject.controller', $proyecto->id) }}" method="POST"
                    id="form-delete-project">
                    @method('patch')
                    @csrf
                    <p>¿Seguro que quiere eliminar este proyecto?</p>
                    <span>
                        <button type="button" id="cancel-delete-project-btn">No</button>
                        <input type="submit" value="Eliminar">
                    </span>
                </form>
            </div>
        @endif


    </body>

    @include('components.popUpTarea')

    <script src="{{ url('/js/popUpTarea.js') }}"></script>

    <script>
        // REDIRECT TO NEW URL WITH PROJECT ID
        document.getElementById("projects").addEventListener("change", function(e) {
            window.location = `${e.target.value}`
        })

        // NAVIGATION BETWEEN TABS
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

        // FILTER TASKS BY SPRINT
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

        // POP-UP UPDATE-DELETE PROJECT
        const popupUpdateProject = document.getElementById("popup-update-project");
        const updateProjectBtn = document.getElementById("update-project");
        const popupQuitBtn = document.getElementById("quit-btn");
        const formUpdateProject = document.getElementById("update-project-form");

        updateProjectBtn.addEventListener("click", function() {
            popupUpdateProject.style.display = "flex";
        })

        function quitPopup(e) {
            popupUpdateProject.style.display = "none";
        }
        popupQuitBtn.addEventListener("click", (e) => quitPopup(e));
        popupUpdateProject.addEventListener("click", (e) => quitPopup(e));

        formUpdateProject.addEventListener("click", (e) => {
            e.stopPropagation();
        })

        // POP-UP DELETE PROJECT CONFIRMATION
        const deleteProjectBtn = document.getElementById("delete-project");
        const popupDeleteProjectConfirmation = document.getElementById("popup-delete-project-confirmation");
        const formDeleteProjectConfirmation = document.getElementById("form-delete-project");
        const cancelDeleteProjectBtnConfirmation = document.getElementById("cancel-delete-project-btn");

        deleteProjectBtn.addEventListener("click", function() {
            popupDeleteProjectConfirmation.style.display = "flex";
        })

        cancelDeleteProjectBtnConfirmation.addEventListener("click", function(e) {
            popupDeleteProjectConfirmation.style.display = "none";
        })

        formDeleteProjectConfirmation.addEventListener("click", function(e) {
            e.stopPropagation()
        })
    </script>
@endsection
