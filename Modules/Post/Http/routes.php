<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Post\Http\Controllers', 'before' => 'auth.login'), function () {
    // Post routing
    Route::get('post/datatable', array('as' => 'admin.post.datatable', 'uses' => 'PostController@getDatatable'));
    Route::resource('post', 'PostController');
});