<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->rol === 'editor') {
            if ($request->isMethod('delete') || $request->routeIs('admin.destroy')) {
                abort(403, 'No tienes permisos para eliminar usuarios.');
            }
    
            // if ($request->isMethod('patch') && $request->has('rol')) {
            //     abort(403, 'No tienes permisos para editar roles.');
            // }
    
            return $next($request);
        }
    
        abort(403, 'Acceso no autorizado');
    }
}
