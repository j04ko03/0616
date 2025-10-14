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
            height: 95vh;
            background-color: #f4f5f7;
        }

        /*    CREAR PROYECTO CONTAINER    */
        main {
            box-sizing: border-box;
            display: grid;
            height: 100%;

            background: green
        }

        form {
            box-sizing: border-box;
            padding: 20px;

            border: 1px solid black;
            border-radius: 10px;

            height: auto;
            min-height: 80%;
            width: 100%;
            max-width: 800px;

            margin: auto;

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

        form>div>div {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        form>div {
            box-sizing: border-box;
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
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
            border-bottom: 2px solid #83c427;
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

        #add-documento {
            border: 1px solid black;
            background: red;
            width: 70%;
            position: relative;
        }

        #add-documento>input {
            opacity: 0;
            width: 20px;
            height: 20px;
        }

        #add-documento>span {
            background: yellow;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 5px;
            font-size: .8rem;
        }

        input[type="submit"] {
            margin: auto 0 0 auto;
        }

        @media (width < 600px) {
            form {
                margin: 10px;
            }

            form>div {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <main>

            <form action="/" method="POST">
                <button id="quit-btn">X</button>
                <label for="titulo"></label>
                <input type="text" name="titulo" id="titulo" placeholder="TITULO PROYECTO...">
                <div>
                    <div>
                        <label for="fecha-limite">Indica fecha límite</label>
                        <input type="date" name="fecha-limite" id="fecha-limite">

                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" placeholder="€€€">

                        <label for="documento" id="add-documento">
                            <input type="file" name="documento" id="documento">
                            <span>Añadir documentos <img src="../storage/assets/icons/upload.svg" alt="Upload button">
                            </span>
                        </label>
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
        </main>
    </body>
@endsection
