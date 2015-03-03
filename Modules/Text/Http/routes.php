<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Text\Http\Controllers', 'before' => 'auth.login'), function () {
    // Text routing
    Route::get('text/datatable', array('as' => 'admin.text.datatable', 'uses' => 'TextController@getDatatable'));
    Route::resource('text', 'TextController');
});