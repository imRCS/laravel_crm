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


/* Route::get('/home', 'HomeController@index')->name('home'); */



Route::group(['middleware' => ['auth', 'admin']], function () {

    // el router busca dentro de la carpeta views: admin->dashboard
    /* Route::get('/dashboard', function () {
        return view('admin.dashboard');
    }); */
    Route::get('/dashboard', 'Admin\DashboardMainpageController@index');


    // @registered y @registeredit son funciones de DashboardController.php
    // /role-register y /role-edit/{id} son paginas
    Route::get('/role-register', 'Admin\DashboardController@registered');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}', 'Admin\DashboardController@registerdelete');

    Route::get('/product-list', 'Admin\ProductListController@index');
    Route::post('/save-product-admin', 'Admin\ProductListController@store');
    Route::get('/product-edit/{id}', 'Admin\ProductListController@productedit');
    Route::put('/product-edit-update/{id}', 'Admin\ProductListController@producteditupdate');
    Route::delete('/product-delete/{id}', 'Admin\ProductListController@productdelete');
    

    Route::get('/campaigns', 'Admin\CampaignController@index');
    Route::post('/save-campaign', 'Admin\CampaignController@store');
    Route::get('/campaign-edit/{id}', 'Admin\CampaignController@campaignedit');
    Route::put('/campaign-update/{id}', 'Admin\CampaignController@campaignupdate');
    Route::delete('/campaign-delete/{id}', 'Admin\CampaignController@campaigndelete');

});

Route::group(['middleware' => ['auth', 'store']], function () {

    /* Route::get('/products', function () {
        return view('store.products');
    }); */
    Route::get('/products', 'Store\ProductsController@index');
    Route::post('/save-product', 'Store\ProductsController@store');
    Route::post('/buy-product/{id}', 'Store\ProductsController@recordPurchase');
    Route::post('/view-product/{id}', 'Store\ProductsController@updateViews');
});
