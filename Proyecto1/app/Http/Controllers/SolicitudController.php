<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
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
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'clave' => 'required|string',
        ]);

        $solicitud = new Solicitud();
        $solicitud->descripcion = "Solicitud";
        $solicitud->idUsuario = auth()->user()->id;

        try{
            $solicitud->save();
            session()->flash('success', 'Se guardado correctamente los datos');
            $response = redirect()->route('perfil.controller')->with('success', 'Solicitud creada correctamente.');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se hacreado los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitude)
    {
        //
        try{
            $solicitude->delete();
            session()->flash('success', 'Se borra correctamente solicitud' . ' - ' . $solicitude.id);
            $response = redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente.');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
    }

    /**
     * Update user and then delete object
     */
    public function borrarSolicitudActualizarUser(Solicitud $solicitude)
    {
        //
        $user = $solicitude->usuario;
        $user->tipoUser = 1;
        $user->save();

        try{
            $solicitude->delete();
            session()->flash('success', 'Se borra correctamente la solicitud ' . ' - ' . $solicitude.id);
            $response =  redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente y Usuario Update');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han borrado los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
        
    }
}
