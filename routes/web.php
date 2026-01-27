<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;


Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
        Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [AuthController::class, 'register'])->name('register.post');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('alat', AlatController::class);
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    });

    Route::middleware(['role:petugas'])->group(function () {
        Route::get('petugas/dashboard', [PetugasController::class, 'showDashboard'])->name('petugas.dashboard');
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');
    });
});
