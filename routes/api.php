<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', [\Kanvas\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/login', [\Kanvas\Http\Controllers\Auth\AuthController::class, 'login']);
// Route::any('/countries', \Kanvas\Http\Controllers\Auth\AuthController::class);


/**
 * Countries Routes
 */
Route::group(['controller'=> '\Kanvas\Http\Controllers\Apps\AppsController'], function () {
    Route::get('/apps', 'index')->middleware('auth');
    Route::get('/apps/{id}', 'show');
    Route::post('/apps', 'create');
    Route::put('/apps/{id}', 'update');
    Route::delete('/apps/{id}', 'destroy');
});



/**
 * Private Routes
 */
Route::middleware(['auth'])->group(function () {

    /**
     * Apps Routes
     */
    Route::group(['controller'=> '\Kanvas\Http\Controllers\Apps\AppsController'], function () {
        Route::get('/apps', 'index')->middleware('auth');
        Route::get('/apps/{id}', 'show');
        Route::post('/apps', 'create');
        Route::put('/apps/{id}', 'update');
        Route::delete('/apps/{id}', 'destroy');
    });
});
