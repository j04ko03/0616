<?php

namespace App\Http\Controllers;
/**
*@package App\Http\Controllers
*/

use App\Clases\Utilitat;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class IncidenciaController extends Controller
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
     * Función que guarda las incidencias del proyecto.
     * @param Request $request Recibe la incidencia como string.
     * @return \Illuminate\Http\RedirectResponse Redirecciona otra vez hacia Perfil.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
    public function store(Request $request)
    {
        //
        try{
            $validated = $request->validate([
                'incidencia' => 'required|string|max:500'
            ]);

            $incidencia = new Incidencia();
            $incidencia->descripcion = $validated['incidencia'];
            $incidencia->idUsuario = auth()->user()->id;
            $incidencia->save();
            session()->flash('success', 'Se guardan correctamente los datos');
            $response = redirect()->route('perfil.controller')->with('success', 'Incidencia creada correctamente.');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han guardado los datos' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Función que se encarga de borrar Incidencias.
     * @param Incidencia $incidencia Recibe la incidencia por parámetro.
     * @return \Illuminate\Http\RedirectResponse Redirecciona devuelta hacia VistaGlobal.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
    public function destroy(Incidencia $incidencia)
    {
        try{
            $incidencia->delete();
            session()->flash('success', 'Se eliminan correctamente los datos');
            $response = redirect()->route('vistaGlobal.controller');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han eliminado los datos' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
        return $response;
    }
}
