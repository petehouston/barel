<?php

Route::group([
    'middleware' => ['admin.auth:admin']
], function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.login');
    Route::get('/register', 'AuthController@showRegistrationForm')->name('admin.register');

    Route::post('/login', 'AuthController@login')->name('admin.login.post');
    Route::post('/register', 'AuthController@register')->name('admin.register.post');
});

Route::group([
    'middleware' => ['admin.guest:admin']
], function () {
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');

    Route::get('/', 'HomeController@home')->name('admin.home');
});