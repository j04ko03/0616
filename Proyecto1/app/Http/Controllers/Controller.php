<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

abstract class Controller
{
    //
    public function crearLink()
    {
        $exitCode = Artisan::call('storage:link');

        $output = Artisan::output();

        /*return response()->json([
            'exit_code' => $exitCode,
            'output' => $output
        ]);*/
        return view('auth.signIn');
    }
}
