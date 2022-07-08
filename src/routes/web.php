<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['permission:backend']], function () {
        Route::group(['prefix' => 'assessments', 'as' => 'assessments.', 'middleware' => 'permission:access'], function () {
            require __DIR__ . '/Web/Backend/Assessment/user.php';
            require __DIR__ . '/Web/Backend/Assessment/role.php';
            require __DIR__ . '/Web/Backend/Assessment/permission.php';
            require __DIR__ . '/Web/Backend/Assessment/group_permission.php';
        });

        require __DIR__ . '/Web/Backend/profile.php';
        require __DIR__ . '/Web/Backend/filter.php';
        require __DIR__ . '/Web/Backend/dashboard.php';
    });
});
require __DIR__ . '/Web/Error/index.php';
