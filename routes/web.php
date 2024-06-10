<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController as AdminVerificationController;
use App\Http\Controllers\HomeController;

// Define the route for the home page
Route::redirect('/', '/bulletins');

// Define resource routes for Bulletins
Route::resource('bulletins', BulletinController::class);

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->namespace('Admin\Auth')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'register']);

    Route::get('password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AdminResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('email/verify', [AdminVerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [AdminVerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [AdminVerificationController::class, 'resend'])->name('verification.resend');

    // Admin Dashboard Route
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth:admin')->name('dashboard');
});

