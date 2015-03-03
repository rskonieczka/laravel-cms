<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Site\Http\Controllers', 'before' => 'auth.login'), function () {
    // Site routing
    Route::get('site/datatable', array('as' => 'admin.site.datatable', 'uses' => 'SiteController@getDatatable'));
    Route::resource('site', 'SiteController');
});