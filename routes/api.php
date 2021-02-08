<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'V1',
    'prefix' => '1/',
    'as' => 'v1.'
], function () {

    // Users Routes
    Route::post('login', 'UserController@login')->name('login');


    Route::middleware('auth:api')->group(function () {
        // Projects Routes
        Route::apiResource('projects', 'ProjectController');

        // Users Routes
        Route::apiResource('users', 'UserController');

    });
});
