@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/signup-signin.css') }}">
@endpush

@section('content')
<div class="contenedor-signin">
    <!-- Logo arriba del todo y fuera del formulario -->
    <div class="signin-logo-top">
        <img src="{{ url('/assets/logotipos/logoSinFondo.png') }}" alt="OrgaTime" class="logo-top">
    </div>

    <div class="signin-box">
        <!-- Título dentro del formulario -->
        <div class="signin-header">
            <h2>Sign In</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.controller') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Usuario/Mail</label>
                <input type="text"
                       name="email"
                       id="email"
                       placeholder="Tu usuario o correo electrónico"
                       value="{{ old('email') }}"
                       class="form-input"
                       required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password"
                       name="password"
                       id="password"
                       placeholder="Tu contraseña"
                       class="form-input"
                       required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-options">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="form-check-label">Recordarme en este dispositivo</label>
                </div>
            </div>

            <div class="form-footer-signin">
                <p class="account-text">¿No tienes cuenta?</p>
                <a href="{{ route('signup.controller') }}" class="signup-link">Crear cuenta</a>
            </div>

            <div class="form-submit-container">
                <button type="submit" class="btn-signin">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ url('/js/controladorBarraNavegacion.js') }}"></script>
@endsection