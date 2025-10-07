<?php
<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="signup-box">
        <h2>Sign Up</h2>
        <form action="{{ route('register') }}" method="POST">
// Define a donde se van los datos y lo hace con el método POST, que es más seguro para las contraseñas.
            @csrf
// Protección contra ataques CSRF (Cross-Site Request Forgery). Es obligatorio en formularios de Laravel con el método de POST.
            
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="text" name="name" placeholder="Nombre usuario" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordarme en este dispositivo</label>
            </div>

            <div class="form-group">
                <a href="{{ route('login') }}">¿Ya tienes una cuenta? Iniciar sesión</a>
            </div>

            <button type="submit" class="signup-button">Crear cuenta</button>
        </form>
    </div>
</body>
</html>