@extends('layouts.barraNavegacion')

@section('content')
    <style>
        .botonCrearProyecto {
            color: black;
            background-color: #83C427;
            margin-top: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        .card {
            position: relative;
            margin: 1% 5%;
            width: 350px;
            height: 300px;
            border-radius: 15px;
            border: 2px solid black;
            background-color: #D9D9D9;
        }

        .card>img {
            display: block;
            margin-left: 50px;
            margin-top: 20px;
            width: 230px;
            height: 150px;
            background-color: white;
            border-radius: 10px;
        }

        .titleCard {
            padding: 1%;
            text-align: center;
        }

        .textCard {
            font-size: 1.1em;
            text-align: center;
        }
    </style>
    <h1>Lista de proyectos</h1>
    <button class="botonCrearProyecto">Crear nuevo proyecto</button>
    <div class="container">
        @for ($i = 1; $i <= 26; $i++)
            <div class="card">
                <img src="" alt="foto">
                <h2 class="titleCard"><strong>Proyecto X</strong></h2>
                <p class="textCard">
                    Tareas pendientes: 28
                </p>
                <p class="textCard">
                    Tareas pendientes: 17
                </p>
                <p class="textCard">
                    Tareas pendientes: 11
                </p>
            </div>
        @endfor
    </div>
@endsection
