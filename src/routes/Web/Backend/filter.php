<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\FilterController;

Route::controller(FilterController::class)->group(function () {
    Route::group(['prefix' => 'filter','as' => 'filter.'], function () {
        Route::get('group_permissions', 'group_permissions')->name('group_permissions');
        Route::get('currencies', 'currencies')->name('currencies');
        Route::get('units', 'units')->name('units');
        Route::get('categories', 'categories')->name('categories');
    });
});
