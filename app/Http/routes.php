<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "HomeController@welcome");

Route::group(["prefix" => "user"], function() {

    // Authentication routes...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::controllers(['password' => 'Auth\PasswordController']);

});

Route::group(["prefix" => "api/0.1/"], function() {
    Route::group(["prefix" => "posts"], function() {
        Route::get("list", "HomeController@index");
    });
});

Route::group(["prefix" => "admin", "middleware" => "access:dashboard_view"], function() {
    Route::get("/", "DashboardController@index");

    // Profile edit
    Route::get("/profile", "DashboardController@getCurrentProfile");
    Route::post("/profile", "DashboardController@postCurrentProfile");

    // Profile edit
    Route::get("/settings", "DashboardController@getConfigEdit");
    Route::post("/settings", "DashboardController@postConfigEdit");
});
