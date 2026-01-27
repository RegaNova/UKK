<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alat', AlatController::class);

Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
        Route::get('register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
    });
});
