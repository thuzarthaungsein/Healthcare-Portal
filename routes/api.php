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



// public route api start

    // ........

// public route api end












// login route api start
Route::group(['middleware' => ['auth']], function() {

    Route::get('approve/{id}','registerController@approve');

});
// login route api end






Route::get('getReset','registerController@getReset');



Route::get('jobs', 'JobController@index');
Route::get('getskill', 'JobApplyController@getSkills');
Route::get('skill', 'JobController@getSkill');
Route::post('getmap','adminController@getMap');
Route::get('customers','CustomerController@index');
Route::get('categories','CategoryController@index');
Route::get('custedit','CustomerController@edit');
Route::get('newdetails/{id}', 'PostController@show');

Route::post('getmap','adminController@getMap');
Route::get('customers','CustomerController@index');
Route::get('categories','CategoryController@index');
Route::get('confirm/{id}','CustomerController@confirm');
Route::get('facilities', 'FacilityController@index');

Route::group(['prefix' => 'facility'], function () {
    Route::post('add', 'FacilityController@add');
    Route::get('facilities', 'FacilityController@index');
    Route::get('edit/{id}', 'FacilityController@edit');
    Route::post('update/{id}', 'FacilityController@update');
    Route::delete('delete/{id}', 'FacilityController@destroy');
});


Route::group(['prefix' => 'job'], function () {
    Route::post('add', 'JobController@store');
    Route::get('index', 'JobController@index');
    Route::get('edit/{id}', 'JobController@edit');
    Route::post('update/{id}', 'JobController@update');
    Route::delete('delete/{id}', 'JobController@destroy');
});

Route::get('job_details', 'JobDetailController@index');

Route::group(['prefix' => 'customer'], function () {
    Route::post('add', 'CustomerController@add');
    Route::get('edit/{id}', 'CustomerController@edit');
    Route::post('update/{id}','CustomerController@update');
    Route::delete('delete/{id}','CustomerController@destroy');
});



Route::group(['prefix' => 'category'], function () {
    Route::get('category_list','CategoryController@list');
    Route::get('categories', 'CategoryController@index');
    Route::post('add', 'CategoryController@add');
    Route::get('edit/{id}', 'CategoryController@edit');
    Route::post('update/{id}', 'CategoryController@update');
    Route::delete('delete/{id}', 'CategoryController@destroy');
});

Route::get('job_details', 'JobDetailController@index');
// Home Page
Route::get('home', 'HomeController@index');
Route::get('posts/{cat_id}', 'HomeController@getPosts');
Route::get('get_latest_post/{cat_id}', 'HomeController@getLatestPost');
Route::get('get_latest_post_all_cat', 'HomeController@getLatestPostFromAllCat');


Route::get('news_list', 'PostController@index');
Route::get('newdetails/{id}', 'PostController@show');
Route::get('jobs', 'JobController@index');
Route::get('news_list', 'PostController@index');


Route::group(['prefix' => 'new'], function () {
    Route::post('add', 'PostController@add');
    Route::get('editPost/{id}', 'PostController@edit');
    Route::post('update/{id}', 'PostController@update');
    Route::delete('delete/{id}', 'PostController@delete');
});
Route::post('jobapply','JobApplyController@store');
Route::get('jobs', 'JobController@index');
Route::get('job_details', 'JobDetailController@index');
Route::get('job_details/{id}', 'JobDetailController@show');
//Route::post('add','AdvertisementController@store');
Route::group(['prefix' => 'advertisement'], function () {
    Route::post('add', 'AdvertisementController@store');
});

Route::group(['prefix' => 'types'], function () {
    Route::get('typelist', 'TypeController@TypeList');
    Route::get('type', 'TypeController@index');
    Route::post('add', 'TypeController@store');
    Route::get('edit/{id}', 'TypeController@edit');
    Route::post('update/{id}', 'TypeController@update');
    Route::delete('delete/{id}', 'TypeController@destroy');
// Guest Hospital History
Route::get('hospital_history', 'CustomerProfileContoller@getHospitalHistory');

Route::group(['prefix' => 'medical'], function () {
    Route::post('add', 'MedicalController@add');
    Route::get('medicalacceptance', 'MedicalController@index');
    Route::delete('delete/{id}', 'MedicalController@destroy');
    Route::get('edit/{id}', 'MedicalController@edit');
    Route::post('update/{id}', 'MedicalController@update');
});

 Route::group(['prefix' => 'advertisement'], function () {
     Route::post('add', 'AdvertisementController@store');
     Route::get('edit/{id}', 'AdvertisementController@edit');
     Route::get('ads', 'AdvertisementController@index');
     Route::post('update/{id}', 'AdvertisementController@update');
     Route::delete('delete/{id}','AdvertisementController@destroy');
 });

});
