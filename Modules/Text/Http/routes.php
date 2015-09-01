<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Text\Http\Controllers', 'before' => 'auth.login'), function () {
    // Text routing
    Route::get('text/datatable/{id?}', array('as' => 'admin.text.datatable', 'uses' => 'TextController@getDatatable'));
    Route::get('text/{id}', array('as' => 'admin.text.list', 'uses' => 'TextController@index'))->where('id', '[0-9]+');
    Route::get('text/create/{categoryId}', array('as' => 'admin.text.list', 'uses' => 'TextController@index'))->where('id', '[0-9]+')->where('categoryId', '[0-9]+');
    Route::resource('text', 'TextController');
});