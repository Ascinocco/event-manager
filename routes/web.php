<?php

Auth::routes();

Route::get('/', 'HomeController@landing');

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function() {
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/settings', 'UserSettingsController@index');
});


