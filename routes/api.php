<?php

use Illuminate\Support\Facades\Route;

Route::group(['controller'=> '\Kanvas\Http\Controllers\Apps\AppsController'], function () {
    Route::get('/apps', 'index')->middleware('auth');
    Route::get('/apps/{id}', 'show');
    Route::post('/apps', 'create');
    Route::put('/apps/{id}', 'update');
    Route::delete('/apps/{id}', 'destroy');
});

Route::get('/apps-settings', [\Kanvas\Http\Controllers\Apps\SettingsController::class, 'index']);
Route::get('/apps-roles', [\Kanvas\Http\Controllers\Apps\RolesController::class, 'index']);

Route::post('/register', [\Kanvas\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/login', [\Kanvas\Http\Controllers\Auth\AuthController::class, 'login']);
