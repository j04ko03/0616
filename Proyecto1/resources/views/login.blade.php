<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="#" method="post" id="login">
        <legend>Sign In</legend>
        <input type="text" name="email" id="email" placeholder="Usuario/email">
        <input type="text" name="password" id="password" placeholder="Contraseña">
        <button type="radio">Recordarme en este dispositivo</button>
        <p>¿No tienes cuenta?</p><a href="" target="_blank">Crear cuenta</a>
        <input type="button" value="Iniciar sesión" onclick="window.location.href='{{ route('home.controller') }}'">
    </form>
</body>

</html>