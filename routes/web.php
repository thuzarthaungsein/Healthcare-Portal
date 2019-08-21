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







Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('categories','CategoryController');
    // Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();

Route::get('{any}', function () {return view('app');})->where('any', '.*');
