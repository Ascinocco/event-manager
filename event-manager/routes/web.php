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
    // view and update settings
    Route::get('/settings', 'UserController@index');
    Route::put('/settings', 'UserController@update');

    // delete account
    Route::delete('/delete', 'UserController@delete');
});

/**
 * Event settings
 * Update: Event name, user invitations, date
 * Read: Event name, accepted/declined/pending invitations
 * Delete: Users from event, event itself
 */



Route::get('/home', 'HomeController@index');