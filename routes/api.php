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

Route::group(['middleware' => ['auth']], function() {

});



// public route api start

    Route::post('getmap/{id}','SearchMapController@getMap');
    Route::get('getjobsearch','SearchMapController@getJobSearch');
    Route::post('getmaptownship/{id}','SearchMapController@getMapTownship');

    Route::get('getCity','SearchMapController@getCity');

// public route api end

// login route api start
Route::group(['middleware' => ['auth:api']], function() {

    Route::group(['prefix' => 'profile'], function () {
        Route::get('approve/{id}','registerController@approve');
    });

    // Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('categories', 'CategoryController@index');
        Route::post('add', 'CategoryController@add');
        Route::get('edit/{id}', 'CategoryController@edit');
        Route::post('update/{id}', 'CategoryController@update');
        Route::delete('delete/{id}', 'CategoryController@destroy');
    });
    // End Category

    // Station
    Route::group(['prefix' => 'station'], function () {
        Route::get('stations', 'StationController@index');
        Route::post('add', 'StationController@add');
        Route::get('edit/{id}', 'StationController@edit');
        Route::post('update/{id}', 'StationController@update');
        Route::delete('delete/{id}', 'StationController@destroy');
        Route::post('search','StationController@search');
    });
    // End Station

    // Type
    Route::group(['prefix' => 'types'], function () {
        Route::get('typelist', 'TypeController@TypeList');
        Route::get('type', 'TypeController@index');
        Route::post('add', 'TypeController@store');
        Route::get('edit/{id}', 'TypeController@edit');
        Route::post('update/{id}', 'TypeController@update');
        Route::delete('delete/{id}', 'TypeController@destroy');
        Route::post('search', 'TypeController@search');
    });

       // occupation
       Route::group(['prefix' => 'occupation'], function () {
        Route::get('occupationList', 'OccupationsController@TypeList');
        Route::get('type', 'OccupationsController@index');
        Route::post('add', 'OccupationsController@store');
        Route::get('edit/{id}', 'OccupationsController@edit');
        Route::post('update/{id}', 'OccupationsController@update');
        Route::delete('delete/{id}', 'OccupationsController@destroy');
        Route::post('search', 'OccupationsController@search');
    });


    // End Type

    //Subject
    Route::group(['prefix' => 'subjects'], function () {
        Route::get('subjectlist', 'SubjectController@SubjectList');
        Route::get('subject', 'SubjectController@index');
        Route::post('add', 'SubjectController@store');
        Route::get('edit/{id}', 'SubjectController@edit');
        Route::post('update/{id}', 'SubjectController@update');
        Route::delete('delete/{id}', 'SubjectController@destroy');
        Route::post('search', 'SubjectController@search');
    });
    //End Subject

    // Job
    Route::group(['prefix' => 'job'], function () {
        Route::post('add', 'JobController@store');
        Route::get('index', 'JobController@index');
        Route::get('edit/{id}', 'JobController@edit');
        Route::get('occupationlist', 'JobController@getOccupationList');
        Route::post('update/{id}', 'JobController@update');
        Route::delete('delete/{id}', 'JobController@destroy');
        Route::post('search', 'JobController@search');
    });
    // End Job

    // Facility
    Route::group(['prefix' => 'facility'], function () {
        Route::post('add', 'FacilityController@add');
        Route::get('facilities', 'FacilityController@index');
        Route::get('edit/{id}', 'FacilityController@edit');
        Route::post('update/{id}', 'FacilityController@update');
        Route::delete('delete/{id}', 'FacilityController@destroy');
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
    });
    // End Customer

    // News
    Route::group(['prefix' => 'new'], function () {
        Route::post('add', 'PostController@add');
        Route::get('editPost/{id}', 'PostController@edit');
        Route::post('update/{id}', 'PostController@update');
        Route::delete('delete/{id}', 'PostController@delete');
        Route::post('getPostsByCatId/{id}', 'PostController@getPostById');

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
        // Route::get('ads', 'AdvertisementController@index');
        Route::post('update/{id}', 'AdvertisementController@update');
        Route::delete('delete/{id}','AdvertisementController@destroy');
    });
    // End Advertisement


    //SpecialFeature
    Route::group(['prefix' => 'feature'], function () {
        Route::post('add', 'SpecialFeatureController@store');
        Route::get('edit/{id}', 'SpecialFeatureController@edit');
        Route::get('featurelist', 'SpecialFeatureController@index');
        Route::get('nursing-feature/{type}', 'SpecialFeatureController@getFeaturebyProfileType');
        Route::post('update/{id}', 'SpecialFeatureController@update');
        Route::delete('delete/{id}','SpecialFeatureController@destroy');
        Route::post('search','SpecialFeatureController@search');
    });
    //End SpecialFeature

});
// login route api end

Route::group(['prefix' => 'profile'], function () {
    Route::get('nursing/{cusid}','ProfilePublishController@nursingProfile');
    Route::get('hospital/{cusid}','ProfilePublishController@hospitalProfile');
    Route::get('specialfeature/{type}/{cusid}','ProfilePublishController@getSpecialfeature');
    Route::get('comment/{cusid}','ProfilePublishController@getComment');
    Route::get('customer/{cusid}/{type}','ProfilePublishController@getCustomer');
    Route::get('schedule/{cusid}','ProfilePublishController@getSchedule');
    // Route::get('hosfacility','ProfilePublishController@getHosfacilities');
    Route::get('subject/{cusid}','ProfilePublishController@getSubject');
});
Route::group(['prefix' => 'job'], function () {
    Route::get('getjob/{id}', 'JobController@getJob');
    Route::post('search', 'JobController@search');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('category_list','CategoryController@list');
    Route::post('search', 'CategoryController@search');
});

Route::group(['prefix' => 'advertisement'], function () {
    Route::post('search', 'AdvertisementController@search');
    Route::get('ads', 'AdvertisementController@index');
});

Route::group(['prefix' => 'facility'], function () {
    Route::post('search', 'FacilityController@search');
});

Route::group(['prefix' => 'customer'], function () {
    Route::post('search', 'CustomerController@search');
});

Route::get('getReset','registerController@getReset');
Route::get('getskill', 'JobApplyController@getSkills');
Route::get('skill', 'JobController@getSkill');
Route::get('customers','CustomerController@index');
Route::get('custedit','CustomerController@edit');
Route::get('confirm/{id}','CustomerController@confirm');
Route::get('facilities', 'FacilityController@index');
Route::get('job_details', 'JobDetailController@index');
Route::get('featurelist', 'SpecialFeatureController@index');

Route::get('feature/{type}/{id}','SpecialFeatureController@getFeaturebyProfileType');
Route::post('feature/update/{id}','SpecialFeaturesJunctionsController@update');

Route::get('facility/{type}/{id}','FacilityController@getFacilitybyProfileType');
Route::get('clinical-subject/{id}','SubjectController@getHospitalClinicalSubject');
Route::get('station/{id}','StationController@getStationbyCustomerId');

Route::get('hospital-pgallery/{id}','GalleryController@getPhotobyCustomerId');
Route::get('hospital-vgallery/{id}','GalleryController@getVideobyCustomerId');

Route::get('nursing-pgallery/{id}','GalleryController@getPhotobyCustomerId');
Route::get('nursing-vgallery/{id}','GalleryController@getVideobyCustomerId');
Route::post('nursing/movephoto','NursingProfileController@movePhoto');
Route::post('hospital/movephoto','HospitalProfileController@movePhoto');

Route::get('nursing-cooperate/{id}','CooperateMedicalController@getCooperateByCustomerId');
Route::get('nursing-payment/{id}','PaymentMethodController@getPaymentByCustomerId');

Route::get('customerinfo/{id}','CustomerController@edit');
Route::get('nursinginfo/{id}','NursingProfileController@edit');
Route::get('hospitalinfo/{id}','HospitalProfileController@edit');
Route::get('staffinfo/{id}', 'ProfilePublishController@getStaffbyCustomerId');

Route::post('nursing/galleryupdate/{id}', 'NursingProfileController@galleryupdate');
Route::post('hospital/galleryupdate/{id}', 'HospitalProfileController@galleryupdate');

Route::post('nursing/cooperate/{id}', 'NursingProfileController@cooperateupdate');
Route::post('nursing/paymentmethod/{id}', 'NursingProfileController@paymentupdate');

Route::post('nursing/profile/{id}', 'NursingProfileController@profileupdate');
Route::post('hospital/profile/{id}', 'HospitalProfileController@profileupdate');

Route::post('schedule/update/{id}', 'ScheduleController@update');
Route::get('schedule/{id}', 'ScheduleController@getSchedulebyCustomerId');

Route::post('customer/profile/{id}', 'NursingProfileController@Customerprofileupdate');
Route::post('staff/profile/{id}', 'NursingProfileController@Staffprofileupdate');
Route::post('acceptance/transactions/{id}', 'NursingProfileController@AcceptanceTransactions');

Route::get('medical/acceptancewithtransactions/{id}', 'MedicalController@getAcceptanceWithTransactions');

// Home Page
Route::get('home', 'HomeController@index');
Route::post('posts', 'HomeController@getPosts');
Route::post('get_latest_post', 'HomeController@getLatestPost');
Route::get('get_latest_post_all_cat', 'HomeController@getLatestPostFromAllCat');
Route::post('search', 'HomeController@search');
Route::get('get_latest_posts_by_catId', 'HomeController@getLatestPostsByAllCatId');


Route::get('news_list', 'PostController@index');
Route::get('newdetails/{id}', 'PostController@show');
Route::get('relatednews/{id}', 'PostController@show_related');
// Route::get('newsdetailsrelated/{id}','PostController@relatednews');
Route::post('news_list/search', 'PostController@search');

Route::post('jobapply','JobApplyController@store');
Route::get('jobapplylist','JobApplyController@index');
Route::get('job_details', 'JobDetailController@index');
Route::get('job_details/{id}', 'JobDetailController@show');

// Guest Hospital History
Route::post('hospital_history/{local_sto}', 'CustomerProfileContoller@getHospitalHistory');
Route::post('favHospital/{local_sto}', 'HospitalProfileController@getFavouriteHospital');

// Guest Nursing History
// Route::post('nursing_history/{local_sto}', 'CustomerProfileContoller@getHospitalHistory');
Route::post('nursing_history/{local_sto}', 'CustomerProfileContoller@getNursingHistory');
Route::post('nursing_fav/{local_sto}', 'HospitalProfileController@getFavouriteNursing');

Route::post('news/search/{searchword}', 'PostController@searchPost');

Route::group(['prefix' => 'hospital'], function () {
    Route::post('postList/{postal}', 'HospitalProfileController@getPostalList');
    Route::get('citiesList', 'HospitalProfileController@getCitiesName');
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

Route::group(['prefix' => 'nurse'], function () {
    Route::post('add', 'NursingMailController@mail');
    Route::get('edit/{id}', 'NursingMailController@edit');
    Route::get('comment', 'NursingMailController@index');
    Route::get('comfirm/{id}','NursingMailController@confirm');
    Route::post('update/{id}', 'NursingMailController@update');
    Route::delete('delete/{id}','NursingMailController@destroy');
});

Route::group(['prefix' => 'new'], function () {
    Route::post('getPostsByCatId/{id}', 'PostController@getPostById');
});

Route::get('cost','ProfilePublishController@getCost');
Route::get('hospital','ProfilePublishController@hospital');

