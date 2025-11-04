<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectosController;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('/login');}); // Ruta por defecto redirige a login si no está autenticado
    
        // Rutas dentro de la aplicación
    Route::get('/home', [SiteController::class, 'home'])->name('home.controller');
    Route::get('/proyectos', [SiteController::class, 'proyectos'])->name('proyectos.controller');
    Route::get('/crear-proyecto', [SiteController::class, 'crearProyecto'])->name('crearProyecto.controller');
    Route::get('/project/{idProyecto}', [SiteController::class, 'project'])->name('project.controller');
        // Rutas para crear tareas dentro de /project
        Route::get('/addTask', [SiteController::class, 'addTask'])->name('addTask.controller');
        Route::post('/addTask', [SiteController::class, 'storeTask'])->name('addTask.store'); 
    Route::get('/tareas', [SiteController::class, 'crearTareas'])->name('tareas.controller');
    Route::get('/perfil', [SiteController::class, 'perfil'])->name('perfil.controller');
    Route::resource('showProjects', ProyectosController::class); 
    Route::resource('tasks', TareaController::class);
    Route::get('/logout',[UsuarioController::class,'logout'])->name('logout.controller');

    // Ruta de recursos para usuarios (CRUD)
    Route::resource('usuarios', UsuarioController::class);   
});

Route::middleware(['auth', 'rol:0, 2'])->group(function () { // Implementación de la ruta del middleware de los roles según el tipoUser. Se permite el rol 0 y 2 que son de administrador y superusuario. 
    Route::resource('usuarios', UsuarioController::class);  
    Route::get('/vista-global', [SiteController::class, 'vistaGlobal'])->name('vistaGlobal.controller');
});

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


// Rutas para sign in y sign up
Route::get('/signup', [UsuarioController::class, 'create'])->name('signup.controller');
Route::get('/signin', [UsuarioController::class, 'signIn'])->name('signin.controller');

// Ruta del formulario
    // Crear cuenta
Route::post('/register', [UsuarioController::class, 'register'])->name('register.controller');
Route::post('/register', [UsuarioController::class, 'registerProcess'])->name('usuarios.register.process');
    // Iniciar sesion
Route::get('/login', [UsuarioController::class, 'login'])->name('login.controller');





