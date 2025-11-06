<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryProjects = Proyectos::query();

        $proyectos = $queryProjects->orderby('id')->get();
        return view('proyectos', compact('proyectos'));
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
        //TE PONGO EJEMPLO DE COMO USAR EL INPUT DE TAREAS QUE SE CREA EN JS A PARTIR DE LOCAL STORAGE
        /*
            // 1. Crear el proyecto
            $project = Project::create([
                'titulo' => $request->input('titulo'),
                'fecha_limite' => $request->input('fecha-limite'),
                'presupuesto' => $request->input('presupuesto'),
            ]);

            // 2. Recuperar las tareas del input hidden
            $tareas = json_decode($request->input('tareas'), true);

            // 3. Guardar cada tarea en la base de datos asociada al proyecto
            if($tareas){
                foreach($tareas as $tareaData){
                    // Crear tarea asociada al proyecto
                    $tarea = Tarea::create([
                        'titulo' => $tareaData['titulo'] ?? '',
                        'descripcion' => $tareaData['descripcion'] ?? '',
                        'fecha_limite' => $tareaData['fechaLimite'] ?? null,
                        'presupuesto' => $tareaData['presupuesto'] ?? null,
                        'estado' => $tareaData['estado'] ?? 0,
                        'project_id' => $project->id
                    ]);

                    //Asignar usuarios a la tarea (N:M)
                    if(isset($tareaData['usuarios']) && count($tareaData['usuarios']) > 0){
                        $tarea->usuarios()->sync($tareaData['usuarios']); // IDs de usuarios
                    }
                }
            }

            // 4. Redirigir o retornar respuesta
            return redirect()->route('proyectos')->with('success', 'Proyecto y tareas creadas correctamente');
        */
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
    public function update(Request $request, Proyectos $proyectos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyectos $proyectos)
    {
        //
    }
}
