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

Route::get('/', [
    'as' => 'client.home.index',
    'uses' => 'HomeController@index'
]);

Route::get('about', [
    'as' => 'client.home.about',
    'uses' => 'HomeController@about'
]);


Route::group(['prefix' => 'cart'], function() {
    Route::get('', [
        'as' => 'client.home.cart',
        'uses' => 'CartController@cart'
    ]);
    
    Route::get('complete', [
        'as' => 'client.home.complete',
        'uses' => 'CartController@complete'
    ]);
    
    Route::get('ckeckout', [
        'as' => 'client.home.checkout',
        'uses' => 'CartController@checkout'
    ]);
});


Route::get('contact', [
    'as' => 'client.home.contact',
    'uses' => 'HomeController@contact'
]);