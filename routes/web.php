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

Route::get('registerForm','registerController@index');
Route::get('passwordReset','registerController@reset');
Route::post('register/store','registerController@store');
Route::post('reset','registerController@insertUesr');
Route::get('ajax-cities','registerController@getTownship');
Route::get('ajax-type','registerController@getType');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('categories','CategoryController');
    // admin home page

});

Auth::routes();

Route::get('{any}', function () {return view('app');})->where('any', '.*');
