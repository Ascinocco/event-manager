<?php

/**
 * Home page
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Authentication Routes
 * Login/Logout/Register/PW Reset
 */
Auth::routes();


/**
 * Authorization Failure Route
 */

Route::get('/notAuthorized', ['as' => 'notAuthorized', 'uses' => 'HomeController@notAuthorized']);

/**
 * Admin Dashboard
 * List of users and events to manage
 */
Route::group(['middleware' => ['CheckAdmin']], function (){
    Route::get('/testAdmin', 'HomeController@adminAction');

    Route::get('/adminDashboard');


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

    // delete account
    Route::delete('/delete', ['as' => 'delete', 'uses' => 'UserSettingsController@delete']);

    /**
     * Dashboard routes
     */
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'UserDashboardController@index']);

    Route::get('/getOwnedEvents', ['as' => 'getOwnedEvents', 'uses' => 'UserDashboardController@getOwnedEvents']);

    Route::post('createEvent', ['as' => 'createEvent', 'uses' => 'UserDashboardController@createEvent']);


});

/**
 * Event settings
 * Update: Event name, user invitations, date
 * Read: Event name, accepted/declined/pending invitations
 * Delete: Users from event, event itself
 */



Route::get('/home', 'HomeController@index');