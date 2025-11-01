@extends('layouts.layoutPublic')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/css/signup-signin.css') }}">
@endpush

@section('content')
<div class="contenedor-signup">
    <div class="signup-box">
        <div class="contenedor-header">
        <img src="{{ url('/assets/logotipos/logoSinFondo.png') }}" alt="OrgaTime" class="logo">
        <h2>Sign Up</h2>
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

        <form action="{{ route('usuarios.register.process') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Mail</label>
                <input type="email"
                       name="email"
                       id="email"
                       placeholder="Tu correo electrónico"
                       value="{{ old('email') }}"
                       class="form-input"
                       required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre usuario</label>
                <input type="text"
                       name="nombre" 
                       id="nombre" 
                       placeholder="Tu nombre de usuario"
                       value="{{ old('nombre') }}" 
                       class="form-input"
                       required>
                @error('nombre') 
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group password-container">
                <label for="password" class="form-label">Contraseña</label>
                <div class="password-input-wrapper">
                    <input type="password"
                        name="password"
                        id="password"
                        placeholder="Crea una contraseña"
                        class="form-input password-input"
                        required>
                    <button type="button" class="password-toggle" id="passwordToggle">
                        <span class="eye-icon">🙈</span>
                    </button>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- CONFIRMACIÓN DESPLEGABLE -->
            <div class="form-group password-confirm-group password-container" id="passwordConfirmGroup">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <div class="password-input-wrapper">
                    <input type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Repite tu contraseña"
                        class="form-input password-input">
                    <button type="button" class="password-toggle" id="passwordConfirmToggle">
                        <span class="eye-icon">🙉</span>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <div class="toggle-container">
                    <div class="toggle">
                        <input type="checkbox" name="remember" id="rememberToggle">
                        <label for="rememberToggle"></label>
                    </div>
                    <span class="toggle-label">Recordarme en este dispositivo</span>
                </div>
            </div>

            <div class="form-footer">
                <p class="account-text">¿Ya tienes cuenta?</p>
                <a href="{{ route('signin.controller') }}" class="login-link">Iniciar sesión</a>
            </div>

            <button type="submit" class="btn-signup">Crear cuenta</button>
        </form>
    </div>
</div>
    <script src="{{ url('/js/contrasena.js') }}"></script>
@endsection