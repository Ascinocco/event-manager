<?php

/**
 * Home page
 */
Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

/**
 * Authentication Routes
 * Login/Logout/Register/PW Reset
 */
Auth::routes();


/**
 * Authorization Failure Route
 */

Route::get('/notAuthorized', ['as' => 'notAuthorized', 'uses' => 'AuthorizationController@notAuthorized']);

/**
 * Admin Dashboard
 * List of users and events to manage
 */
Route::group(['prefix' => 'admin'], function (){
    Route::get('/testAdmin', 'AdminDashboardController@adminAction');

    Route::get('/dashboard');


});

/**
 * User Dashboard
 * List events user owns
 * List of events user is part of
 * Create Events
 */

/**
 * User Settings
 * Read/Update: password, name, email
 * Delete: Account
 */
Route::group(['prefix' => 'user'], function () {

    /**
     * Settings routes
     */
    // view and update settings
    Route::get('/settings', ['as' => 'settings', 'uses' => 'UserSettingsController@index']);
    Route::put('/settings', ['as' => 'settings', 'uses' => 'UserSettingsController@update']);
    Route::get('/getUser', ['as' => 'getUser', 'uses' => 'UserSettingsController@getUser']);

    // delete account
    Route::delete('/delete', ['as' => 'delete', 'uses' => 'UserSettingsController@delete']);

    /**
     * Dashboard routes
     */
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'UserDashboardController@index']);

    Route::get('/getOwnedEvents', ['as' => 'getOwnedEvents', 'uses' => 'UserDashboardController@getOwnedEvents']);
    Route::get('/getAttendingEvents', ['as' => 'getAttendingEvents', 'uses' => 'UserDashboardController@getAttendingEvents']);
    Route::post('/getAttendingUsers', ['as' => 'getAttendingUsers', 'uses' => 'UserDashboardController@getAttendingUsers']);

    Route::post('/createEvent', ['as' => 'createEvent', 'uses' => 'UserDashboardController@createEvent']);
    Route::delete('/deleteEvent/{id}', ['as' => 'deleteEvent', 'uses' => 'UserDashboardController@deleteEvent']);

});