<?php

use Illuminate\Support\Facades\Route;

Route::get('/apps', [\Kanvas\Http\Controllers\Apps\AppsController::class, 'index']);
Route::get('/apps-settings', [\Kanvas\Http\Controllers\Apps\SettingsController::class, 'index']);
