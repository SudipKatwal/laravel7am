<?php

Route::get('/','PublicPageController@index');

Route::group(
    [
        'namespace' => 'Back',
        'prefix'    => 'admin',
        'as'        => 'admin.',
        'middleware'=> 'auth'
    ],
    function()
    {
        Route::get('/','DashboardController@index');
        Route::get('add-user','DashboardController@addUserForm');
        Route::post('add-user','DashboardController@addUser');
        Route::get('users','DashboardController@users');
        Route::delete('users/{id}','DashboardController@delete');
        Route::get('users/{id}/edit','DashboardController@edit');
        Route::put('users/{id}','DashboardController@update');
        Route::resource('posts','PostsController');
        Route::get('users/change-password','DashboardController@changePasswordForm')->name('change.password');
        Route::post('users/change-password','DashboardController@changePassword');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
