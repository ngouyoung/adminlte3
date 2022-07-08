<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//, 'permission:backend'
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

//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
require __DIR__ . '/Web/Error/index.php';

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
