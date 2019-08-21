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

Route::get('jobs', 'JobController@index');
Route::get('facilities', 'FacilityController@index');



Route::group(['prefix' => 'facility'], function () {

    Route::post('add', 'FacilityController@add');  
    Route::get('edit/{id}', 'FacilityController@edit');
    Route::delete('delete/{id}', 'FacilityController@destroy');
});
