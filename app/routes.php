<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// Admin routes
Route::group(array('prefix' => 'admin', 'namespace' => 'App\Controllers\Admin', 'before' => 'auth.login'), function () {

    Route::any('dashboard/view', array('as' => 'admin.dashboard.view', 'uses' => 'DashboardController@getView'));
	Route::any('user/list', array('as' => 'admin.user.list', 'uses' => 'UserController@getList'));

    App::missing(function($code)
    {
        return App::make('App\Controllers\Admin\AdminController')->callAction('showError', array($code));
    });
});

Route::any('send-email', array('uses' => 'App\Controllers\HomeController@sendEmail'));
Route::any('validateSurveyForm', array('uses' => 'App\Controllers\AjaxLandingController@validateSurveyForm'));
Route::any('{slug?}/{id?}/{slug2?}', array('uses' => 'App\Controllers\HomeController@index'));