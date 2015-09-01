<?php

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Knowledge\Http\Controllers', 'before' => 'auth.login'), function () {
    // gallery routing
    Route::get('knowledge/datatable', array('as' => 'admin.knowledge.datatable', 'uses' => 'KnowledgeController@getDatatable'));
    Route::resource('knowledge', 'KnowledgeController');
});