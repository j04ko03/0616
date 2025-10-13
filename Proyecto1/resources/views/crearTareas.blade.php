@extends('layouts.barraNavegacion')

@section('content')
    <style>
        /* Contenedor principal */
        .crearTareas {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 20px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        h2 {
            font-size: 18px;
            margin: 20px 0 10px 0;
            color: #2c3e50;
        }

        /* Párrafos */
        p {
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Campos de formulario */
        input[type="date"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        /* Lista de usuarios */
        ul {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }

        li {
            padding: 8px 12px;
            margin-bottom: 8px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #e9ecef;
            position: relative;
        }

        li:after {
            content: "×";
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            color: #dc3545;
            cursor: pointer;
        }

        /* Botones */
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .addUser {
            background-color: #6c757d;
            color: white;
        }

        .addFiles {
            background-color: #17a2b8;
            color: white;
        }

        .addTask {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
        }

        /* Efectos hover para botones */
        button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            transition: all 0.2s;
        }

        /* Estilo para el placeholder del textarea */
        textarea::placeholder {
            color: #6c757d;
            font-style: italic;
        }
    </style>
    <div class="crearTareas">
        <h1>Título Tarea</h1>
        <p>Indicar fecha límite</p>
        <input type="date" name="calendar" id="calendar">
        <textarea name="objetivoTarea" id="objetivoTarea" cols="30" rows="10" placeholder="Objetivo de la tarea..."></textarea>
        <h2>Presupuesto</h2>
        <input type="text" name="presupuesto" id="presupuesto" placeholder="... $">
        <button class="addUser">Añadir usuario</button>
        <ul>
            <li placeholder="Pepa">Pepa</li>
            <li placeholder="Juanjo">Juanjo</li>
        </ul>

        <button class="addFiles">Añadir documentos💼</button>
        <button type="submit" class="addTask">Añadir tarea</button>
    </div>
@endsection
