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
        return view('homePage');
    }
}