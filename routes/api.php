<?php

use Illuminate\Support\Facades\Route;

Route::get('/apps', [\Kanvas\Http\Controllers\Apps\AppsController::class, 'index']);
Route::post('/apps', [\Kanvas\Http\Controllers\Apps\AppsController::class, 'create']);
Route::get('/apps-settings', [\Kanvas\Http\Controllers\Apps\SettingsController::class, 'index']);
Route::get('/apps-roles', [\Kanvas\Http\Controllers\Apps\RolesController::class, 'index']);
