<?php

use App\Http\Controllers\Admin\{DashboardController as AdminDashboardController, OrderController as AdminOrderController, ProdukController};
use App\Http\Controllers\User\{DashboardController as UserDashboardController, OrderController};
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('admin-dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin-dashboard.index');

Route::get('user-dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('user-dashboard.index');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function(){
    // Admin
    Route::get('produk-admin', [ProdukController::class, 'index'])->name('produk-admin.index');
    Route::get('order-produk-admin', [AdminOrderController::class, 'index'])->name('order-produk-admin.index');

    // Customer
    Route::get('order-produk-user', [OrderController::class, 'index'])->name('order-produk-user.index');
});

require __DIR__.'/auth.php';
