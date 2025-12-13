<?php

namespace App\Http\Controllers;
/**
 * Controlador para la gestión de tareas del proyecto.
 * 
 * Maneja el CRUD completo de tareas incluyendo:
 * - Creación y edición de tareas
 * - Asociación con proyectos, sprints y usuarios
 * - Gestión de tags
 * - Eliminación de tareas y sus relaciones
 * 
 * @package App\Http\Controllers
 */

use App\Models\Tarea;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Container\Attributes\Auth;

class TareaController extends Controller
{
    /**
     * Listar todas las tareas del sistema.
     * 
     * Obtiene todas las tareas de la base de datos y las pasa a la vista.
     * Maneja errores de base de datos usando la clase Utilitat.
     * 
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse Vista con todas las tareas o redirección en caso de error
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function index()
    {
        //
        try {
            $tarea = Tarea::all();
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = view('tarea.index', compact('tarea'));
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
    }


    /**
     * Mostrar el formulario para crear una nueva tarea.
     * 
     * Retorna la vista del formulario de creación de tareas.
     * 
     * @return \Illuminate\View\View Vista del formulario de creación de tareas
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function create()
    {
        return view("crearTareas");
    }

    /**
     * Guardar una nueva tarea en la base de datos.
     * 
     * Valida los datos recibidos, crea la tarea y sincroniza las relaciones
     * con tags y usuarios asignados. Al finalizar redirige al proyecto
     * al que pertenece la tarea.
     * 
     * @param Request $request Datos de la tarea (titulo, descripcion, estado, fechaEntrega, responsableId, idSprint, proyectoId, tags[], usuariosAsignados[])
     * @return \Illuminate\Http\RedirectResponse Redirección al proyecto con mensaje de éxito o error
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:1000',
            'estado' => 'required|exists:Estado,id',
            'fechaEntrega' => 'required|date',
            'responsableId' => 'required|exists:Usuario,id',
            'idSprint' => 'nullable|exists:Sprint,id',
            'proyectoId' => 'required|exists:Proyecto,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:Tag,id',
            'usuariosAsignados' => 'nullable|array',
            'usuariosAsignados.*' => 'exists:Usuario,id',
        ]);

        // Crear la tarea
        $tarea = new Tarea();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estadoId = $request->input('estado');
        $tarea->proyectoId = $request->input('proyectoId');
        $tarea->responsableId = $request->input('responsableId');
        $tarea->idSprint = $request->input('idSprint');
        $tarea->fechaEntrega = $request->input('fechaEntrega');

        try {
            $tarea->save();
            session()->flash('success', 'Se ha creado la tarea');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'No se han guardado los datos' . ' - ' . $missatge);
        }

        // Sincronizar tags
        if ($request->has('tags')) {
            $tarea->tags()->sync($request->input('tags'));
        }

        // Sincronizar usuarios asignados
        if ($request->has('usuariosAsignados')) {
            $tarea->usuarios()->sync($request->input('usuariosAsignados'));
        }

        return redirect()->route('project.controller', ['idProyecto' => $request->input('proyectoId')])
            ->with('success', 'Tarea creada correctamente');
    }

    /**
     * Mostrar una tarea específica.
     * 
     * Retorna la vista de detalle de una tarea particular.
     * 
     * @param Tarea $tarea Instancia de la tarea a mostrar (inyección de modelo)
     * @return \Illuminate\View\View Vista con los detalles de la tarea
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Mostrar el formulario para editar una tarea existente.
     * 
     * Carga todos los datos necesarios para el formulario de edición:
     * estados, sprints, tags disponibles y lista de usuarios.
     * 
     * @param Tarea $tarea Instancia de la tarea a editar (inyección de modelo)
     * @return \Illuminate\View\View Vista del formulario de edición con la tarea y datos relacionados
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function edit(Tarea $tarea)
    {
        $estados = \App\Models\Estado::all();
        $sprints = \App\Models\Sprint::all();
        $tags = \App\Models\Tag::all();
        $usuarios = \App\Models\Usuario::all();
        return view('tareas.edit', compact('tarea', 'estados', 'sprints', 'tags', 'usuarios'));
    }

    /**
     * Actualizar una tarea existente en la base de datos.
     * 
     * Valida y actualiza los datos de la tarea, sincroniza las relaciones
     * con tags y usuarios asignados. Usa sync() para manejar correctamente
     * la adición y eliminación de relaciones.
     * 
     * @param Request $request Datos actualizados de la tarea
     * @param Tarea $tarea Instancia de la tarea a actualizar (inyección de modelo)
     * @return \Illuminate\Http\RedirectResponse Redirección al proyecto con mensaje de éxito
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function update(Request $request, Tarea $tarea)
    {
        // Validación
        $validated = $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:1000',
            'estado' => 'required|exists:Estado,id',
            'fechaEntrega' => 'required|date',
            'responsableId' => 'required|exists:Usuario,id',
            'idSprint' => 'nullable|exists:Sprint,id',
            'proyectoId' => 'required|exists:Proyecto,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:Tag,id',
            'usuariosAsignados' => 'nullable|array',
            'usuariosAsignados.*' => 'exists:Usuario,id',
        ]);

        // Actualizar la tarea
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estadoId = $request->input('estado');
        // $tarea->proyectoId = $request->input('proyectoId'); // Generalmente no movemos tareas entre proyectos, pero si es necesario descomentar
        $tarea->responsableId = $request->input('responsableId');
        $tarea->idSprint = $request->input('idSprint');
        $tarea->fechaEntrega = $request->input('fechaEntrega');
        $tarea->save();

        // Sincronizar tags
        if ($request->has('tags')) {
            $tarea->tags()->sync($request->input('tags'));
        } else {
            $tarea->tags()->sync([]); // Si no hay tags los elimina todos de forma correcta también en la bbdd.
        }

        // Sincronizar usuarios asignados
        if ($request->has('usuariosAsignados')) {
            $tarea->usuarios()->sync($request->input('usuariosAsignados'));
        } else {
            $tarea->usuarios()->sync([]);
        }

        return redirect()->route('project.controller', ['idProyecto' => $tarea->proyectoId])
            ->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Eliminar una tarea de la base de datos.
     * 
     * Antes de eliminar la tarea, se eliminan todas las relaciones
     * con tags y usuarios (detach) para evitar datos huérfanos.
     * Luego elimina la tarea y redirige al proyecto.
     * 
     * @param Tarea $tarea Instancia de la tarea a eliminar (inyección de modelo)
     * @return \Illuminate\Http\RedirectResponse Redirección al proyecto con mensaje de éxito o error
     * @author Joaqu�n <joaquinmscollo@gmail.com>
     */
    public function destroy(Tarea $tarea)
    {
        // Guardo en una variable la id del proyecto para redirigir después de eliminar la tarea.
        $proyectoId = $tarea->proyectoId;

        // Eliminar relaciones (o datos huérfanos creo que se llaman...).
        $tarea->tags()->detach();
        $tarea->usuarios()->detach();

        // Eliminar tarea
        try {
            $tarea->delete();
            return redirect()->route('project.controller', ['idProyecto' => $proyectoId])
                ->with('success', 'Tarea eliminada correctamente');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            return redirect()->back()->with('error', 'No se ha podido eliminar la tarea' . ' - ' . $missatge);
        }
    }
}
