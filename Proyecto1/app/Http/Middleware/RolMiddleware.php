<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * Creación de un middleware para delimitar el acceso a diferentes páginas según el tipoUser del usuario.
     */
    public function handle(Request $request, Closure $next, ...$rol): Response 
    {
        $usuario = Auth::user();
        if (!$usuario || !in_array($usuario->tipoUser, $rol)) {
           $response = redirect('/home');
        }
        else {
            $response = $next($request);
        }
        return $response;
    }
}
