@extends('layouts.barraNavegacion')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

        :root {
            --color-primary: #83c427;
        }

        * {
            font-family: "Lato";
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f4f5f7;
        }

        main {
            padding: 20px;
        }

        /*  SELECT PROYECTOS    */

        select {
            padding: 10px;
            font-size: 1.5rem;
            min-width: max-content;
            width: 60%;
            max-width: 600px;
            background-color: #f4f5f7;
            border-radius: 10px;
            border: 1px solid black;
            cursor: pointer;
        }

        select,
        ::picker(select) {
            appearance: base-select;
        }

        select::picker-icon {
            font-size: 20px;
            rotate: 90deg;
            transition: all 400ms;
        }

        select:open::picker-icon {
            rotate: 0deg;
        }

        option {
            box-sizing: border-box;
            border-radius: 10px;
            padding: 8px;
            border: 1px solid black;
            margin: 10px;
            transition: all 400ms;
        }

        option:hover {
            background-color: #d9d9d9;
        }

        /*  PESTAÑA BOTONES     */
        #tab-container {
            width: fit-content;
            margin-top: 30px;
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
        }

        .tabs-btn {
            background-color: #f4f5f7;
            padding: 5px 20px;
            border: 0;
            border-bottom: 1px solid black;
            cursor: pointer;
            margin: 0;

            transition: all 400ms;
        }

        .tabs-btn:hover {
            background-color: #b3eb65;
            border-bottom: 1px solid #b3eb65;
        }

        .btn-active,
        .btn-active:hover {
            background-color: var(--color-primary);
            border-bottom: 1px solid var(--color-primary)
        }




        /*  KANBAN CONTAINER */
        .content-section-1,
        .content-section-2,
        .content-section-3 {
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .kanban-task-container {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .kanban-task-container h3 {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .kanban-task-container:first-child h3 {
            border-bottom: 10px solid #d42d20;
        }

        .kanban-task-container:nth-child(2) h3 {
            border-bottom: 10px solid #ffb900;

        }

        .kanban-task-container:nth-child(3) h3 {
            border-bottom: 10px solid #24b22e;
        }

        .task-container {
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 10px;
            padding: 10px;

            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .kanban-task-container:first-child>.task-container {
            box-shadow: #d42c2042 0px 3px 8px;
        }

        .kanban-task-container:nth-child(2)>.task-container {
            box-shadow: #ffb90042 0px 3px 8px;
        }

        .kanban-task-container:nth-child(3)>.task-container {
            box-shadow: #24b22e42 0px 3px 8px;
        }


        .task-container span:first-child {
            display: flex;
            justify-content: space-between;
        }

        .task-container>span:first-child>p {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .task-container>span:nth-child(4) {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: .75rem;
            color: #464646
        }

        .tags-container {
            display: flex;
            gap: 5px;
        }

        .tags {
            background-color: #d9d9d9;
            color: #464646;
            border-radius: 8px;
            font-size: .6rem;
            padding: 5px;
            width: max-content;
        }

        .add-task {
            background-color: #fff;
            text-align: center;
            width: 100%;
            border-radius: 10px;
            transition: all 400ms;
        }

        .kanban-task-container:first-child .add-task {
            color: #d42d20;
        }

        .kanban-task-container:first-child .add-task:hover {
            color: #f4f5f7;
            background-color: #d42d20
        }


        .kanban-task-container:nth-child(2) .add-task {
            color: #ffb900;

        }

        .kanban-task-container:nth-child(2) .add-task:hover {
            color: #f4f5f7;
            background-color: #ffb900
        }

        .kanban-task-container:nth-child(3) .add-task {
            color: #24b22e;
        }

        .kanban-task-container:nth-child(3) .add-task:hover {
            color: #f4f5f7;
            background-color: #24b22e;
        }

        /*  MEMBERS CONTAINER */
        .content-section-4 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
        }

        .member {
            min-width: 200px;
            display: grid;
            grid-template-columns: 100px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            position: relative;
        }

        .member>div:nth-child(2) {
            padding: 20px;
        }

        .member span:first-child {
            display: flex;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .member span:first-child>p {
            max-width: 80%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .member span:first-child>button {
            position: absolute;
            top: 15px;
            right: 10px;
        }

        .member p:last-child {
            font-size: .8rem;
            color: #464646;
        }

        .member img {
            scale: 1;
            width: 100%;
            border-radius: 100px;
            border: 1px solid black;
        }

        .pfp {
            box-sizing: border-box;
            padding: 10px;
        }

        .tabs-content {
            display: none;
        }

        .content-active {
            display: grid;
        }

        @media (width < 400px) {
            main {
                padding: 10px;
            }
        }
    </style>

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
            </div>
            <div>
                <div class="tabs-content content-section-1 content-active">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
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
                                consectetur adipiscing elit.
                            </p>
                            <span>
                                <p>Responsable</p>
                                <p>Fecha de entrega</p>
                            </span>
                        </div>
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                </div>
                <div class="tabs-content content-section-2">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
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
                                consectetur adipiscing elit.
                            </p>
                            <span>
                                <p>Responsable</p>
                                <p>Fecha de entrega</p>
                            </span>
                        </div>
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                </div>
                <div class="tabs-content content-section-3">
                    <div class="kanban-task-container">
                        <h3>TO DO</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>IN PROGRESS</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                                consectetur adipiscing elit.
                            </p>
                            <span>
                                <p>Responsable</p>
                                <p>Fecha de entrega</p>
                            </span>
                        </div>
                        <button class="add-task">+ ADD TASK</button>
                    </div>
                    <div class="kanban-task-container">
                        <h3>DONE</h3>
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <div class="task-container">
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
                        <button class="add-task">+ ADD TASK</button>
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
