<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Product\Http\Controllers', 'before' => 'auth.login'), function () {
    // Post routing
    Route::any('product/insertphoto/{productId}', array('uses' => 'ProductController@insertphoto'));
    Route::any('product/deletephoto/{mediaId}/{productId}', array('uses' => 'ProductController@deletephoto'));
    Route::get('product/datatable', array('as' => 'admin.product.datatable', 'uses' => 'ProductController@getDatatable'));
    Route::resource('product', 'ProductController');
});