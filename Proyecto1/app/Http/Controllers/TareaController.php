<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $tarea = new Tarea();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estado = $request->input('estado');
        $tarea->proyectoId = $request->input('proyectoId');
        $tarea->responsableId = $request->input('responsableId');
        $tarea->isDeleted = $request->input('isDeleted');
        $tarea->idSprint = $request->input('idSprint');
        $tarea->fechaEntrega = $request->input('fechaEntrega');
        $tarea->save();
        //return redirect()->route('tasks.index');
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
        //NO se PUEDE HACER AUN YA QUE NO TENEMOS UNA PANTLLA PARA MODIFICAR TAREAS!!!!!!!!!!!!!!
        return view('', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estado = $request->input('estado');
        $tarea->proyectoId = $request->input('proyectoId');
        $tarea->responsableId = $request->input('responsableId');
        $tarea->isDeleted = $request->input('isDeleted');
        $tarea->idSprint = $request->input('idSprint');
        $tarea->fechaEntrega = $request->input('fechaEntrega');
        $tarea->save();
        //return redirect()->route('');
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
}
