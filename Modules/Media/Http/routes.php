<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Media\Http\Controllers', 'before' => 'auth.login'), function () {
    // Post routing
    Route::get('media/datatable/{param?}/', array('as' => 'admin.media.datatable', 'uses' => 'MediaController@getDatatable'));
    Route::resource('media', 'MediaController');
});