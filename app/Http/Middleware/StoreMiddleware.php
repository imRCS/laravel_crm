<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !Auth::user()->is_admin ){

            return $next($request);

        }else{

            return redirect('dashboard')->with('status','No se puede acceder a la tienda con una cuenta de administrador. Acceda con su cuenta de cliente o cree una si no la tiene.');
        }
        
    }
}
