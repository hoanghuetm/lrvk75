<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ADMIN routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your ADMIN!
|
*/


Route::group(['middleware'=>'guest'], function() {
    Route::group(['prefix' => 'login'], function () {
    
        Route::get('', [
            'as' => 'admin.auth.showLoginForm',
            'uses' => 'LoginController@showLoginForm'
        ]);
        
        Route::post('', [
            'as' => 'admin.auth.login',
            'uses' => 'LoginController@login'
        ]);
    
    });
});


Route::group(['middleware' => 'auth'], function() {
    Route::post('logout', [
        'as' => 'admin.auth.logout',
        'uses' => 'LoginController@logout'
    ]);
    
    Route::get('', [
        'as' => 'admin.dashboard.index',
        'uses' => 'DashboardController@index'
    ]);
    
    
    
    Route::group(['prefix' => 'products'], function() {
        route::get('',[
            'as'=> 'admin.products.index',
            'uses' => 'ProductController@index'
        ]);
        route::get('create',[
            'as'=> 'admin.products.create',
            'uses' => 'ProductController@create'
        ]);
        route::post('',[
            'as'=> 'admin.products.store',
            'uses' => 'ProductController@store'
        ]);
        route::get('{id}/edit',[
            'as'=> 'admin.products.edit',
            'uses' => 'ProductController@edit'
        ]);
        route::get('{id}',[
            'as'=> 'admin.products.update',
            'uses' => 'ProductController@update'
        ]);
        route::get('{id}/delete',[
            'as'=> 'admin.products.destroy',
            'uses' => 'ProductController@destroy'
        ]);
    });
    
    Route::group(['prefix' => 'orders'], function() {
        route::get('',[
            'as'=> 'admin.orders.index',
            'uses' => 'OrderController@index'
        ]);
        route::get('processed',[
            'as'=> 'admin.orders.processed',
            'uses' => 'OrderController@processed'
        ]);
        route::get('{id}/edit',[
            'as'=> 'admin.orders.edit',
            'uses' => 'OrderController@edit'
        ]);
        route::get('{id}',[
            'as'=> 'admin.orders.update',
            'uses' => 'OrderController@update'
        ]);
        route::get('{id}/delete',[
            'as'=> 'admin.orders.destroy',
            'uses' => 'OrderController@destroy'
        ]);
    });
    
    Route::resource('categories', 'CategoryController', [
        'parameters' => [
            'categories' => 'id'
        ],
        'except' => 'show',
        'as' => 'admin'
    ]);
    
    Route::resource('users', 'UserController', [
        'parameters' => [
            'users' => 'id'
        ],
        'except' => 'show',
        'as' => 'admin'
    ]);
});


