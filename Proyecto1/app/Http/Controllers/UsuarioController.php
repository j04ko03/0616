<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Se encarga solo y unicamente de mostrar el formulario al usuario. NO PROCESA DATOS.
        return view('signUp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Procesa y guarda la informacion introducida por el usuario.
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'contraseña' => 'required|string|min:8|confirmed',
        ]);

        $createUsuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'contraseña' => bcrypt($validated['contraseña']),
            'tipoUser' => 1,
            'apodo' => null, // Ver de que pueda añadir su apodo despues (perfil).
            'fechaCreacion' => now(),
        ]);

        logger('Usuario creado:', $usuario->toArray());

    // Redirecciona después de guardar
    return redirect()->route('home.controller')->with('success', 'Usuario creado exitosamente!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
