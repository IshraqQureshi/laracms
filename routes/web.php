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

// Auth Routes
Route::group(['middleware' => 'guest', 'prefix' => 'sitecontrol','namespace' => 'Sitecontrol\Auth'], function(){

    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@getLogin')->name('getLogin');

});
// Auth Route

// Admin Route
Route::group(['middleware' => 'auth', 'prefix' => 'sitecontrol','namespace' => 'Sitecontrol'], function(){

    // Logout Route
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    // Logout Route

    // Manage Dashboard
        Route::group(['prefix' => 'managedashboard','namespace' => 'Dashboard'], function(){
            Route::get('/', 'Controls@index')->name('dashboard');    
        });
    // Manage Dashboard

    // Manage Settings
        Route::group(['prefix' => 'managesettings','namespace' => 'Setting'], function(){
            Route::get('/', 'Controls@index')->name('settings');
            Route::post('/save-settings', 'Controls@save')->name('saveSettings');
        });
    // Manage Settings

});
// Admin Routes
