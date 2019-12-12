<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function registered(){

        /*$users: Variable que contiene todos los usuarios del modelo User.php. User::all() es una funcion de llamada a la base de datos*/
        $users = User::all();
        return view('admin.register')->with('users',$users);

    }

    /* id viene dentro de la ruta '/role-edit/{id} */ 
    public function registeredit(Request $request, $id){

        /*guardamos en una variable llamada users el usuario de id $id*/
        $user = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$user);

    }

    /* funcion para que se invoca para guardar los cambios hechos a un usuario registrado */
    /* lo que llega a una funcion es un $request o un $id */
    public function registerupdate(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->is_admin = $request->input('is_admin');
        $users->update();

        return redirect('/role-register')->with('status','Cambios guardados con exito');

    }

    /* funcion que permite eliminar un usuario de la base de datos */
    public function registerdelete($id){

        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Usuario eliminado con exito');
    }

}
