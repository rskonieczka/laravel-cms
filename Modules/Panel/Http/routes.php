<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Panel\Http\Controllers', 'before' => 'auth.login'), function () {

    // Panel routing
    Route::get('panel/datatable', array('as' => 'admin.panel.datatable', 'uses' => 'PanelController@getDatatable'));
    Route::resource('panel', 'PanelController');
});