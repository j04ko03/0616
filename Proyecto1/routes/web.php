<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', [SiteController::class, 'saludo'])->name('saludo.controller'); 
Route::get('/login', [SiteController::class, 'login'])->name('login.controller');


Route::get('/signup', [SiteController::class, 'signUp'])->name('signup.controller');
Route::post('/register', [SiteController::class, 'register'])->name('register.controller');
Route::get('/home', [SiteController::class, 'home'])->name('home.controller');
Route::get('/proyectos', [SiteController::class, 'proyectos'])->name('proyectos.controller');



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

Route::get('/project', [SiteController::class, 'project'])->name('project.controller');
