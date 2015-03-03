<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Product\Http\Controllers', 'before' => 'auth.login'), function () {
	// Post routing
	Route::get('product/datatable', array('as' => 'admin.product.datatable', 'uses' => 'ProductController@getDatatable'));
	Route::resource('product', 'ProductController');
});