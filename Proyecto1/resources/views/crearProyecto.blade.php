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
            height: 100%;
            background-color: #f4f5f7;
        }

        /*    CREAR PROYECTO CONTAINER    */
        main {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            height: 100%;
        }

        form {
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            margin: 20px;
            margin-top: 70px;
            min-width: 60%;
            max-width: 800px;
            height: auto;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            font-family: "Lato";
        }

        form>div {
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        #titulo {
            background: #f9fafb;
            font-size: 2rem;
            font-family: "Zilla Slab", serif;
            font-weight: 600;
        }

        form>div {
            border: 1px solid black;
            display: grid;
            grid-template-columns: repeat(2, 1fr)
        }

        input {
            box-sizing: border-box;
            padding: 10px;

        }

        input[type="number"]:hover,
        input[type="number"]:focus {
            outline: 2px solid #83c427;
        }

        form button,
        input[type="submit"] {
            background: #83c427;
            border: 1px solid black;
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

        .tarea {
            margin: 5px 0;
            border: 1px solid black;
            border-radius: 5px;
            padding: 5px;
            background-color: #ffff;
        }

        input[type="submit"] {
            margin: auto 0 0 auto;
        }
    </style>
    <main>
        <div id="create-project">
            <form action="/" method="POST">
                <label for="titulo"></label>
                <input type="text" name="titulo" id="titulo" placeholder="TITULO PROYECTO">
                <div>
                    <div>
                        <label for="fecha-limite">Indica fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite">

                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€">

                        <label for="documento">Añadir documento</label>
                        <input type="file" name="documento" id="documento">
                    </div>
                    <div>
                        <button>Añadir tarea</button>
                        <div id="tareas">
                            <div class="tarea">TAREA</div>
                            <div class="tarea">TAREA</div>
                            <div class="tarea">TAREA</div>
                        </div>
                        <input type="submit" value="Añadir proyecto">
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
