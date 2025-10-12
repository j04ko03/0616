@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
<div class="contenedor-signup">
    <div class="signup-box">
        <h2>Sign Up</h2>
        
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
                <label for="name" class="form-label">Nombre usuario</label>
                <input type="text"
                       name="name"
                       id="name"
                       placeholder="Tu nombre de usuario"
                       value="{{ old('name') }}"
                       class="form-input"
                       required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password"
                       name="password"
                       id="password"
                       placeholder="Crea una contraseña"
                       class="form-input"
                       required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       placeholder="Repite tu contraseña"
                       class="form-input"
                       required>
            </div>

            <div class="form-options">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="form-check-label">Recordarme en este dispositivo</label>
                </div>
            </div>

            <div class="form-footer">
                <p class="account-text">¿Ya tienes cuenta?</p>
                <a href="{{ route('register.controller') }}" class="login-link">Iniciar sesión</a>
            </div>

            <button type="submit" class="btn-signup">Crear cuenta</button>
        </form>
    </div>
</div>
@endsection