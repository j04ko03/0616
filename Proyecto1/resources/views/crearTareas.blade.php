@extends('layouts.barraNavegacion')

@section('content')
    <div>
        <h1>Título Tarea</h1>
        <p>Indicar fecha límite</p>
        <input type="date" name="calendar" id="calendar">
        <textarea name="objetivoTarea" id="objetivoTarea" cols="30" rows="10" placeholder="Objetivo de la tarea..."></textarea>
        <h2>Presupuesto</h2>
        <input type="text" name="presupuesto" id="presupuesto" placeholder="... $">
        <button class="addUser">Añadir usuario</button>
        <ul>
            <li aria-placeholder="Pepa"></li>
            <li aria-placeholder="Juanjo"></li>
        </ul>

        <button class="addFiles">Añadir documentos💼</button>
        <button type="submit" class="addTask">Añadir tarea</button>
    </div>
@endsection
