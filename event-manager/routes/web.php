<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Admin Routes
 */

Route::group(['middleware' => ['CheckAdmin']], function (){
    Route::get('/testAdmin', 'HomeController@adminAction');
});


/**
 * Authorization Failure Route
 */

Route::get('/notAuthorized', ['as' => 'notAuthorized', 'uses' => 'HomeController@notAuthorized']);