<?php

use App\Models\Plan;
use App\View\Components\app;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PesanObatController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\BalasanController;

// Auth::loginUsingId(1);

Route::get('/', function () {
    return view('index');
})->name('homepage');

// Routes Auth
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('store');
});

// Routes membership
Route::prefix('membership')->name('membership.')->group(function() {

    Route::get('/', [MembershipController::class, 'index'])->name('index');

    Route::middleware(['auth', 'is_not_membership'])->group(function() {
        Route::get('/{plan}/buy', [MembershipController::class, 'buy'])->name('buy');
        Route::post('/{plan}/buy', [PaymentController::class, 'purchaseMembership'])->name('purchase');
    });
});

// Routes konsultasi
Route::middleware('auth')->prefix('konsultasi')->name('konsultasi.')->group(function() {
    Route::get('/', [KonsultasiController::class, 'index'])->name('index');
    Route::post('/', [KonsultasiController::class, 'konsultasi'])->name('konsultasi');
    Route::get('/riwayat', [KonsultasiController::class, 'riwayat'])->name('riwayat');
    Route::get('/detail/{konsultasi}', [KonsultasiController::class, 'detail'])->name('detail');
});

// Routes balasan
Route::middleware(['auth'])->prefix('balasan')->name('balasan.')->group(function() {
    Route::get('/', [BalasanController::class, 'index'])->name('index');
    Route::post('/balas/{konsultasi}', [BalasanController::class, 'balas'])->name('balas');
});

// Route payment callback (webhook)
Route::post('payment-callback', [PaymentController::class, 'handleCallback']);

Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Route::prefix('keranjang')->name('keranjang.')->group(function() {
    //     Route::get('/', [CartController::class, 'index'])->name('index');
    //     Route::post('/add/{obat}', [CartController::class, 'add'])->name('add');
    //     Route::delete('/{cartItem}/delete', [CartController::class, 'removeItem'])->name('removeItem');
    //     Route::post('/{cart}/checkout', [CartController::class, 'checkout'])->name('checkout');
    // });

    // Route::prefix('checkout')->name('checkout.')->group(function () {
    //     Route::get('/', [CheckoutController::class, 'index'])->name('index');
    // });

    // // Order obat routes
    // Route::prefix('pesan')->name('pesan.')->group(function() {
    //     Route::get('/', [PesanObatController::class, 'index'])->name('index');
    //     Route::get('/{obat}/detail', [PesanObatController::class, 'detail'])->name('detail');
    // });

    // Dashboard routes
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index');

        Route::middleware('role_or_permission:Admin|Developer')->group(function() {
            Route::resource('obat', ObatController::class);
            Route::resource('karyawan', KaryawanController::class);
        });
    });
});
