<?php

Route::view('/', 'index');

Route::prefix('people')->group(function () {
    Route::get('view/', 'PeopleController@index');
    Route::post('add/', 'PeopleController@add');
//    Route::post('add/{day}/{month}/{people_id}', 'PeopleController@add');
    Route::patch('edit/{day}/{month}/{people_id}', 'PeopleController@edit');
    Route::delete('delete/{day}/{month}/{people_id}', 'PeopleController@destroy');
});
