<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
}