@extends('layouts.barraNavegacion')

@section('content')
    <style>

    </style>
    <main>
        <div id="create-project">
            <h1>Título proyecto</h1>
            <form>
                <div>
                    <label for="fecha-limite">Indica fecha límite</label>
                    <input type="date" name="fecha-limite" id="fecha-limite">

                    <label for="presupuesto">Presupuesto</label>
                    <input type="number" name="presupuesto" id="presupuesto">

                    <label for="documento">Añadir documento</label>
                    <input type="file" name="documento" id="documento">
                </div>
                <div>
                    <button>Añadir tarea</button>
                    <div id="tareas">
                        <div class="tarea"></div>
                    </div>
                    <input type="submit" value="Añadir proyecto">
                </div>
            </form>
        </div>
    </main>
@endsection
