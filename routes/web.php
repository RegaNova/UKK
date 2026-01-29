<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
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
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('alat', AlatController::class);
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

            Route::get('peminjam', [UserController::class, 'peminjamList'])->name('admin.peminjam');
            Route::prefix('petugas')->group(function () {
                Route::get('/', [UserController::class, 'petugasList'])->name('admin.petugas');
                Route::get('/create', [UserController::class, 'createPetugasForm'])->name('admin.petugas.create');
                Route::post('/create', [UserController::class, 'createPetugas'])->name('admin.petugas.store');
                Route::get('/edit/{id}', [UserController::class, 'editPetugasForm'])->name('admin.petugas.edit');
                Route::post('/update', [UserController::class, 'updatePetugas'])->name('admin.petugas.update');
                Route::post('/delete/{id}', [UserController::class, 'deletePetugas'])->name('admin.petugas.delete');
            });
            Route::resource('kategori', KategoriController::class);
        });
    });
    Route::middleware(['role:petugas'])->group(function () {
        Route::get('petugas/dashboard', [PetugasController::class, 'showDashboard'])->name('petugas.dashboard');
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');
    });
});
