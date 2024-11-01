<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanObatController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KaryawanController;

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Order obat routes
    Route::prefix('pesan')->name('pesan.')->group(function() {
        Route::get('/', [PesanObatController::class, 'index'])->name('index');
    });

    // Dashboard routes
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index');

        Route::middleware('role:Admin|developer')->group(function() {
            Route::resource('obat', ObatController::class);
            Route::resource('karyawan', KaryawanController::class);
        });
    });
});
