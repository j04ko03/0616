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
        //
        $tarea = Tarea::all();
        return view('tarea.index', compact('tarea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Nos va a llevar a la vista de tareas
        return view("crearTareas");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarea                = new Tarea();
        $tarea->titulo        = $request->input('titulo');
        $tarea->descripcion   = $request->input('descripcion');
        $tarea->estado        = $request->input('estado');
        $tarea->proyectoId    = $request->input('proyectoId');
        $tarea->responsableId = $request->input('responsableId');
        $tarea->isDeleted     = $request->input('isDeleted');
        $tarea->idSprint      = $request->input('idSprint');
        $tarea->fechaEntrega  = $request->input('fechaEntrega');
        $tarea->save();
        // return redirect()->route('project.controller', ['idProyecto' => $request->input('proyectoId')]); TODO
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $estados  = \App\Models\Estado::all();
        $sprints  = \App\Models\Sprint::all();
        $tags     = \App\Models\Tag::all();
        $usuarios = \App\Models\Usuario::all();
        return view('tareas.edit', compact('tarea', 'estados', 'sprints', 'tags', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
        // $tlarea->titulo = $request->input('titulo');
        // $tarea->descripcion = $request->input('descripcion');
        // $tarea->estado = $request->input('estado');
        // $tarea->proyectoId = $request->input('proyectoId');
        // $tarea->responsableId = $request->input('responsableId');
        // $tarea->isDeleted = $request->input('isDeleted');
        // $tarea->idSprint = $request->input('idSprint');
        // $tarea->fechaEntrega = $request->input('fechaEntrega');
        // $tarea->save();
        // return redirect()->route('/project/{idProyecto}');

        // Validación de datos
        $request->validate([
            'titulo'        => 'required|string|max:100',
            'descripcion'   => 'nullable|string',
            'estado'        => 'required|exists:Estado,id',
            'fechaEntrega'  => 'required|date',
            'responsableId' => 'required|exists:Usuario,id',
            'idSprint'      => 'nullable|exists:Sprint,id',
            'proyectoId'    => 'required|exists:Proyectos,id',
        ]);

        // Actualizar la tarea
        $tarea->titulo        = $request->input('titulo');
        $tarea->descripcion   = $request->input('descripcion');
        $tarea->estadoId      = $request->input('estado');
        $tarea->proyectoId    = $request->input('proyectoId');
        $tarea->responsableId = $request->input('responsableId');
        $tarea->idSprint      = $request->input('idSprint');
        $tarea->fechaEntrega  = $request->input('fechaEntrega');
        $tarea->save();

        // Sincronizar tags si se enviaron
        if ($request->has('tags')) {
            $tarea->tags()->sync($request->input('tags'));
        }

        // Sincronizar usuarios asignados si se enviaron
        if ($request->has('usuariosAsignados')) {
            $tarea->usuarios()->sync($request->input('usuariosAsignados'));
        }

        return redirect()->route('project.controller', ['idProyecto' => $tarea->proyectoId])
            ->with('success', 'Tarea actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //Para borrar
        $tarea->delete();
        return redirect()->route('tasks.index');
    }

    public function updateDestroyTarea()
    {
        return view('updateTarea');
    }
}
