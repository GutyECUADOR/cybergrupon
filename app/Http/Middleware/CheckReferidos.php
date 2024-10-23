<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckReferidos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->ReferidosUltimos5meses >= 3 ){
            return $next($request);
        }

        //return redirect('/profile')->with('status','No has pagado tu paquete, selecciona uno.');
        return redirect('/profile')->withErrors(['type'=>'Cuenta Desactivada', 'message' => 'Tu cuenta ha sido deshabilitada por no contar con los referidos suficientes en los primeros 5 meses, por favor consulta términos y condiciones.']);
    }
}
