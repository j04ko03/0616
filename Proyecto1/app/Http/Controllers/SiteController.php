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
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 1],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 2],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 0],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 1],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 2],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 0],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 2],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 0],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 2]
        ];

        $proyectosTotal=[
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 1],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 0],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 1],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 2],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 0],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 1],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 2],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 0],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 2],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 2],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 1]
        ];
        return view('homePage', compact('proyectosRecientes', 'proyectosTotal'));
    }
}