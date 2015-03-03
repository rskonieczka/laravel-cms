<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Gallery\Http\Controllers', 'before' => 'auth.login'), function () {
    // gallery routing
    Route::get('gallery/datatable', array('as' => 'admin.gallery.datatable', 'uses' => 'GalleryController@getDatatable'));
    Route::resource('gallery', 'GalleryController');
});