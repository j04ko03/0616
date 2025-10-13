<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para sign in y sign up
Route::get('/signup', [SiteController::class, 'signUp'])->name('signup.controller');
Route::get('/signin', [SiteController::class, 'signIn'])->name('signin.controller');

// Ruta del formulario
Route::post('/register', [SiteController::class, 'register'])->name('register.controller');

// Rutas dentro de la aplicación
Route::get('/home', [SiteController::class, 'home'])->name('home.controller');
Route::get('/proyectos', [SiteController::class, 'proyectos'])->name('proyectos.controller');
Route::get('/project', [SiteController::class, 'project'])->name('project.controller');
Route::get('/tareas', [SiteController::class, 'crearTareas'])->name('tareas.controller');


//Carga de Scripts
Route::get('/js/{filename}', function ($filename) {
    $path = resource_path("js/$filename");

    try{
        if (!File::exists($path)) {
        abort(404);
    }
    }catch (\Exception $e){
        abort(404);
        //console.log("Error al cargar el archivo: " . $e->getMessage() + "Error: " + $e->getCode());
    }
   
    return response()->file($path, [
        'Content-Type' => 'application/javascript'
    ]);
});

//Cargas de CSS
Route::get('/css/{filename}', function ($filename) {
    $path = storage_path("assets/css/$filename");

    try {
        if (!File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
    }
   
    return response()->file($path, [
        'Content-Type' => 'text/css'
    ]);
});


// Carga imagenes
Route::get('/assets/logotipos/{filename}', function ($filename) {
    $path = storage_path("assets/logotipos/$filename");
    
    try {
        if (!File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
    }

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $contentType = match($extension) {
        'png' => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp',
        default => 'image/' . $extension
    };
   
    return response()->file($path, [
        'Content-Type' => $contentType
    ]);
});


