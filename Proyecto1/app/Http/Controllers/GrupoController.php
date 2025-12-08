<?php

namespace App\Http\Controllers;
/**
*@package App\Http\Controllers
*/

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Unción en el controlador de grupos donde guardamos un grupo y los usuarios que llegaun en un 
     * array. Primero guarda el grupo y luego mediante un attach guarda los datos en la tabla intermedia.
     * @param Request $request Nombre del grupo y array de usuarios
     * @return \Illuminate\Http\RedirectResponse Hace un redirect hacia la Vista Global.
     * @author josep <jguius2021@cepnet.net>
     */
    public function store(Request $request)
    {
        //
        
        // Validar los datos recibidos
        $validated = $request->validate([
            'tituloGrupo' => 'required|string|max:100',
            'usuarios' => 'nullable|array',
            'usuarios.*' => 'exists:Usuario,id', // esto verifica que en la BD haya usuarios con ese id
        ]);

        $grupo = new Grupo();
        $grupo->descripcion = $validated['tituloGrupo']; 
        $grupo->save();

        if (!empty($validated['usuarios'])) {
            $grupo->usuarios()->attach($validated['usuarios']);
        }
        
        return redirect()->route('vistaGlobal.controller')->with('success', 'Grupo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Función que recibe por parámetro el nuevo array de usuarios y el grupo
     * Guarda los nuevos datos de grupo
     * Con el sync, hace que reemplaza todas las relaciones actuales con las que pases. Como podemos borrar usuarios
     * @param Request $request Array de usuarios
     * @param Grupo $grupo id de grupo (Grupo)
     * @return \Illuminate\Http\RedirectResponse Hace un redirect hacia la Vista Global.
     * @author josep <jguius2021@cepnet.net>
     */
    public function update(Request $request, Grupo $grupo)
    {
        // 
        $request->validate([
        'tituloGrupoEdit' => 'required|string|max:100',
        'usuarios' => 'nullable|array',
        'usuarios.*' => 'exists:Usuario,id',
        ]);
        $grupo->descripcion = $request->tituloGrupoEdit;
        $grupo->save();
        
        // Actualizar usuarios asociados
        $grupo->usuarios()->sync($request->usuarios ?? []);  //Usamos el sync para que no de error. Esto hace que reemplaza todas las relaciones actuales con las que pases. Como podemos borrar usuarios es lo mas util
        return redirect()->route('vistaGlobal.controller')->with('success', 'Grupo modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Borra el grupo seleccionado. Borra los usuarios en ese grupo con el detach()
     * @param Grupo $grupo id de grupo (Grupo)
     * @return \Illuminate\Http\RedirectResponse Hace un redirect hacia la Vista Global.
     * @author josep <jguius2021@cepnet.net>
     */
    public function destroy(Grupo $grupo)
    {
        //
        //Se debe eliminar relaciones antes de borrar equipo
        $grupo->usuarios()->detach();
        $grupo->delete();
        return redirect()->route('vistaGlobal.controller')->with('success', 'Grupo eliminado correctamente.');
    }
}
