@extends('layouts.barraNavegacion')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        :root {
            --color-primary: #83c427;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f4f5f7;
        }

        div,
        div,
        ul,
        li {
            font-size: 1rem;
        }

        /*    CREAR PROYECTO CONTAINER    */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10px;
            box-sizing: border-box;
            height: 100%;
            width: 100%;
        }

        form {
            box-sizing: border-box;
            padding: 20px;

            border: 1px solid black;
            border-radius: 10px;

            height: auto;
            min-height: 700px;
            width: 100%;
            max-width: 1200px;

            margin: 40px auto 40px auto;

            display: flex;
            flex-direction: column;
            font-family: "Lato";

            position: relative;
        }

        #quit-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #000000;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            font-size: .8rem;

            transition: all 400ms;
        }

        form>div {
            flex: 1;
            box-sizing: border-box;
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            height: 100%;
        }

        form>div>div {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 100%;
        }

        form>div input {
            margin-bottom: 40px;
        }

        #titulo {
            background: #f9fafb;
            font-size: 2rem;
            font-family: "Zilla Slab", serif;
            font-weight: 600;
            border-bottom: 2px solid #83c427;

            transition: all 400ms;
        }

        #titulo::selection {
            background: #83c427;
        }

        #titulo:hover,
        #titulo:focus,
        #titulo:active {
            border: none;
            outline: none;
            box-shadow: none;
            border-bottom: 2px solid #83c427;
        }

        input {
            box-sizing: border-box;
            padding: 10px;

            transition: all 400ms;
        }

        input[type="number"],
        input[type="date"] {
            border: 2px solid transparent;
            color: #9ca3af;
        }

        input[type="number"]:hover,
        input[type="number"]:active,
        input[type="number"]:focus,
        input[type="date"]:hover,
        input[type="date"]:active,
        input[type="date"]:focus {
            outline: none;
            box-shadow: none;
            border: 2px solid #83c427;
        }

        form button,
        input[type="submit"] {
            background: #83c427;
            border-radius: 7px;
            padding: 5px 15px;
            cursor: pointer;
            width: max-content;

            transition: all 400ms;
        }

        form button:hover,
        input[type="submit"]:hover {
            background-color: #b3eb65;
        }

        form>div>div:nth-child(2)>a {
            width: max-content;
        }

        #tareas {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            overflow: auto;
            max-height: 300px;
            height: 300px;
        }

        #tareas>p {
            color: #636363;
            font-style: italic;
        }

        .tarea {
            color: #636363;
            font-size: .8rem;
            border: 1px solid #636363;
            border-radius: 5px;
            background-color: #ffff;

            padding-left: 10px;
            height: 40px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remove-btn {
            background: #d42c2000;
            color: #636363;
            margin-left: auto;
            height: 100%;
            border-radius: 0 4px 4px 0;
            transition: all 400ms;
        }

        .remove-btn:hover,
        .remove-btn:focus {
            background: #d42c20;
            color: #ffffff;
        }

        #add-documento {
            box-sizing: border-box;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid #83c427;
            width: 50%;
            min-width: 170px;
            height: 1rem;
            padding: 20px;
            margin-top: auto;
            position: relative;

            transition: all 400ms;
        }

        #add-documento:hover {
            background: #efefef;
        }

        #add-documento>input {
            opacity: 0;
            width: 20px;
            height: 20px;
        }

        #add-documento>p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 5px;
            font-size: .8rem;

            white-space: nowrap;
        }

        #add-documento img {
            width: 1.2rem;
        }

        #selected-documents {
            font-style: italic;
            color: #636363;
            max-height: 200px;
            overflow: auto;

            list-style: inside;
        }

        #selected-documents-msg {
            font-style: italic;
            color: #636363;
        }

        #selected-documents>li {
            font-size: 1rem;
        }

        #add-proyecto-btn {
            margin: auto 0 0 auto;
            padding: 7px 25px;
        }


        @media (width < 600px) {
            main {
                padding: 0;
            }

            form {
                margin: 10px 0 0 0;
                border: 0;
                width: 100%;
                height: 100%;
            }

            form>div {
                grid-template-columns: 1fr;
            }

            #add-proyecto-btn {
                margin-top: 70px;
                margin-bottom: 0;
            }

            #selected-documents {
                height: 200px;
                margin-bottom: 20px;
            }
        }
    </style>

    <body>
        <main>

            <form action="project" method="POST">
                <a id="quit-btn" href="http://localhost/0616/Proyecto1/public/home">X</a>
                <label for="titulo"></label>
                <input type="text" name="titulo" id="titulo" placeholder="AÑADIR TÍTULO" required maxlength="100">
                <div>
                    <div>
                        <label for="fecha-limite">Fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite" required min="">

                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€" step="10">

                        <p id="selected-documents-msg">No se han añadido documentos</p>
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
                            <p id="add-tareas-msg"></p>
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
                selectedDocsMsg.textContent = 'Documentos:';
                [...e.target.files].forEach(file => {
                    selectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`)
                });
            } else {
                selectedDocsMsg.textContent = 'No se han añadido documentos'
            }
        })

        const today = new Date().toISOString().split("T")[0];
        document.querySelector("#fecha-limite").min = today;



        const addTareasBtn = document.querySelector("#add-tareas-btn")
        const tareasContainer = document.querySelector("#tareas")
        const addTareasMsg = document.querySelector("#add-tareas-msg")

        tareas.addEventListener("click", function(e) {
            const tarea = document.querySelectorAll('.tarea');

            if (tarea.length < 1) {
                console.log(tarea)
                addTareasMsg.textContent = 'No se han añadido documentos'
                return;
            }

            addTareasMsg.textContent = "";

            if (e.target.classList.contains("remove-btn")) {
                e.target.closest(".tarea").remove();

                if (document.querySelectorAll(".tarea").length < 1) {
                    addTareasMsg.textContent = "No se han añadido documentos";
                }
            }

        })
    </script>
@endsection
