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
            'emails' => \Selenkeys\Contacts\App\Http\Controllers\API\EmailController::class,
            'phones' => \Selenkeys\Contacts\App\Http\Controllers\API\PhoneController::class,
            'companies' => \Selenkeys\Contacts\App\Http\Controllers\API\CompanyController::class,
            'jobs' => \Selenkeys\Contacts\App\Http\Controllers\API\JobController::class,
        ], [
            'except' => ['create', 'edit',]
        ]);
    });

});
