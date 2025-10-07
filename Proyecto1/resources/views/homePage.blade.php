<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div style="height: 100%">
        <div class="contenedorNavBar">

        </div>
        <div class="fondo">
            <div style= "border: 1px solid black; width: 300px; height: 100px; text-align: center; margin: auto; margin-top: 20%; padding-top: 5%;">
                <h2>HOME PAGE</h2>
                <a href="{{ route('saludo.controller') }}">Saludo</a><br>
                <a href="{{ route('login.controller') }}">Login</a>
            </div>
        </div>
    </div>
</body>
</html>