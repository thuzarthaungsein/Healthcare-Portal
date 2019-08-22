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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'facility'], function () {
    Route::get('facilities', 'FacilityController@index');
    Route::post('add', 'FacilityController@add');  
    Route::get('edit/{id}', 'FacilityController@edit');
    Route::post('update/{id}', 'FacilityController@update');
    Route::delete('delete/{id}', 'FacilityController@destroy');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('categories', 'CategoryController@index');
    Route::post('add', 'CategoryController@add');  
    Route::get('edit/{id}', 'CategoryController@edit');
    Route::post('update/{id}', 'CategoryController@update');
    Route::delete('delete/{id}', 'CategoryController@destroy');
});

Route::get('job_details', 'JobDetailController@index');
Route::get('jobs', 'JobController@index');