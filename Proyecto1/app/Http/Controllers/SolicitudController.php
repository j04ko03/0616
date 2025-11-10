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

        $solicitud.save();
        return redirect()->route('perfil.controller')->with('success', 'Solicitud creada correctamente.');
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
        $solicitude->delete();
        return redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente.');
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

        $solicitude->delete();
        
        return redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente y Usuario Update');
    }
}
