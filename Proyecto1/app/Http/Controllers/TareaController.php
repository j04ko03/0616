<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Container\Attributes\Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $tarea = Tarea::all();
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = view ('tarea.index', compact('tarea'));
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
        
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
        
        try{
            $tarea->save();
            session()->flash('success', 'Se han borrado los datos');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han borrrado los datos' . ' - ' . $missatge);
        }
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
        //NO se PUEDE HACER AUN YA QUE NO TENEMOS UNA PANTLLA PARA MODIFICAR TAREAS!!!!!!!!!!!!!!
        return view('components.popUpTarea', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
        // $tarea->titulo = $request->input('titulo');
        // $tarea->descripcion = $request->input('descripcion');
        // $tarea->estado = $request->input('estado');
        // $tarea->proyectoId = $request->input('proyectoId');
        // $tarea->responsableId = $request->input('responsableId');
        // $tarea->isDeleted = $request->input('isDeleted');
        // $tarea->idSprint = $request->input('idSprint');
        // $tarea->fechaEntrega = $request->input('fechaEntrega');
        // $tarea->save();
        // return redirect()->route('/project/{idProyecto}');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //Para borrar
        try{
            $tarea->delete();
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = redirect()->route('tasks.index');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }
        
        return $response;
    }
}
