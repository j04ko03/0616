<?php

namespace App\Http\Controllers;
/**
*@package App\Http\Controllers
*/

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

    /**
     * Función que se encarga de cargar los datos necesarios para acceder al DashBoard de la app.
     * @usuario Toma el usuario loggeado en esta sesión.
     * @proyectosRecientes Coge los primeros 6 proyectos por orden de fechaModificación del usuario.
     * @proyectosTotal Coge los proyectos que tiene el usuario.
     * @tareasAsignadas Coge las tareas que están asignadas al usuario.
     * @return \Illuminate\Contracts\View\View Devuelve la vista del home junto a las variables comentadas anteriormente.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error de bd.
     * @author josep <jguius2021@cepnet.net>
     */
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

    /**
     * Función para acceder a la ruta de perfil
     * @solicitudes Solicitudes que tiene el usuario.
     * @usuario Usuario loggeado.
     * @return \Illuminate\Contracts\View\View Devuelve la vista de perfil con las variables comentadas anteriormente.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error de BD.
     * @author josep <jguius2021@cepnet.net>
     */
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
            $sprints = Sprint::all();
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos solicitados' . ' - ' . $missatge);
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

    /**
     * Funció para acceder a la vista para crear tareas.
     * @estados Lista de todos los estados.
     * @sprints Lista de todos los sprints.
     * @tags Lista de todos los tags.
     * @usuarios Lista de todos los usuarios.
     * @return \Illuminate\Contracts\View\View Devuelve la vista de crearTareas con las variables comentadas.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error de BD.
     * @author josep <jguius2021@cepnet.net>
     */
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

    /**
     * Función para acceder a la Vista Global. Función que tendrá S.U y S.A
     * @grupos Lista de los grupos con sus usuarios respectivos.
     * @incidencias Lista de las incidencias con sus usuarios respectivos.
     * @solicitudes Lista de las solicitudes de Super User con sus usuarios respectivos.
     * @usuarios Lista de todos los usuarios de la BD.
     * @proyectos Lista de los proyectos de la BD con sus tags (lista) y su adminiistrador (usuario)
     * @return \Illuminate\Contracts\View\View Devuelve la vista de vistaGlobal con las variables comentadas.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
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

    /**
     * Función para acceder a la Vista de la tarea para poder modificarla.
     * @param mixed $id Tarea a buscar y mostrar.
     * @tarea Tarea buscada por el id.
     * @usuarios Lista de todos los usuarios.
     * @return \Illuminate\Contracts\View\View Devuelve la vista popUpTarea con las variables comentadas.
     * @throws QueryException En caso de error hace uso de la clase de Utilitat para devolver el error.
     * @author josep <jguius2021@cepnet.net>
     */
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

    /**
     * Función para acceder a un proyecto clicacble del home.
     * @param mixed $id id de proyecto a buscar.
     * @proyecto Proyecto obtenido por el @id
     * @return \Illuminate\Contracts\View\View Devuelve la vista de projects.
     * @author josep <jguius2021@cepnet.net>
     */
    public function verProyecto($id)
    {
        $proyecto = Proyectos::findOrFail($id);
        return view('#', compact('proyecto'));
    }

}
