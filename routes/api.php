<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {

    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', 'API\UserController@login')->name('api:auth:login');

        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::post('register', 'API\UserController@register')->name('api:auth:register');
            Route::get('details', 'API\UserController@details')->name('api:auth:details');

        });
    });

});
