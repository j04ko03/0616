<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Sprint;
use App\Models\Tag;
use App\Models\Usuario;
use App\Models\Proyectos;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Se usan los nombres de los archivos blade.php tal como están en resources/views
class SiteController extends Controller
{

    public function navbar()
    {
        return view('layouts.barraNavegacion');
    }
    
    public function home()
    {
        //$usuario = Usuario::find(2);
        $usuario = Auth::user();

        $proyectosRecientes = $usuario->proyectos()->orderBy('fechaModificacion', 'desc')
                               ->take(6)
                               ->get();        

        $proyectosTotal = $usuario->proyectos()
            ->with(['tareas.tags']) // carga tareas y tags dentro de cada tarea
            ->get();

        $tareasAsignadas = Tarea::with('tags') // Carga las etiquetas de cada tarea
            ->whereIn('proyectoid', $usuario->proyectos->pluck('id'))
            ->get();
        //$usuario->proyectos --> Obtiene sus proyectos --> en Usuario tener la relacion de proyectos con belongsToMany
        //->pluck('id') --> Saca los IDs
        //Tarea::with('tags') --> Busca tareas con esos IDs de proyecto --> en tarea tener la relación de tags con belongsToMany

        return view('homePage')->with(['proyectosRecientes' => $proyectosRecientes,
                                                  'proyectosTotal'=> $proyectosTotal,
                                                  'tareasAsignadas'=> $tareasAsignadas,
                                                  'usuario' => $usuario]);
    }

    public function perfil()
    {
        return view('perfil')-> with('usuario', Auth::user());
    }

    public function crearProyecto()
    {
        return view('crearProyecto');
    }

    public function project($idProyecto)
    {
        $proyecto = Proyectos::with('tareas', 'estado', 'usuarios', 'grupos')->findOrFail($idProyecto);
        // dd($proyecto);
        return view('project', compact('proyecto'));
    }

    public function crearTareas(){
        $estados = Estado::all();
        $sprints = Sprint::all();
        $tags = Tag::all();
        $usuarios = Usuario::all();
        return view('crearTareas', compact('estados', 'sprints', 'tags', 'usuarios'));
    }

    public function vistaGlobal(){
        $grupos = Grupo::with('usuarios')->get();
        $usuarios = Usuario::all();
        return view('vistaGlobal', compact('usuarios', 'grupos'));
    }
}
