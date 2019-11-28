<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth','admin']], function(){

    // el router busca dentro de la carpeta views: admin->dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // @registered y @registeredit son funciones de DashboardControler.php
    // /role-register y /role-edit/{id} son paginas
    Route::get('/role-register','Admin\DashboardController@registered');

    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

});



