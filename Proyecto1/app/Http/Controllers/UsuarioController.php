<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller // Controlador para gestionar usuarios
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los usuarios (para la vista de admin).
        $usuarios = Usuario::all(); // Obtener todos los usuarios (all()).
        return view('usuarios.index', compact('usuarios')); // Pasar usuarios a la vista.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vista del formulario de registro.
        return view('signUp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Procesar registro.
    {

        // Se valida la entrada, se crea el usuario, se autentica y se redirige.

        // Registro de nuevo usuario.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Usuario',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Debug de los datos validados
        // dd('Datos validados:', $validated);

        // Crear usuario - solo los campos esenciales.
        $usuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'contraseña' => bcrypt($validated['password']),
            // tipoUser, apodo y fechaCreacion se asignan automáticamente.
        ]);

        // Debug de usuario creado (COMENTA esto cuando funcione)
        // dd('Usuario creado exitosamente:', $usuario->toArray());

        // Iniciar sesión automáticamente después del registro.
        Auth::login($usuario);

        return redirect()->route('home.controller')->with('success', '¡Cuenta creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario) // Mostrar perfil de usuario específico.
    {
        // Vista del perfil de usuario específico.
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        // Vista del formulario de edición de perfil
        return view('usuarios.edit', compact('usuario')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        // PROCESAR actualización de perfil.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Usuario,email,' . $usuario->id,
            'apodo' => 'nullable|string|max:255',
        ]);

        $usuario->update($validated);

        return redirect()->route('usuarios.show', $usuario)->with('success', 'Perfil actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        // Eliminar usuario.
        $usuario->delete();
        return redirect()->route('vistaGlobal.controller')->with('success', 'Cuenta eliminada exitosamente!');
    }

    // =============================================
    // MÉTODOS DE AUTENTICACIÓN
    // =============================================

    /**
     * Mostrar formulario de inicio de sesión.
     */
    public function signIn()
    {
        return view('signIn');
    }

    /**
     * Procesar inicio de sesión.
     */
    public function login(Request $request)
    {

        // Validar credenciales, intentar autenticar y redirigir.
        
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'contraseña' => 'required|string'
        ]);

        // $usuario = Usuario::where('email', $credentials['email'])->first(); // Buscar usuario por email.

        // Verificar contraseña y autenticar.
        if ($usuario && Hash::check($credentials['contraseña'], $usuario->contraseña)) {
            Auth::login($usuario, $request->remember);
            $request->session()->regenerate();
            return redirect()->route('home.controller')->with('success', '¡Bienvenid@ de nuevo!');
        }

        if ($usuario && Hash::check($request -> contraseña, $hashedValue))

        return back()->withErrors([
            'email' => 'Email incorrecto.', 
            'contraseña' => 'Contraseña incorrecta.',
        ]);
    }

    /**
     * Cerrar sesión.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin.controller');
    }

    /**
     * Mostrar formulario de registro (alias de create()).
     */
    public function register()
    {
        return $this->create();
    }

    /**
     * Procesar registro (alias de store())
     */
    public function registerProcess(Request $request)
    {
        return $this->store($request);
    }
}