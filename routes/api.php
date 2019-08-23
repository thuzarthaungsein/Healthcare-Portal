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
<<<<<<< HEAD
Route::get('newdetails/{id}', 'PostController@show');


=======

Route::get('customers','CustomerController@index');
Route::get('categories','CategoryController@index');
Route::get('custedit','custedit@edit');
Route::get('facilities', 'FacilityController@index');
>>>>>>> 9f9ba695b534ad97745a66823f71503c1e8d4c8f
Route::group(['prefix' => 'facility'], function () {
    Route::post('add', 'FacilityController@add');
    Route::get('facilities', 'FacilityController@index');
    Route::post('add', 'FacilityController@add');
    Route::get('edit/{id}', 'FacilityController@edit');
    Route::post('update/{id}', 'FacilityController@update');
    Route::delete('delete/{id}', 'FacilityController@destroy');
});
Route::get('job_details', 'JobDetailController@index');

Route::group(['prefix' => 'customer'], function () {
    Route::get('edit/{id}', 'CustomerController@edit');
    Route::post('update/{id}','CustomerController@update');
    Route::delete('delete/{id}','CustomerController@destroy');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('categories', 'CategoryController@index');
    Route::post('add', 'CategoryController@add');
    Route::get('edit/{id}', 'CategoryController@edit');
    Route::post('update/{id}', 'CategoryController@update');
    Route::delete('delete/{id}', 'CategoryController@destroy');
});

<<<<<<< HEAD
Route::get('job_details', 'JobDetailController@index');
=======
// Home Page
Route::get('home', 'HomeController@index');
Route::get('posts/{cat_id}', 'HomeController@getPosts');
Route::get('get_latest_post/{cat_id}', 'HomeController@getLatestPost');
Route::get('get_latest_post_all_cat', 'HomeController@getLatestPostFromAllCat');


Route::get('news_list', 'PostController@index');
Route::get('newdetails', 'PostController@index');
>>>>>>> 9f9ba695b534ad97745a66823f71503c1e8d4c8f
Route::get('jobs', 'JobController@index');
Route::get('news_list', 'PostController@index');


Route::group(['prefix' => 'new'], function () {
    Route::post('add', 'PostController@add');
    Route::get('editPost/{id}', 'PostController@edit');
    Route::post('update/{id}', 'PostController@update');
    Route::delete('delete/{id}', 'PostController@delete');
});
<<<<<<< HEAD
=======

Route::get('jobs', 'JobController@index');
Route::get('job_details', 'JobDetailController@index');
Route::get('job_details/{id}', 'JobDetailController@show');
>>>>>>> 9f9ba695b534ad97745a66823f71503c1e8d4c8f
