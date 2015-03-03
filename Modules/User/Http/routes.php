<?php

Route::post('user/autocreate', array('as' => 'user.autocreate', 'uses' => 'UserController@createFromEmail'));

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\User\Http\Controllers', 'before' => 'auth.login'), function () {
    // Text routing
    Route::get('user/datatable', array('as' => 'admin.user.datatable', 'uses' => 'UserController@getDatatable'));
    Route::resource('user', 'UserController');
});


Route::get('auth/activate/{email?}/{code?}', array('as' => 'auth.activate', 'uses' => 'Modules\User\Http\Controllers\AuthController@getActivate'));
Route::get('auth/logout', array('as' => 'auth.logout', 'uses' => 'Modules\User\Http\Controllers\AuthController@getLogout'));

Route::group(array('namespace' => 'Modules\User\Http\Controllers', 'before' => 'auth.checkout'), function () {
    Route::get('auth/login', array('as' => 'auth.login', 'uses' => 'AuthController@getLogin'));
    Route::post('auth/login', array('as' => 'auth.login', 'uses' => 'AuthController@postLogin'));

});