<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'api'
], function ($router) {

    Route::group([
        'prefix' => 'v1',
    ], function ($router) {
        Route::apiResources([
            'jobs' => \Selenkeys\Contacts\App\Http\Controllers\API\JobController::class,
        ], [
            'except' => ['create', 'edit',]
        ]);
    });

});
