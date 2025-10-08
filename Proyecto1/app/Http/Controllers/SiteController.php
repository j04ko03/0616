<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



//Se usan los nombres de los archivos blade.php tal como están en resources/views
class SiteController extends Controller
{
    public function saludo()
    {
        return view('saludoPrueba');
    }
    public function login()
    {
        return view('login');
    }
    public function home()
    {
        //Carga de base de datos a objetos
        $proyectosRecientes = [
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba'],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1'],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2'],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3'],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4'],
        ];

        $proyectosTotal=[
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba'],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1'],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2'],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3'],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4'],
            
        ];
        return view('homePage', compact('proyectosRecientes', 'proyectosTotal'));
    }
    public function signUp()
    {
        return view('signUp');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('home.controller')->with('success', 'Registration successful. Please log in.');
    }
}