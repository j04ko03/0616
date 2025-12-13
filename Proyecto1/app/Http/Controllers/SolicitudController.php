<?php

namespace App\Http\Controllers;
/**
 *@package App\Http\Controllers
 */

use App\Clases\Utilitat;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
    /**
     * Esta función crea una solicitud de S.U.
     * @param Request $request Devuelve la clave para poder hacer la solicitud. En caso de ser correcta. 
     * @return \Illuminate\Http\RedirectResponse Devuelve al usuario a Perfil.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
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

        try {
            $solicitud->save();
            session()->flash('success', 'Se guardado correctamente los datos');
            $response = redirect()->route('perfil.controller')->with('success', 'Solicitud creada correctamente.');
        } catch (QueryException $e) {
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
    /**
     * Función para borrar las solicitudes
     * @param Solicitud $solicitude
     * @return \Illuminate\Http\RedirectResponse Redirecciona a Vista Global.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
    public function destroy(Solicitud $solicitude)
    {
        //
        try {
            $solicitude->delete();
            session()->flash('success', 'Se borra correctamente solicitud' . ' - ' . $solicitude . id);
            $response = redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente.');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;
    }

    /**
     * Update user and then delete object
     */
    /**
     * Funciós que al aceptar la solicitud de usuario, actualiza el usuario y luego borra la solicitud
     * @param Solicitud $solicitude Solicitud con usuario
     * @return \Illuminate\Http\RedirectResponse Redirecciona a vista Global.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
    public function borrarSolicitudActualizarUser(Solicitud $solicitude)
    {
        //
        $user = $solicitude->usuario;
        $user->tipoUser = 1;
        $user->save();

        try {
            $solicitude->delete();
            session()->flash('success', 'Se borra correctamente la solicitud ' . ' - ' . $solicitude . id);
            $response = redirect()->route('vistaGlobal.controller')->with('success', 'Solicitud eliminada correctamente y Usuario Update');
        } catch (QueryException $e) {
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han borrado los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }

        return $response;

    }
}
