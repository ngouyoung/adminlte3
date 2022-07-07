<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\Assessments\UserController;

Route::controller(UserController::class)->group(function () {
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::group(['middleware' => 'permission:list-user'], function () {
            CRUD('user');
            Route::group(['middleware' => 'permission:change-password-user'], function () {
                Route::get('change_password/{id}', 'changePassword')->name('change-password');
                Route::put('update_password/{id}', 'updatePassword')->name('update-password');
            });
        });
    });
});
