@extends('layouts.barraNavegacion')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/signup-signin.css') }}">
@endpush

@section('content')
<div class="contenedor-signin">
    <!-- Logo arriba del todo y fuera del formulario -->
    <div class="signin-logo-top">
        <img src="{{ url('/assets/logotipos/logoLetraSinFondo.png') }}" alt="OrgaTime" class="logo-top">
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

        <form action="{{ route('login.controller') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text"
                       name="email"
                       id="email"
                       placeholder="Tu email"
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

            <div class="form-footer">
                <p class="account-text">¿No tienes cuenta?</p>
                <a href="{{ route('signup.controller') }}" class="login-link">Crear cuenta</a>
            </div>

            <button type="submit" class="btn-signup">Iniciar sesión</button>
        </form>
    </div>
</div>

<script src="{{ url('/js/controladorBarraNavegacion.js') }}"></script>
@endsection