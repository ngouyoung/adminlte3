<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\Assessments\PermissionController;

Route::controller(PermissionController::class)->group(function () {
    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::group(['middleware' => 'permission:list-permission'], function () {
            CRUD('permission');
        });
    });
});
