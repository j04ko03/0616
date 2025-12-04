<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Usuario;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los usuarios (para la vista de admin).
        try{
            $usuarios = Usuario::all(); // Obtener todos los usuarios (all()).
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = view('usuarios.index', compact('usuarios')); 
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
         // Pasar usuarios a la vista.
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vista del formulario de registro.
        return view('auth.signUp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Procesar registro.
    {

        // Se valida la entrada, se crea el usuario, se autentica y se redirige.

        try{
        // Registro de nuevo usuario.
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:Usuario',
                'contraseña' => 'required|string|min:8|confirmed',
            ]);

            // Debug de los datos validados
            // dd('Datos validados:', $validated);

            // Crear usuario - solo los campos esenciales.
            $usuario = Usuario::create([
                'nombre' => $validated['nombre'],
                'email' => $validated['email'],
                'contraseña' => bcrypt($validated['contraseña']),
                'fechaCreacion' =>  now()->format('d-m-Y H:i:s'),
                'fechaCreacion' => now()->format('Y-m-d H:i:s'),
                // tipoUser, apodo y fechaCreacion se asignan automáticamente.
            ]);
            // Debug de usuario creado (COMENTA esto cuando funcione)
            // dd('Usuario creado exitosamente:', $usuario->toArray());

            // Iniciar sesión automáticamente después del registro.
            Auth::login($usuario);

            session()->flash('success', 'Se ha creado el usuario correctamente');
            $response = redirect()->route('home.controller')->with('success', '¡Cuenta creada exitosamente!');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se ha creado el usuario' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
        

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario) // Mostrar perfil de usuario específico.
    {
        // Vista del perfil de usuario específico.
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        // Vista del formulario de edición de perfil
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        try{
            // PROCESAR actualización de perfil.
            $validated = $request->validate([
                'nombre' => 'nullable|string|max:255',
                'contraseña' => 'nullable|string|min:8|max:255',
                'apodo' => 'nullable|string|max:255',
            ],[
                'contraseña.min'          => 'Debes introducir almenos 8 carácteres',
                'contraseña.confirmed'    => 'Las contraseñas no coinciden'
            ]);

            //$usuario->update($validated);
            foreach ($validated as $key => $value) {
                if ($key === 'contraseña' && $value !== null) {
                    $usuario->$key = Hash::make($value);
                } else {
                    if ($value !== null) {
                        $usuario->$key = $value;
                    }
                }
            }
            // dd($usuario->nombre, $usuario->apodo, $usuario->contraseña);

            $usuario->save();
            session()->flash('success', 'Se modifican correctamente los datos');
            $response = redirect()->route('perfil.controller')->with(['success','Perfil actualizado exitosamente!', 'usuario' => Auth::user()]);
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han modificado los datos' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try{
            // Eliminar usuario.
            $usuario->delete();
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = redirect()->route('vistaGlobal.controller')->with('success', 'Cuenta eliminada exitosamente!');
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = $response = redirect()->back();
        }
        return $response;
    }

    // =============================================
    // MÉTODOS DE AUTENTICACIÓN
    // =============================================

    /**
     * Mostrar formulario de inicio de sesión.
     */
    public function signIn()
    {
        return view('auth.signIn');
    }

    /**
     * Procesar inicio de sesión.
     */
    public function login(Request $request)
    {

        // Validar credenciales, intentar autenticar y redirigir.

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'contraseña' => 'required|string'
        ]);


        $usuario = Usuario::where('email', $credentials['email'])->first(); // Buscar usuario por email.

        // Verificar contraseña y autenticar.
        //if ($usuario ($credentials[]))

        if ($usuario && Hash::check($credentials['contraseña'], $usuario->contraseña)) {
            Auth::login($usuario, $request->remember);
            $request->session()->regenerate();
            return redirect()->route('home.controller')->with('success', '¡Bienvenid@ de nuevo!')->with('usuario', $usuario);
        }

        //if ($usuario && Hash::check($request -> contraseña, $hashedValue))

        return back()->withErrors([
            'email' => 'Email incorrecto.', 
            'contraseña' => 'Contraseña incorrecta.',
        ]);
    }

    /**
     * Cerrar sesión.
     */
    public function logout()
    {
        //  dd(Auth::user()->id, );
        Auth::logout();
        return redirect()->route('signin.controller');
    }

    /**
     * Mostrar formulario de registro (alias de create()).
     */
    public function register()
    {
        return $this->create();
    }

    /**
     * Procesar registro (alias de store())
     */
    public function registerProcess(Request $request)
    {
        return $this->store($request);
    }

    public function listaUsuarios (Request $request)
    {
        try{
            $usuarios = Usuario::whereIn('tipUser', [1, 2])->select('nombre')->get();
            session()->flash('success', 'Se pasan correctamente los datos');
            $response = response()->json($usuarios);
        }catch(QueryException $e){
            $missatge = Utilitat::errorMessage($e);
            session()->flash('error', 'No se han obtenido los datos' . ' - ' . $missatge);
            $response = redirect()->back();
        }
        return $response;
    }


    //Funcion para guardar fotografias
    public function subirFoto(Request $request) 
    {
        if (!$request->hasFile('foto')) {
            return response()->json(['success' => false, 'mensaje' => 'No se recibió imagen']);
        }

        $foto = $request->file('foto');

        // Crear carpeta si no existe
        $path = storage_path('app/public/assets/fotosUser/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        } 

        $usuari = Auth::user();

        // Nombre único
        //$nombreArchivo = 'foto_' . time() . '.' . $foto->getClientOriginalExtension();
        $nombreArchivo = 'foto_' . $usuari->nombre . '.' . $foto->getClientOriginalExtension();

        // Guardar en storage/app/public/assets/fotosUser
        $foto->move($path, $nombreArchivo);

        //Guardar usuario update de foto
        try{
            $usuari->img = $nombreArchivo;
            $usuari->save();
        }catch(Exception $e){
            echo("error: " . $e);
        }

        return response()->json([
            'success' => true,
            'ruta' => '/storage/assets/fotosUser/' . $nombreArchivo
        ]);
    }

}
