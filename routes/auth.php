<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\VisitorsController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    /** Untuk Front End */
    Route::get('register', [VisitorsController::class, 'register'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    /** Untuk Front End */
    Route::get('login', [VisitorsController::class, 'login'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    /** Untuk Front End */
    Route::get('forgot-password', [VisitorsController::class, 'check_email_for_change_password'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    /** Untuk Front End */
    Route::get('reset-password/{token}', [VisitorsController::class, 'reset_password'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // ===================== DEFAULT LARAVEL BREEZE BACKEND =====================
    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
});
