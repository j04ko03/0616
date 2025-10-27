<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Se usan los nombres de los archivos blade.php tal como están en resources/views
class SiteController extends Controller
{
    public function home()
    {
        //Carga de base de datos a objetos
        $proyectosRecientes = [
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 1],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 2],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 0],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 1],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 2],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 0],
            ['titulo' => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 0],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 2],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 0],
            ['titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 2],
        ];

        //Se cambiará por query a sql
        $proyectosTotal = [
            ['titulo'      => 'Proyecto de prueba', 'descripcion' => 'Descripción del proyecto de prueba', 'estado' => 1, 'tareas' => [
                    ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'estado' => 0, 'tag' => [
                            ['descripcion' => 'php', 'color' => 'blue'],
                            ['descripcion' => 'css', 'color' => 'orange'],
                            ['descripcion' => 'js', 'color' => 'yellow'],
                            ['descripcion' => 'java', 'color' => 'green'],
                            ['descripcion' => 'c#', 'color' => 'purple'],
                            ['descripcion' => 'html', 'color' => 'red'],
                        ],
                    ],
                    ['titulo' => 'Tarea2', 'descripcion' => 'Otra descripción', 'estado' => 2, 'tag' => [
                            ['descripcion' => 'php', 'color' => 'blue'],
                            ['descripcion' => 'css', 'color' => 'orange'],
                            ['descripcion' => 'js', 'color' => 'yellow'],
                        ],
                    ],
                ],
            ],
            ['titulo' => 'Primer Proyecto', 'descripcion' => 'Descripción del proyecto 1', 'estado' => 2, 'tareas' => [
                    ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'estado' => 1, 'tag' => [
                            ['descripcion' => 'php', 'color' => 'blue'],
                            ['descripcion' => 'css', 'color' => 'orange'],
                            ['descripcion' => 'js', 'color' => 'yellow'],
                        ],
                    ],
                ],
            ],
            ['titulo' => 'Segundo Proyecto', 'descripcion' => 'Descripción del proyecto 2', 'estado' => 0, 'tareas' => [
                    ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'estado' => 2, 'tag' => [
                            ['descripcion' => 'php', 'color' => 'blue'],
                        ],
                    ],
                ],
            ],
            ['titulo' => 'Tercer Proyecto', 'descripcion' => 'Descripción del proyecto 3', 'estado' => 1, 'tareas' => [
                    ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'estado' => 1, 'tag' => [
                            ['descripcion' => 'php', 'color' => 'blue'],
                            ['descripcion' => 'css', 'color' => 'orange'],
                            ['descripcion' => 'js', 'color' => 'yellow'],
                        ],
                    ],
                ],
            ],
            [ 'titulo' => 'Cuarto Proyecto', 'descripcion' => 'Descripción del proyecto 4', 'estado' => 2, 'tareas' => [
                    ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'estado' => 0, 'tag' => [],
                    ],
                ],
            ]
        ];

        $tareasAsignadas = [
            ['titulo' => 'Tarea1', 'descripcion' => 'Descripción', 'tag' => [
                ['descripcion' => 'php', 'color' => 'blue'],
                ['descripcion' => 'css', 'color' => 'orange'],
                ['descripcion' => 'js', 'color' => 'yellow']],
            ],
            ['titulo' => 'Tarea2', 'descripcion' => 'Descripción', 'tag' => [
                ['descripcion' => 'php', 'color' => 'blue'],
                ['descripcion' => 'css', 'color' => 'orange'],
                ['descripcion' => 'js', 'color' => 'yellow']],
            ],
            ['titulo' => 'Tarea3', 'descripcion' => 'Descripción', 'tag' => [
                ['descripcion' => 'php', 'color' => 'blue']],
            ],
            ['titulo' => 'Tarea4', 'descripcion' => 'Descripción', 'tag' => [
                ['descripcion' => 'php', 'color' => 'blue'],
                ['descripcion' => 'css', 'color' => 'orange'],
                ['descripcion' => 'js', 'color' => 'yellow']],
            ],
            ['titulo' => 'Tarea5', 'descripcion' => 'Descripción', 'tag' => []],
            ['titulo' => 'Tarea6', 'descripcion' => 'Descripción', 'tag' => [
                ['descripcion' => 'php', 'color' => 'blue'],
                ['descripcion' => 'css', 'color' => 'orange'],
                ['descripcion' => 'js', 'color' => 'yellow'],
                ['descripcion' => 'java', 'color' => 'green'],
                ['descripcion' => 'c#', 'color' => 'purple'],
                ['descripcion' => 'html', 'color' => 'red']],
            ],
        ];
        //return view('homePage', compact('proyectosRecientes', 'proyectosTotal', 'tareasAsignadas'));
        /**return view('homePage', ['proyectosRecientes' => $proyectosRecientes,
                                            'proyectosTotal' => $proyectosTotal,
                                            'tareasAsignadas' => $tareasAsignadas**/
        return view('homePage')->with(['proyectosRecientes' => $proyectosRecientes,
            'proyectosTotal'                                    => $proyectosTotal,
            'tareasAsignadas'                                   => $tareasAsignadas]);
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
