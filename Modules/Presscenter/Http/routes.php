<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Presscenter\Http\Controllers', 'before' => 'auth.login'), function () {
    // gallery routing
    Route::get('presscenter/datatable', array('as' => 'admin.presscenter.datatable', 'uses' => 'PresscenterController@getDatatable'));
    Route::resource('presscenter', 'PresscenterController');
});