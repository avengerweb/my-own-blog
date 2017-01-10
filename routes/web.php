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

Route::get('/', "HomeController@welcome");
Route::get('/posts/{slug}', "HomeController@getPost");

Route::group(["prefix" => "user"], function() {

    // Authentication routes...
    Route::auth();
    Route::get('logout', 'Auth\LoginController@logout');
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

    Route::group(["prefix" => "blog", "middleware" => "access:posts_manage"], function() {
        Route::resource('categories', 'Admin\CategoriesController');
        Route::resource("posts", "Admin\PostsController");
    });

    Route::resource("pages", "Admin\PagesController");

    Route::group(["prefix" => "user"], function() {
        Route::resource('manage', 'Admin\UsersController');
        Route::resource('permissions', 'Admin\PermissionsController');
    });
});

Route::get('/{url}', "HomeController@getPage");