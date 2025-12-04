<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Sprint;
use App\Models\Usuario;
use App\Clases\Utilitat;
use App\Models\Proyectos;
use App\Models\Solicitud;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

//Se usan los nombres de los archivos blade.php tal como están en resources/views
class SiteController extends Controller
{

    public function navbar()
    {
        return view('layouts.barraNavegacion');
    }

    public function home()
    {
        
        try{
            $usuario = Auth::user();

            $proyectosRecientes = $usuario->proyectos()->orderBy('fechaModificacion', 'desc')
                ->take(6)
                ->get();

            $proyectosTotal = $usuario->proyectos()
                ->with(['tareas.tags', 'administrador']) // carga tareas y tags dentro de cada tarea
                ->get();

            $tareasAsignadas = Tarea::with('tags') // Carga las etiquetas de cada tarea
                ->whereIn('proyectoid', $usuario->proyectos->pluck('id'))//->pluck('id') --> Saca los I
                ->get();
            session()->flash('success', 'Es passen correctament les variables usuario, proyectosRecientes, proyectosTotal, TareasAsignadas');
        }catch (QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No es poden obtenir les dades indicades' . ' - ' . $missatge);
        }

        return view('homePage')->with([
            'proyectosRecientes' => $proyectosRecientes,
            'proyectosTotal' => $proyectosTotal,
            'tareasAsignadas' => $tareasAsignadas,
            'usuario' => $usuario
        ]);
    }

    public function perfil()
    {
        try{
        $solicitudes = Solicitud::with('usuario')->get();
        session()->flash('success', 'Es passen correctament les solicitudes');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido las solicitudes' . ' - ' . $missatge);
        }
        return view('perfil', compact('solicitudes'))->with('usuario', Auth::user());
    }

    public function crearProyecto()
    {
        return view('crearProyecto');
    }

    public function project($idProyecto)
    {
        try{
            $projects = Auth::user()->proyectos;
            $proyecto = Proyectos::with('tareas', 'estado', 'usuarios', 'grupos', 'sprints')->findOrFail($idProyecto);
            $user = Auth::user();
            $userProject = $proyecto->usuarios->firstWhere('id', $user->id);
            $usuarios = $proyecto->usuarios;
            $img = $user->img;
            session()->flash('success', 'Se pasan corectamente los datos de proyectos');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos solicitados' . ' - ' . $missatge);
        }
        return view('project', compact('proyecto', 'projects', 'idProyecto', 'user', 'userProject', 'usuarios', 'img'));
    }

    public function crearTareas(){
        try{
            $estados = Estado::all();
            $sprints = Sprint::all();
            $tags = Tag::all();
            $usuarios = Usuario::all();
            session()->flash('success', 'Se pasan correctamente los datos');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
        }
        return view('crearTareas', compact('estados', 'sprints', 'tags', 'usuarios'));
    }

    public function vistaGlobal(){
        try{
            $grupos = Grupo::with('usuarios')->get();
            $incidencias = Incidencia::with('usuario')->get();
            $solicitudes = Solicitud::with('usuario')->get();
            $usuarios = Usuario::all();
            $proyectos = Proyectos::with(['tareas.tags', 'administrador'])->get();
            session()->flash('success', 'Se pasan correctamente los datos');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
        }
        return view('vistaGlobal', compact('usuarios', 'grupos', 'solicitudes', 'incidencias', 'proyectos'));
    }

    public function verTarea($id)
    {
        try{
            $tarea = Tarea::findOrFail($id);
            $usuarios = Usuario::all();
            session()->flash('success', 'Se pasan correctamente los datos');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
        }
        return view('components.popUpTarea', compact('tarea', 'usuarios'));
    }

        public function verProyecto($id)
    {
        $proyecto = Proyectos::findOrFail($id);
        return view('#', compact('proyecto'));
    }

}
