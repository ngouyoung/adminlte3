<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\ProfileController;

Route::controller(ProfileController::class)->group(function () {
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', 'index')->name('index');
        Route::put('update-password', 'updatePassword')->name('update-password');
        Route::put('update-info', 'updateInfo')->name('update-info');
        Route::put('update-avatar', 'updateAvatar')->name('update-avatar');
    });
});
