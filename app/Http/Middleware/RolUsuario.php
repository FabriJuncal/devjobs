<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolUsuario
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if( $request->User()->rol === 1 ){
            //En caso de que el usuario no tenga el rol nro 2 (Rol de Reclutador), se le redirecciona al Home
            // redirect()->route('') => Redirecciona a la página que se pasa por parametro
            return redirect()->route('home');
        }

        // $next($request) => Manda a llamar al siguiente Middleware
        return $next($request);
    }
}
