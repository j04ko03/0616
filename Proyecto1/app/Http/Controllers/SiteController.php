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

public function project($idProyecto, $tareaId = null)
{
    try{
        $user = Auth::user();
        $projects = $user->proyectos;
        
        $proyecto = Proyectos::with('tareas.usuarios', 'tareas.responsable', 'tareas.tags', 'estado', 'usuarios', 'grupos', 'sprints')
            ->findOrFail($idProyecto);
        
        // Verificar que el usuario pertenece al proyecto
        $userProject = $proyecto->usuarios->firstWhere('id', $user->id);
        
        if (!$userProject) {
            return redirect()->route('home.controller')
                ->with('error', 'No tienes acceso a este proyecto');
        }
        
        $usuarios = $proyecto->usuarios;
        $img = $user->img;
        
        // Cargar la tarea si se proporciona tareaId
        $tareaToEdit = null;
        if ($tareaId) {
            $tareaToEdit = Tarea::with(['responsable', 'usuarios', 'tags', 'estado', 'sprint'])
                ->find($tareaId);
            
            // Verificar que la tarea existe y pertenece al proyecto
            if (!$tareaToEdit) {
                return redirect()->route('project.controller', $idProyecto)
                    ->with('error', 'La tarea no existe');
            }
            
            if ($tareaToEdit->proyectoId != $idProyecto) {
                return redirect()->route('project.controller', $idProyecto)
                    ->with('error', 'La tarea no pertenece a este proyecto');
            }
            
            // Verificar que el usuario tiene acceso a esta tarea
            $tieneAcceso = $tareaToEdit->usuarios->contains($user->id) || $tareaToEdit->responsableId === $user->id;
            
            if (!$tieneAcceso) {
                return redirect()->route('project.controller', $idProyecto)
                    ->with('error', 'No tienes acceso a esta tarea');
            }
        }
        
        session()->flash('success', 'Se pasan correctamente los datos de proyectos');
        
    }catch(QueryException $e){
        $missatge = Utilitat::errorMessage($e);
        return redirect()->route('home.controller')
            ->with('error', 'No se han obtenido los datos solicitados: ' . $missatge);
    } catch(\Exception $e) {
        return redirect()->route('home.controller')
            ->with('error', 'Error inesperado: ' . $e->getMessage());
    }
    
    return view('project', compact('proyecto', 'projects', 'idProyecto', 'user', 'userProject', 'usuarios', 'img', 'tareaToEdit'));
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

public function verTarea($idTarea)
{
    try{
        $tarea = Tarea::with(['proyecto', 'responsable', 'usuarios', 'tags', 'estado', 'sprint'])
            ->findOrFail($idTarea);
        
        $user = Auth::user();
        
        // Verificar que el usuario tiene acceso a esta tarea
        $tieneAcceso = $tarea->usuarios->contains($user->id) || $tarea->responsableId === $user->id;
        
        if (!$tieneAcceso) {
            return redirect()->route('home.controller')
                ->with('error', 'No tienes acceso a esta tarea');
        }
        
        // Redirigir al proyecto con la tarea seleccionada
        return redirect()->route('project.controller.with.task', [
            'idProyecto' => $tarea->proyectoId,
            'tareaId' => $tarea->id
        ]);
        
    }catch(QueryException $e){
        $missatge = Utilitat::errorMessage($e);
        return redirect()->route('home.controller')
            ->with('error', 'No se han obtenido los datos: ' . $missatge);
    } catch(\Exception $e) {
        return redirect()->route('home.controller')
            ->with('error', 'Error al cargar la tarea: ' . $e->getMessage());
    }
}

        public function verProyecto($id)
    {
        $proyecto = Proyectos::findOrFail($id);
        return view('#', compact('proyecto'));
    }

}
