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
                    <option value="Proyecto 1">Proyecto 1</option>
                    <option value="Proyecto 2">Proyecto 2</option>
                    <option value="Proyecto 3">Proyecto 3</option>
                    <option value="Proyecto 4">Proyecto 4</option>
                </select>
            </div>
            <div type="button" id="boton">
                <a href="{{ route('component.popUpTareas') }}">Añadir tarea</a>
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
                            @for ($i = 0; $i < 3; $i++)
                                <x-taskItemProject />
                            @endfor
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
                </div>
                
                <div class="tabs-content content-section-4">
                    @for ($i = 0; $i < 5; $i++)
                        {{-- <x-memberItem /> --}}
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