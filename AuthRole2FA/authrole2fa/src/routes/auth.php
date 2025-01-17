<?php

use Illuminate\Support\Facades\Route;
use YourVendor\AuthPackage\Http\Controllers\RegisterController;
use YourVendor\AuthPackage\Http\Controllers\LoginController;

Route::group(['middleware' => ['web']], function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('authpackage.register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('authpackage.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('authpackage.logout');
});
