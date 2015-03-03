<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\People\Http\Controllers', 'before' => 'auth.login'), function () {

    // Panel routing
    Route::get('people/datatable', array('as' => 'admin.people.datatable', 'uses' => 'PeopleController@getDatatable'));
    Route::resource('people', 'PeopleController');
});