<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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
        'uses' => 'ProductController@index'
    ]);
    route::get('processed',[
        'as'=> 'admin.orders.processed',
        'uses' => 'ProductController@processed'
    ]);
    route::get('{id}/edit',[
        'as'=> 'admin.orders.edit',
        'uses' => 'ProductController@edit'
    ]);
    route::get('{id}',[
        'as'=> 'admin.orders.update',
        'uses' => 'ProductController@update'
    ]);
    route::get('{id}/delete',[
        'as'=> 'admin.orders.destroy',
        'uses' => 'ProductController@destroy'
    ]);
});

Route::resource('categories', 'CategoryController', [
    'paramaters' => [
        'categories' => 'id'
    ],
    'except' => 'show',
    'as' => 'admin'
]);
