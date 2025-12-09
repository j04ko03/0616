<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

abstract class Controller
{
    //No hace falta comentar esto, pero crea el enlace en el servidor se tiene que probar
    public function crearLink()
    {
        $exitCode = Artisan::call('storage:link');
        $output = Artisan::output();

        if ($exitCode !== 0) {
            // El enlace no se creó, muestra error
            return response()->json([
                'error' => 'No se pudo crear el enlace storage',
                'details' => $output
            ], 500);
        }

        return view('auth.signIn');
    }
}
