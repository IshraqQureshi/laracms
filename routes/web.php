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

    // Manage Pages
        Route::group(['prefix' => 'managepages','namespace' => 'Pages'], function(){
            Route::get('/', 'Controls@index')->name('pages');
            Route::get('/create', 'Controls@create')->name('createPage');
            Route::get('/edit/{page_id}', 'Controls@edit')->name('editPage');
            Route::post('/save', 'Controls@save')->name('savePage');
            Route::get('/delete/{page_id}', 'Controls@delete')->name('deletePage');
        });
    // Manage Pages

    // Manage Posts
        Route::group(['prefix' => 'manageposts','namespace' => 'Posts'], function(){
            Route::get('/', 'Controls@index')->name('posts');
            Route::get('/create', 'Controls@create')->name('createPost');
            Route::get('/edit/{post_id}', 'Controls@edit')->name('editPost');
            Route::post('/save', 'Controls@save')->name('savePost');
            Route::get('/delete/{post_id}', 'Controls@delete')->name('deletePost');
        });
    // Manage Posts

    // Manage Categories
        Route::group(['prefix' => 'managecategories','namespace' => 'Categories'], function(){
            Route::get('/', 'Controls@index')->name('categories');
            Route::get('/create', 'Controls@create')->name('createCategory');
            Route::get('/edit/{category_id}', 'Controls@edit')->name('editCategory');
            Route::post('/save', 'Controls@save')->name('saveCategory');
            Route::get('/delete/{category_id}', 'Controls@delete')->name('deleteCategory');
        });
    // Manage Categories

});
// Admin Routes

// Frontend Routes
Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function(){

    Route::get('/', 'HomepageController@index')->name('hompage');

});
// Frontend Routes
