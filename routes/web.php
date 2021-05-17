<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest', 'prefix' => 'sitecontrol','namespace' => 'Sitecontrol\Auth'], function(){

    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@getLogin')->name('getLogin');

});

Route::group(['middleware' => 'auth', 'prefix' => 'sitecontrol','namespace' => 'Sitecontrol'], function(){

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'managedashboard','namespace' => 'Dashboard'], function(){
        Route::get('/', 'Controls@index')->name('dashboard');    
    });

});
