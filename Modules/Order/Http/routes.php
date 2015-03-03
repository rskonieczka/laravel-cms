<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Order\Http\Controllers', 'before' => 'auth.login'), function () {
	// gallery routing
	Route::get('order/datatable', array('as' => 'admin.order.datatable', 'uses' => 'OrderController@getDatatable'));
	Route::resource('order', 'OrderController');
});