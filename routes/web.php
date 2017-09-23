<?php

Route::view('/', 'index');

Route::prefix('people')->group(function () {
    Route::get('view/', 'PeopleController@index');
    Route::get('view/{day}/{month}', 'PeopleController@show');
    Route::post('add/{day}/{month}/{people_id}', 'PeopleController@create');
    Route::patch('edit/{day}/{month}/{people_id}', 'PeopleController@edit');
    Route::delete('delete/{day}/{month}/{people_id}', 'PeopleController@destroy');
});
