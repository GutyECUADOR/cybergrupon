<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPago
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
        if(Auth::user()->is_payed == 1 ){
            return $next($request);
        }

        //return redirect('/check-pago')->with('status','No has pagado tu paquete, selecciona uno.');
        return redirect('/check-pago')->withErrors(['message' => 'No has pagado tu paquete, selecciona uno para poder ingresar a la plataforma.']);
    }
}
