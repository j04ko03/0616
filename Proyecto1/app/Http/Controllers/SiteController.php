<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Usuario;
use App\Models\Proyectos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Se usan los nombres de los archivos blade.php tal como están en resources/views
class SiteController extends Controller
{
    public function home()
    {
        //Carga de base de datos a objetos
        $proyectosRecientes = Proyectos::orderBy('fechaModificacion', 'desc')
                               ->take(6)
                               ->get();
       
        $usuario = Usuario::find(2);

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
                                                  'tareasAsignadas'=> $tareasAsignadas]);
    }

    public function perfil()
    {
        return view('perfil');
    }

    public function proyectos()
    {
        return view('proyectos');
    }

    // Crear cuenta
    public function register(Request $request)
    {
        // $testUsers = $this->getUsersTest();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home.controller')->with('success', 'Cuenta creada exitosamente!');
    }

    // Iniciar sesion
    public function signIn ()
    {
        return view ('signIn');
    }

    public function login (Request $request)
    {
    // $testUsers = $this->getUsersTest();

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
        return redirect()->route('home.controller')->with('success', '¡Bienvenid@ de nuevo!');
        }

        return back()->withErrors([
            'email' => 'Mail incorrecto.',
            'password' => 'Contraseña incorrecta.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin.controller');
    }

    public function signUp()
    {
        // $testUsers = $this->getUsersTest();
        return view('signUp');
    }

    public function crearProyecto()
    {
        return view('crearProyecto');
    }


    public function project()
    {
        return view('project');
    }

    public function crearTareas(){
        return view('crearTareas');
    }

    public function vistaGlobal(){
        return view('vistaGlobal');
    }
}
