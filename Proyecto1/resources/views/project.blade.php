@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url(path: '/css/styles.css') }}">
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
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                </div>
                <div class="tabs-content content-section-2">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                </div>
                <div class="tabs-content content-section-3">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>
                            <div class="task-card">
                                <span>
                                    <p>Título Tarea</p>
                                    <button class="button-task"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                    </button>
                                </span>
                                <span class="tags-container">
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                    <p class="tags">TAG</p>
                                </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                                <span>
                                    <p>Responsable</p>
                                    <p>Fecha de entrega</p>
                                </span>
                            </div>

                        </div>
                        <a href="tareas">
                            <button class="add-task">+ ADD TASK</button>
                        </a>
                    </div>
                </div>
                <div class="tabs-content content-section-4">
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                    <div class="member">
                        <div class="pfp">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                                alt="Profile picture">
                        </div>
                        <div>
                            <span>
                                <p>Nombre integrante</p>
                                <button class="button-task">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                            </span>
                            <p>Rol</p>
                            <p>correo@ejemplo.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
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
