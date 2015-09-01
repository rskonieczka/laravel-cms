<?php

if(Request::segment(1)){
    if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

        App::setLocale(Request::segment(1));
        Config::set('app.locale_prefix', Request::segment(1));
    }
}


Route::get('importproducts', array('uses' => 'App\Controllers\ImportController@importProducts'));
Route::get('importnews', array('uses' => 'App\Controllers\ImportController@importNewsToCn'));
Route::get('exportknowledge', array('uses' => 'App\Controllers\ImportController@importKnowledgeToCn'));
Route::post('ajax/sendContactEmail', array('uses' => 'App\Controllers\AjaxController@sendContactEmail'));
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
Route::group(array('prefix' => Config::get('app.locale_prefix')), function()
{
    Route::any('{slug}', array('uses' => 'App\Controllers\FrontController@index', 'before' => 'knowledge'))
        ->where('slug', 'wady-aplikacyjne|wady-eksploatacyjne|wady-aplikacyjno-eksploatacyjne|application-failures|operating-failures|operating-application-failures|anwendung-nachteile|dokumentation|anwendung-aussere-einwirkungen|falscheanwendungunsaussere-einwirkungen');
    Route::any('{slug?}/{id?}/{slug2?}', array('uses' => 'App\Controllers\FrontController@index'));
});