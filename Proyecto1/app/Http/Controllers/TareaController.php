<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarea = Tarea::all();
        return view('tarea.index', compact('tarea'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crearTareas");
    }

    /**
     * Store a newly created resource in storage.
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
            'proyectoId' => 'required|exists:Proyectos,id',
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
        $tarea->isDeleted = false;
        $tarea->save();

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
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
            'proyectoId' => 'required|exists:Proyectos,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:Tag,id',
            'usuariosAsignados' => 'nullable|array',
            'usuariosAsignados.*' => 'exists:Usuario,id',
        ]);

        // Actualizar la tarea
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estadoId = $request->input('estado');
        $tarea->proyectoId = $request->input('proyectoId');
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
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        // Guardo en una variable la id del proyecto para redirigir después de eliminar la tarea.
        $proyectoId = $tarea->proyectoId;
        
        // Eliminar relaciones (o datos huérfanos creo que se llaman...).
        $tarea->tags()->detach();
        $tarea->usuarios()->detach();
        
        // Eliminar tarea
        $tarea->delete();
        
        return redirect()->route('project.controller', ['idProyecto' => $proyectoId])
            ->with('success', 'Tarea eliminada correctamente');
    }
}
