<?php

namespace App\Http\Controllers;
/**
 * Controlador para la gestión de proyectos.
 * 
 * Maneja el CRUD completo de proyectos y funcionalidades adicionales:
 * - Creación de proyectos con tareas asociadas
 * - Gestión de usuarios del proyecto (añadir, eliminar, promover a admin)
 * - Gestión de grupos de usuarios
 * - Subida de fotografías del proyecto
 * - Eliminación lógica (soft delete con isDeleted)
 * 
 * @package App\Http\Controllers
 */

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
     * Listar todos los proyectos del sistema.
     * 
     * Obtiene todos los proyectos ordenados por ID y los pasa a la vista.
     * Maneja errores de base de datos.
     * 
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse Vista con todos los proyectos o redirección en caso de error
     * @author Joaqu?n <joaquinmscollo@gmail.com>
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
     * Mostrar el formulario para crear un nuevo proyecto.
     * 
     * Método vacío, actualmente no implementado.
     * 
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function create()
    {
        //
    }

    /**
     * Crear y guardar un nuevo proyecto con tareas asociadas.
     * 
     * Valida los datos, crea el proyecto, asigna al usuario actual como
     * administrador, y crea todas las tareas asociadas desde el input
     * hidden 'tareas' (JSON). Cada tarea puede tener usuarios asignados.
     * 
     * @param Request $request Datos del proyecto (titulo, fecha-limite, descripcion, presupuesto, link) y tareas en JSON
     * @return \Illuminate\Http\RedirectResponse Redirección al proyecto creado con mensaje de éxito o error
     * @author Joaqu?n <joaquinmscollo@gmail.com>
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
                        'idSprint' => $tareaData['idSprint']
                    ]);

                    // Asignar usuarios a la tarea (N:M)
                    if (isset($tareaData['usuariosAsignados']) && count($tareaData['usuariosAsignados']) > 0) {
                        // Extraer solo los IDs de los usuarios
                        $usuariosIds = array_map(function ($usuario) {
                            return $usuario['id'];
                        }, $tareaData['usuariosAsignados']);

                        // Añadir cada usuario al proyecto si no existe ya
                        foreach ($usuariosIds as $usuarioId) {
                            // Verificar si el usuario ya está en el proyecto
                            if (!$project->usuarios()->where('usuarioId', $usuarioId)->exists()) {
                                // Añadir usuario al proyecto como Miembro
                                $project->usuarios()->attach($usuarioId, ['rol' => 'Miembro']);
                            }
                        }

                        // Asignar usuarios a la tarea
                        $tarea->usuarios()->sync($usuariosIds);
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
     * Mostrar un proyecto específico.
     * 
     * Método vacío, actualmente no implementado.
     * 
     * @param Proyectos $proyectos Instancia del proyecto a mostrar
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Mostrar el formulario para editar un proyecto existente.
     * 
     * Método vacío, actualmente no implementado.
     * 
     * @param Proyectos $proyectos Instancia del proyecto a editar
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function edit(Proyectos $proyectos)
    {
        //
    }

    /**
     * Actualizar un proyecto existente en la base de datos.
     * 
     * Actualiza los campos del proyecto: título, fecha límite, link,
     * descripción, presupuesto y estado.
     * 
     * @param Request $request Datos actualizados del proyecto
     * @param Proyectos $proyecto Instancia del proyecto a actualizar
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito o error
     * @author Joaqu?n <joaquinmscollo@gmail.com>
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
     * Realizar eliminación lógica de un proyecto.
     * 
     * En lugar de eliminar el proyecto, marca el campo isDeleted como true
     * para mantener el registro en la base de datos (soft delete).
     * 
     * @param Proyectos $proyecto Instancia del proyecto a eliminar
     * @return \Illuminate\Http\RedirectResponse Redirección al home con mensaje de éxito o error
     * @author Joaqu?n <joaquinmscollo@gmail.com>
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

    /**
     * Añadir un usuario al proyecto mediante su email.
     * 
     * Valida el email, busca el usuario y lo añade al proyecto con rol
     * "Miembro". Verifica que el usuario no esté ya en el proyecto.
     * 
     * @param Request $request Datos con el email del usuario
     * @param Proyectos $project Instancia del proyecto
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito, error o info
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
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

    /**
     * Subir una fotografía para un proyecto.
     * 
     * Recibe una imagen, la valida, la guarda en storage/app/public/assets/fotosPro/
     * con un nombre único basado en el nombre del proyecto y su ID.
     * Actualiza el campo 'img' del proyecto con el nombre del archivo.
     * 
     * @param Request $request Debe contener el archivo 'foto' y el 'idProyecto'
     * @return \Illuminate\Http\JsonResponse JSON con éxito/error y la ruta de la imagen
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function subirFotoPro(Request $request)
    {
        try {
            info('Archivo recibido:', ['foto' => $request->file('foto'), 'idProyecto' => $request->idProyecto]);

            if (!$request->hasFile('foto')) {
                return response()->json(['success' => false, 'mensaje' => 'No se recibió imagen']);
            }

            $foto = $request->file('foto');
            $idProyecto = $request->idProyecto;

            // Crear carpeta si no existe
            $path = storage_path('assets/fotosPro/');
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
                chmod($path, 0775);
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

    /**
     * Eliminar un usuario del proyecto.
     * 
     * Solo los administradores del proyecto pueden eliminar usuarios.
     * Verifica los permisos antes de eliminar la relación usuario-proyecto.
     * 
     * @param Request $request Debe contener 'user_id_delete'
     * @param Proyectos $project Instancia del proyecto
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito o error
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function removeUser(Request $request, Proyectos $project)
    {
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

    /**
     * Promover un usuario a administrador del proyecto.
     * 
     * Solo los administradores del proyecto pueden promover a otros usuarios.
     * Verifica permisos y que el usuario no sea ya administrador antes de actualizar.
     * Usa updateExistingPivot para modificar el rol en la tabla intermedia.
     * 
     * @param Request $request Debe contener 'user_id_admin'
     * @param Proyectos $project Instancia del proyecto
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito, error o info
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function updateUserAdmin(Request $request, Proyectos $project)
    {
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

    /**
     * Añadir un grupo completo de usuarios al proyecto.
     * 
     * Solo los administradores pueden añadir grupos. Busca el grupo por nombre,
     * obtiene todos sus usuarios y los añade al proyecto con rol "Miembro".
     * Usa syncWithoutDetaching para no eliminar usuarios existentes.
     * 
     * @param Request $request Debe contener 'group-name'
     * @param Proyectos $project Instancia del proyecto
     * @return \Illuminate\Http\RedirectResponse Redirección con mensaje de éxito, error o info
     * @author Joaqu?n <joaquinmscollo@gmail.com>
     */
    public function addGroup(Request $request, Proyectos $project)
    {
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

            foreach ($users as $user) {
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
