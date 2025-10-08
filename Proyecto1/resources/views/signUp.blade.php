@extends('layouts.barraNavegacion')

@section('content')
<div class="contenedor-signup">
    <div class="signup-box">
        <h2>Sign Up</h2>
        <form action="{{ route('register.controller') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <input type="text"
                       name="name"
                       placeholder="Text"
                       value="{{ old('name') }}"
                       required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input type="email"
                       name="email"
                       placeholder="Nombre usuario"
                       value="{{ old('email') }}"
                       required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password"
                       name="password"
                       placeholder="Contraseña"
                       required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password"
                       name="password_confirmation"
                       placeholder="Confirmar contraseña"
                       required>
            </div>

            <div class="form-check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordarme en este dispositivo</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordarme en este dispositivo</label>
            </div>            

            <button type="submit" class="btn-signup">Crear cuenta</button>
        </form>
    </div>
</div>
@endsection