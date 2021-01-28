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
