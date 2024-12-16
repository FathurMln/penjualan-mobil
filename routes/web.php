<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\auth_controller;  // Corrected controller name

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

Route::middleware('auth')->group(function () {
Route::get('/', [CustomerController::class, 'customer'])->name('customer.index');

//rute crud kamar dan reservasi
Route::resource('customer', CustomerController::class);
Route::resource('mobil', MobilController::class);

// rute ke halaman lain di sidebar
Route::get('customer.index', [CustomerController::class, 'index'])->name('index');
Route::get('mobil.index', [MobilController::class, 'index'])->name('index');
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

//rute input data pelanggan dengan login/tanpalogin
Route::get('customer.transaksi', [CustomerController::class, 'create'])->name('customer.transaksi');
Route::get('customer.daftar', [MobilController::class, 'item'])->name('customer.daftar');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

// Proses login
Route::post('/login-proses', [auth_controller::class, 'login'])->name('loginproccess');
// Logout
Route::post('/logout', [auth_controller::class, 'logout'])->name('logout');