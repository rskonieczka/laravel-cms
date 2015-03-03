<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Category\Http\Controllers', 'before' => 'auth.login'), function () {
    // Cateogry routing
    Route::post('category/changeorder', 'CategoryController@postChangeorder');
    Route::get('category/changeorder', 'CategoryController@getChangeorder');
    Route::post('category/unhide/{id}', array('as' => 'admin.category.unhide', 'uses' => 'CategoryController@postUnhide'));
    Route::post('category/hide/{id}', array('as' => 'admin.category.hide', 'uses' => 'CategoryController@postHide'));
    Route::resource('category', 'CategoryController');
});