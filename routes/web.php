<?php

Route::view('/', 'index');

Route::prefix('people')->group(function () {
    Route::get('view/', 'PeopleController@index');
    Route::post('add/', 'PeopleController@add');
    Route::post('edit/', 'PeopleController@edit');
    Route::post('delete/', 'PeopleController@destroy');
});
