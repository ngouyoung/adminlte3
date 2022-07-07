<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ErrorController;

Route::controller(ErrorController::class)->group(function () {
    Route::group(['prefix' => 'errors','as' => 'errors.'], function () {
        Route::get('404', '_404')->name('404');
        Route::get('400', '_400')->name('400');
    });
});
