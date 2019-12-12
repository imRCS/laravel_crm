<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //Si el usuario se ha logueado
        if (Auth::user()) {
            //si es admin
            if (Auth::user()->is_admin) {

                //if ($request->is('dashboard/*')) {
                //    return $next($request);
                //} else {
                //    return redirect('dashboard');
                //}

                return $next($request);
                //si es un cliente
            } else {

                return redirect('products')->with('status', 'No tienes permisos para acceder a la url solicitada.');
            }
        }
        return redirect('login');


        /*         if(Auth::user()->usertype == 'admin'){

            return $next($request);

        }else{

            return redirect('/home')->with('status','No tienes permisos para acceder a la url solicitada.');

        } */
    }
}
