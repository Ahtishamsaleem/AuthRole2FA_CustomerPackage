<?php

use Illuminate\Support\Facades\Route;
use AuthRole2FA\Http\Controllers\AuthController;
use AuthRole2FA\Http\Controllers\TwoFactorAuthController;

Route::group(['prefix' => 'authrole2fa', 'as' => 'authrole2fa.'], function() {
    // Authentication routes
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    
    // 2FA routes
    Route::get('2fa/enable', [TwoFactorAuthController::class, 'enable2FAForm'])->name('2fa.enable');
    Route::post('2fa/verify', [TwoFactorAuthController::class, 'verify2FA'])->name('2fa.verify');
});