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

    Route::post('getmap','SearchMapController@getMap');
    Route::get('getCity','SearchMapController@getCity');

// public route api end

// login route api start
Route::group(['middleware' => ['auth:api']], function() {

    Route::get('approve/{id}','registerController@approve');
    
    // Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('category_list','CategoryController@list');
        Route::get('categories', 'CategoryController@index');
        Route::post('add', 'CategoryController@add');
        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('update/{id}', 'CategoryController@update');
        Route::delete('delete/{id}', 'CategoryController@destroy');
        Route::post('search', 'CategoryController@search');
    });
    // End Category

    // Type
    Route::group(['prefix' => 'types'], function () {
        Route::get('typelist', 'TypeController@TypeList');
        Route::get('type', 'TypeController@index');
        Route::post('add', 'TypeController@store');
        Route::get('edit/{id}', 'TypeController@edit');
        Route::post('update/{id}', 'TypeController@update');
        Route::delete('delete/{id}', 'TypeController@destroy');
    });
    // End Type

    // Job
    Route::group(['prefix' => 'job'], function () {
        Route::post('add', 'JobController@store');
        Route::get('index', 'JobController@index');
        Route::get('edit/{id}', 'JobController@edit');
        Route::post('update/{id}', 'JobController@update');
        Route::delete('delete/{id}', 'JobController@destroy');
    });
    // End Job

    // Facility
    Route::group(['prefix' => 'facility'], function () {
        Route::post('add', 'FacilityController@add');
        Route::get('facilities', 'FacilityController@index');
        Route::get('edit/{id}', 'FacilityController@edit');
        Route::post('update/{id}', 'FacilityController@update');
        Route::delete('delete/{id}', 'FacilityController@destroy');
        Route::post('search', 'FacilityController@search');
    });
    // End Facility

    // Customer
    Route::group(['prefix' => 'customer'], function () {
        Route::post('add', 'CustomerController@add');
        Route::post('uploadvideo', 'CustomerController@uploadvideo');
        Route::post('deletevideo', 'CustomerController@deletevideo');
        Route::get('edit/{id}', 'CustomerController@edit');
        Route::post('update/{id}','CustomerController@update');
        Route::delete('delete/{id}','CustomerController@destroy');
        Route::post('search', 'CustomerController@search');
    });
    // End Customer

    // News 
    Route::group(['prefix' => 'new'], function () {
        Route::post('add', 'PostController@add');
        Route::get('editPost/{id}', 'PostController@edit');
        Route::post('update/{id}', 'PostController@update');
        Route::delete('delete/{id}', 'PostController@delete');
    });
    // End News 

    // Medical
    Route::group(['prefix' => 'medical'], function () {
        Route::post('add', 'MedicalController@add');
        Route::get('medicalacceptance', 'MedicalController@index');
        Route::delete('delete/{id}', 'MedicalController@destroy');
        Route::get('edit/{id}', 'MedicalController@edit');
        Route::post('update/{id}', 'MedicalController@update');
    });
    // End Medical

    // Advertisement 
    Route::group(['prefix' => 'advertisement'], function () {
        Route::post('add', 'AdvertisementController@store');
        Route::get('edit/{id}', 'AdvertisementController@edit');
        Route::get('ads', 'AdvertisementController@index');
        Route::post('update/{id}', 'AdvertisementController@update');
        Route::delete('delete/{id}','AdvertisementController@destroy');
        Route::post('search', 'AdvertisementController@search');
    });
    // End Advertisement 

});
// login route api end

Route::get('getReset','registerController@getReset'); 
Route::get('getskill', 'JobApplyController@getSkills');
Route::get('skill', 'JobController@getSkill');


Route::get('newdetails/{id}', 'PostController@show');

Route::get('customers','CustomerController@index');
Route::get('custedit','CustomerController@edit');
Route::get('confirm/{id}','CustomerController@confirm');

Route::get('facilities', 'FacilityController@index');

Route::get('job_details', 'JobDetailController@index');

// Home Page
Route::get('home', 'HomeController@index');
Route::post('posts', 'HomeController@getPosts');
Route::post('get_latest_post', 'HomeController@getLatestPost');
Route::get('get_latest_post_all_cat', 'HomeController@getLatestPostFromAllCat');
Route::post('search', 'HomeController@search');


Route::get('news_list', 'PostController@index');
Route::get('newdetails/{id}', 'PostController@show');
Route::post('news_list/search', 'PostController@search');



Route::post('jobapply','JobApplyController@store');
Route::get('job_details', 'JobDetailController@index');
Route::get('job_details/{id}', 'JobDetailController@show');

// Guest Hospital History
Route::post('hospital_history/{local_sto}', 'CustomerProfileContoller@getHospitalHistory');
Route::post('favHospital/{local_sto}', 'HospitalProfileController@getFavouriteHospital');

// Guest Nursing History
// Route::post('nursing_history/{local_sto}', 'CustomerProfileContoller@getHospitalHistory');
Route::post('nursing_history/{local_sto}', 'CustomerProfileContoller@getNursingHistory');

//Route::post('add','AdvertisementController@store');

 Route::group(['prefix' => 'hospital'], function () {       
    Route::get('favourite_list', 'HospitalProfileController@index');        
    Route::delete('delete/{id}', 'HospitalProfileController@destroy');       
});

Route::group(['prefix' => 'comments'], function () {
    Route::post('add', 'CommentController@store');
    Route::get('edit/{id}', 'CommentController@edit');
    Route::get('comment', 'CommentController@index');
    Route::get('comfirm/{id}','CommentController@confirm');
    Route::post('update/{id}', 'CommentController@update');
    Route::delete('delete/{id}','CommentController@destroy');
});

Route::group(['prefix' => 'advertisement'], function () {
    Route::get('ads', 'AdvertisementController@index');
});