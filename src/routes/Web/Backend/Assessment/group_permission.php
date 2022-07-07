<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\Assessments\GroupPermissionsController;

Route::controller(GroupPermissionsController::class)->group(function () {
    Route::group(['prefix' => 'group_permissions', 'as' => 'group_permissions.'], function () {
        filter();
        Route::group(['middleware' => 'permission:list-user'], function () {
            CRUD('group-permission');
            Route::group(['middleware' => 'permission:sort-group-permission'], function () {
                Route::post('sort', 'sort')->name('sort');
            });
        });
    });
});
