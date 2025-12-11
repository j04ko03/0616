<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Proyectos;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Clases\Utilitat;
use Exception;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $queryProjects = Proyectos::query();
            $proyectos = $queryProjects->orderby('id')->get();
            return view('proyectos', compact('proyectos'));
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al cargar los proyectos - ' . $missatge);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:100',
                'fecha-limite' => 'required|date|after_or_equal:today',
                'descripcion' => 'nullable|string|max:255',
                'presupuesto' => 'nullable|numeric|min:0',
                'link' => 'nullable|url',
            ]);

            // 1. Crear el proyecto
            $project = Proyectos::create([
                'titulo' => $request->input('titulo'),
                'fechaCreacion' => now(),
                'fechaEntrega' => Carbon::parse($request->input('fecha-limite'))->startOfDay(),
                'estadoId' => 1,
                'isDeleted' => false,
                'descripcion' => $request->input('descripcion') ?? null,
                'presupuesto' => $request->input('presupuesto') ?? null,
                'linkProyecto' => $request->input('link') ?? null,
            ]);

            $project->usuarios()->attach(Auth::id(), attributes: ['rol' => 'Administrador']);

            // 2. Recuperar las tareas del input hidden
            $tareas = json_decode($request->input('tareas'), associative: true);

            // 3. Guardar cada tarea en la base de datos asociada al proyecto
            if ($tareas) {
                foreach ($tareas as $tareaData) {
                    // Crear tarea asociada al proyecto
                    $tarea = Tarea::create([
                        'titulo' => $tareaData['titulo'],
                        'descripcion' => $tareaData['descripcion'] ?? null,
                        'fechaEntrega' => $tareaData['fechaLimite'] ?? null,
                        'estadoId' => $tareaData['estado'] ?? 1,
                        'proyectoId' => $project->id,
                        'responsableId' => Auth::id(),
                        'isDeleted' => false,
                        'idSprint' => 2
                    ]);

                    //Asignar usuarios a la tarea (N:M)
                    if (isset($tareaData['usuarios']) && count($tareaData['usuarios']) > 0) {
                        $tarea->usuarios()->sync($tareaData['usuarios']); // IDs de usuarios
                    }
                }
            }

            // 4. Redirigir o retornar respuesta
            return redirect()->route('project.controller', ['idProyecto' => $project->id])->with('success', 'Proyecto y tareas creadas correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al crear el proyecto - ' . $missatge);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyectos $proyectos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyectos $proyecto)
    {
        try {
            $proyecto->titulo = $request->input("titulo");
            $proyecto->fechaEntrega = Carbon::parse($request->input('fecha-limite'))->startOfDay();
            $proyecto->linkProyecto = $request->input("link");
            $proyecto->descripcion = $request->input("descripcion");
            $proyecto->presupuesto = $request->input("presupuesto");
            $proyecto->estadoId = $request->input("estado");

            $proyecto->save();
            return redirect()->back()->with('success', 'Proyecto modificado correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al actualizar el proyecto - ' . $missatge);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyectos $proyecto)
    {
        try {
            $proyecto->isDeleted = true;
            $proyecto->save();

            return redirect()->route('home.controller')->with('success', 'Proyecto eliminado correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al eliminar el proyecto - ' . $missatge);
        }
    }

    public function addUser(Request $request, Proyectos $project)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:Usuario,email',
            ]);

            $userEmail = $request->input("email");
            $user = Usuario::where("email", $userEmail)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'Usuario no encontrado');
            }

            if (!$project->usuarios()->where('usuarioId', $user->id)->exists()) {
                $project->usuarios()->attach($user->id, ["rol" => "Miembro"]);
                return redirect()->back()->with("success", "Usuario añadido al proyecto");
            } else {
                return redirect()->back()->with('info', 'El usuario ya está en el proyecto');
            }
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al añadir usuario - ' . $missatge);
        }
    }

    //Funcion para guardar fotografias
    public function subirFotoPro(Request $request) {
        try {
            info('Archivo recibido:', ['foto' => $request->file('foto'), 'idProyecto' => $request->idProyecto]);

            if (!$request->hasFile('foto')) {
                return response()->json(['success' => false, 'mensaje' => 'No se recibió imagen']);
            }

            $foto = $request->file('foto');
            $idProyecto = $request->idProyecto;

            // Crear carpeta si no existe
            $path = storage_path('app/public/assets/fotosPro/');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $proyectoA = Proyectos::find($idProyecto);

            if (!$proyectoA) {
                return response()->json(['success' => false, 'mensaje' => 'Proyecto no encontrado']);
            }

            // Nombre único
            $nombreArchivo = 'foto_' . $proyectoA->nombre . $idProyecto . '.' . $foto->getClientOriginalExtension();

            // Guardar en storage/app/public/assets/fotosUser
            $foto->move($path, $nombreArchivo);

            //Guardar usuario update de foto
            $proyectoA->img = $nombreArchivo;
            $proyectoA->save();

            return response()->json([
                'success' => true,
                'ruta' => '/storage/assets/fotosPro/' . $nombreArchivo
            ]);
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return response()->json([
                'success' => false,
                'mensaje' => 'Error al subir la foto - ' . $missatge
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'mensaje' => 'Error al subir la foto: ' . $e->getMessage()
            ]);
        }
    }

    public function removeUser(Request $request, Proyectos $project) {
        try {
            $request->validate([
                'user_id_delete' => 'required|exists:Usuario,id'
            ]);

            $authUserRole = $project->usuarios()->where('usuarioId', Auth::id())->first();
            if (!$authUserRole || $authUserRole->pivot->rol !== 'Administrador') {
                return redirect()->back()->with('error', 'No tienes permisos para eliminar usuarios');
            }

            $userId = $request->user_id_delete;

            $project->usuarios()->detach($userId);

            return redirect()->back()->with('success', 'Usuario eliminado del proyecto correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al eliminar usuario - ' . $missatge);
        }
    }

    public function updateUserAdmin(Request $request, Proyectos $project) {
        try {
            $request->validate([
                'user_id_admin' => 'required|exists:Usuario,id'
            ]);

            $authUserRole = $project->usuarios()->where('usuarioId', Auth::id())->first();
            if (!$authUserRole || $authUserRole->pivot->rol !== 'Administrador') {
                return redirect()->back()->with('error', 'No tienes permisos para modificar roles de usuarios');
            }

            $userId = $request->user_id_admin;

            $userInProject = $project->usuarios()->where('usuarioId', $userId)->first();

            if ($userInProject->pivot->rol === 'Administrador') {
                return redirect()->back()->with('info', 'El usuario ya es administrador');
            }

            $project->usuarios()->updateExistingPivot($userId, [
                'rol' => 'Administrador'
            ]);

            return redirect()->back()->with('success', 'Usuario promovido a administrador correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al actualizar rol del usuario - ' . $missatge);
        }
    }

    public function addGroup(Request $request, Proyectos $project) {
        try {
            $request->validate([
                'group-name' => 'required|exists:Grupo,descripcion'
            ]);

            $authUserRole = $project->usuarios()->where('usuarioId', Auth::id())->first();
            if (!$authUserRole || $authUserRole->pivot->rol !== 'Administrador') {
                return redirect()->back()->with('error', 'No tienes permisos para añadir grupos');
            }

            $group = Grupo::where('descripcion', $request->input('group-name'))->first();

            if (!$group) {
                return redirect()->back()->with('error', 'Grupo no encontrado');
            }

            $users = $group->usuarios;

            if ($users->isEmpty()) {
                return redirect()->back()->with('info', 'El grupo no tiene miembros');
            }

            foreach($users as $user) {
                if (!$project->usuarios()->where('usuarioId', $user->id)->exists()) {
                    $project->usuarios()->syncWithoutDetaching([
                        $user->id => ['rol' => 'Miembro']
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Grupo añadido correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'Error al añadir grupo - ' . $missatge);
        }
    }
}
