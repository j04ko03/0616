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
            max-width: 900px;

            margin: 40px auto 0 auto;

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
            background-color: #000;
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

        #quit-btn:hover {
            background-color: #313131;
        }

        form>div {
            flex: 1;
            box-sizing: border-box;
            margin-top: 30px;
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

        #tareas .addUser{
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            overflow: auto;
            max-height: 300px;
        }

        .tarea {
            color: #636363;
            font-size: .8rem;
            border: 1px solid #636363;
            border-radius: 5px;
            padding: 5px;
            background-color: #ffff;
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

        #add-documento>span {
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

        input[type="submit"] {
            margin: auto 0 0 auto;
        }

        #selected-documents {
            font-style: italic;
            color: #636363;
            margin-top: 10px;
            max-height: 200px;
            overflow: auto;

            list-style: inside;
        }

        #selected-documents>li {
            font-size: 1rem;
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

            input[type="submit"] {
                margin-top: 50px;
            }
        }
    </style>
    <main>
        <form action="project" method="POST">
            <a id="quit-btn" href="http://localhost/0616/Proyecto1/public/home">X</a>
            <label for="titulo"></label>
            <input type="text" name="titulo" id="titulo" placeholder="TITULO TAREA..." required
                maxlength="100">
            <div>
                <div>
                    <label for="fecha-limite">Fecha límite</label>
                    <input type="date" name="fecha-limite" id="fecha-limite" required min="">

                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€">
                    
                    <label for="documento" id="add-documento">
                        <input type="file" name="documento" id="documento" multiple="true"
                                    accept=".pdf, .doc, .docx, .odt, .rtf, .txt">
                        <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                        </span>
                        </label>
                        <ul id="selected-documents">No se han añadido documentos</ul>
                </div>
                <div>
                    <textarea name="textArea" id="textArea" cols="30" rows="10" placeholder="Objetivos de la tarea..."></textarea>
                </div>
                <br>
                <div class="addUser">
                    <button type="button">Añadir usuario</button>
                    <div id="tareas">
                        <div class="tarea">Pepa</div>
                        <div class="tarea">Juanjo</div>
                    </div>
                    <input type="submit" value="Añadir tarea">
                </div>
            </div>
        </form>
    </main>
    </body>
    <script>
        const selectedDocs = document.querySelector("#selected-documents");
        const docInput = document.querySelector("#documento");
        docInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                selectedDocs.textContent = 'Documentos:';
                [...e.target.files].forEach(file => {
                    selectedDocs.insertAdjacentHTML("beforeend", `<li>${file.name}</li>`)
                });
            } else {
                selectedDocs.textContent = 'No se han añadido documentos'
            }
        })

        const today = new Date().toISOString().split("T")[0];
        console.log(new Date().toISOString())
        document.querySelector("#fecha-limite").min = today;
    </script>
@endsection
