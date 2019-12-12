<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /*Despues de que el usuario hace login se le envia a una pagina u otra dependiendo de si es administrador o no*/
  /*   protected function redirectTo(Request $request, $user) {
        if ($user->is_admin) {
            return redirect ('dashboard');
        } else {
            return redirect ('products');
        }
    } */
    protected function redirectTo() {
        if (Auth::user()->is_admin) {
            return 'dashboard';
        } else {
            return 'products';
        }
    }
    /* protected function redirectTo(){

        if(Auth::user()->usertype == 'admin'){

            return 'dashboard';

        }else{

            return 'home';

        }

    } */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
