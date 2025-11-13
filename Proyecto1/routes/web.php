<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\IncidenciaController;

// Rutas sin middleware/auth.
Route::get('/signup', [UsuarioController::class, 'create'])->name('signup.controller');
Route::get('/signin', [UsuarioController::class, 'signIn'])->name('signin.controller');
Route::post('/register', [UsuarioController::class, 'registerProcess'])->name('usuarios.register.process');
Route::get('/login', [UsuarioController::class, 'login'])->name('login.controller');

// Rutas con middleware/auth.
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('home.controller');
    });

    // Rutas de la web para todos los usuarios autenticados (0, 1, 2)
    Route::get('/home', [SiteController::class, 'home'])->name('home.controller');
    Route::get('/proyectos', [SiteController::class, 'proyectos'])->name('proyectos.controller');
    Route::get('/crear-proyecto', [SiteController::class, 'crearProyecto'])->name('crearProyecto.controller');
    Route::get('/project/{idProyecto}', [SiteController::class, 'project'])->name('project.controller');
    Route::get('/addTask', [SiteController::class, 'addTask'])->name('addTask.controller');
    Route::post('/addTask', [SiteController::class, 'storeTask'])->name('addTask.store');
    Route::resource('tareas', TareaController::class);
    Route::get('/tareas', [SiteController::class, 'crearTareas'])->name('tareas.controller');
    Route::get('/perfil', [SiteController::class, 'perfil'])->name('perfil.controller');
    Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout.controller');
    Route::get('/usuarios/lista', [UsuarioController::class, 'listaUsuarios'])->name('usuarios.lista');

    // CRUD de proyectos y tareas
    Route::resource('showProjects', ProyectosController::class);
    Route::resource('tasks', TareaController::class);
    Route::get('/logout',[UsuarioController::class,'logout'])->name('logout.controller');

    // Rutas para editar perfil.
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');

    
    Route::resource('solicitudes', SolicitudController::class);

    Route::resource('incidencias', IncidenciaController::class);
});

    // Rutas solo para rolç SuperAdministrador y Administrador (0, 1).
    Route::middleware(['auth', 'rol:0,1'])->group(function () {
    Route::get('/vista-global', [SiteController::class, 'vistaGlobal'])->name('vistaGlobal.controller');

    // Rutas de administración de usuarios (solo SuperAdministrador (0)).
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    // Ruta para hacer crud de grupos
    Route::post('/grupos', [GrupoController::class, 'store'])->name('grupos.store');
    Route::resource('grupos', GrupoController::class);

    Route::post('/solicitudes/{solicitude}', [SolicitudController::class, 'borrarSolicitudActualizarUser'])->name('solicitudes.borrarSolicitudActualizarUser');
});

//Carga de Scripts
Route::get('/js/{filename}', function ($filename) {
    $path = resource_path("js/$filename");

    try {
        if (! File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
        //console.log("Error al cargar el archivo: " . $e->getMessage() + "Error: " + $e->getCode());
    }

    return response()->file($path, [
        'Content-Type' => 'application/javascript',
    ]);
});

//Carga de Scripts
Route::get('/js/{filename}', function ($filename) {
    $path = resource_path("js/$filename");

    try {
        if (! File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
        //console.log("Error al cargar el archivo: " . $e->getMessage() + "Error: " + $e->getCode());
    }

    return response()->file($path, [
        'Content-Type' => 'application/javascript',
    ]);
});

//Cargas de CSS
Route::get('/css/{filename}', function ($filename) {
    $path = storage_path("assets/css/$filename");

    try {
        if (! File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'text/css',
    ]);
});

// Carga imagenes
Route::get('/assets/logotipos/{filename}', function ($filename) {
    $path = storage_path("assets/logotipos/$filename");

    try {
        if (! File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
    }

    $extension   = pathinfo($filename, PATHINFO_EXTENSION);
    $contentType = match ($extension) {
        'png'   => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        default => 'image/' . $extension
    };

    return response()->file($path, [
        'Content-Type' => $contentType,
    ]);
});

// Carga de iconos y otros assets
Route::get('/storage/assets/{type}/{filename}', function ($type, $filename) {
    $path = storage_path("assets/$type/$filename");

    try {
        if (! File::exists($path)) {
            abort(404);
        }
    } catch (\Exception $e) {
        abort(404);
    }

    $extension   = pathinfo($filename, PATHINFO_EXTENSION);
    $contentType = match ($extension) {
        'png'   => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'webp'  => 'image/webp',
        'ico'   => 'image/x-icon',
        default => 'image/' . $extension
    };

    return response()->file($path, [
        'Content-Type' => $contentType,
    ]);
});
