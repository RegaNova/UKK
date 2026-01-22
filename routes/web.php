<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alat', AlatController::class);
