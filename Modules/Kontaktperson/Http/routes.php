<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Kontaktperson\Http\Controllers', 'before' => 'auth.login'), function () {
    // gallery routing
    Route::get('kontaktperson/datatable', array('as' => 'admin.kontaktperson.datatable', 'uses' => 'KontaktpersonController@getDatatable'));
    Route::resource('kontaktperson', 'KontaktpersonController');
});