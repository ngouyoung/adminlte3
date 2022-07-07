<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\Assessments\RoleController;

Route::controller(RoleController::class)->group(function () {
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::group(['middleware' => 'permission:list-role'], function () {
            CRUD('role');
        });
    });
});
