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

Route::get('thong-tin', [
    'as' => 'client.home.about',
    'uses' => 'HomeController@about'
]);


Route::group(['prefix' => 'gio-hang'], function() {
    Route::get('', [
        'as' => 'client.home.cart',
        'uses' => 'CartController@cart'
    ]);
    
    Route::get('hoan-thanh', [
        'as' => 'client.home.complete',
        'uses' => 'CartController@complete'
    ]);
    
    Route::get('thanh-toan', [
        'as' => 'client.home.checkout',
        'uses' => 'CartController@checkout'
    ]);
});


Route::get('lien-he', [
    'as' => 'client.home.contact',
    'uses' => 'HomeController@contact'
]);


Route::group(['prefix' => 'san-pham'], function() {
    Route::get('{id}', [
        'as' => 'client.home.detail',
        'uses' => 'HomeController@detail'
    ]);
});

