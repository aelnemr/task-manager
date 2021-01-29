<?php

use Illuminate\Support\Facades\Route;


//Route::get('1/users', [UserController::class, 'index']);
//Route::get('1/users/{user}', [\App\Http\Controllers\API\V1\UserController::class, 'show']);



/*Route::namespace('App\\Http\\Controllers\\API\\V1\\')->group(function () {

    Route::prefix('1/users')->group(function () {

        Route::as('api.v1.users.')->group(function () {

            Route::get('/', 'UserController@index')->name('index');
            Route::get('/{user}', 'UserController@show')->name('show');
        });

    });
});*/

Route::group([
    'namespace' => 'App\\Http\\Controllers\\API\\V1\\',
    'prefix' => '1/users',
    'as' => 'api.v1.users.'
], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{user}', 'UserController@show')->name('show');
    Route::post('/', 'UserController@store')->name('store');
    Route::put('/{user}', 'UserController@update')->name('update');
    Route::delete('/{user}', 'UserController@destroy')->name('destroy');
});

// Jacky here
Route::group([
    'namespace' => 'App\\Http\\Controllers\\API\\V1\\',
    'prefix' => '/V1',
    'as' => 'api.v1.projects.'
], function () {
    Route::get('/project', 'ProjectsController@index')->name('projects.index');
    Route::get('/project/show/{project}', 'ProjectsController@show')->name('projects.view');
    Route::post('/project/create', 'ProjectsController@store')->name('projects.create');
    Route::put('/project/update/{project}', 'ProjectsController@update')->name('projects.update');
    Route::delete('/project/delete/{project}', 'ProjectsController@destroy')->name('destroy');
});

Route::group([
    'namespace' => 'App\\Http\\Controllers\\API\\V1\\',
    'prefix' => '/V1',
    'as' => 'api.v1.task.'
], function () {
    Route::get('/task', 'TaskController@index')->name('task.index');
    Route::get('/task/show/{task}', 'TaskController@show')->name('task.view');
    Route::post('/task/create', 'TaskController@store')->name('task.create');
    Route::put('/task/update/{task}', 'TaskController@update')->name('task.update');
    Route::delete('/task/delete/{task}', 'TaskController@destroy')->name('destroy');
});
