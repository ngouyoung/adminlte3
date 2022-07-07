<?php

use Illuminate\Support\Facades\Route;

function filter(): array
{
    return [
        Route::get('filter', 'filter')->name('filter')
    ];
}

function CRUD($model): array
{
    return [
        Route::get('/', 'index')->name('index'),
        Route::get('/getData', 'getData')->name('getData'),

        Route::get('show/{id}', 'show')->name('show'),

        Route::group(['middleware' => 'permission:create-' . $model], function () {
            Route::get('create', 'create')->name('create');
            Route::post('', 'store')->name('store');
        }),

        Route::group(['middleware' => 'permission:edit-' . $model], function () {
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        }),

        Route::group(['middleware' => 'permission:delete-' . $model], function () {
            Route::delete('delete/{id}', 'delete')->name('delete');
            Route::delete('ajaxDelete/{id}', 'ajaxDelete')->name('ajaxDelete');
        })
    ];
}
