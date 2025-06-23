<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('login', [
        AdminController::class, 'create',
    ])->name('admin.login');

    // handle login post request
    Route::post('login', [
        AdminController::class, 'store',
    ])->name('admin.login.request');

    Route::group(['middleware' => ['admin']], function () {
        Route::resource('dashboard', AdminController::class)->only([
            'index',
        ]);

        Route::get('logout', [
            AdminController::class, 'destroy',
        ])->name('admin.logout');

    });
});
