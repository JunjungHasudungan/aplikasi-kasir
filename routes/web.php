<?php

use App\Livewire\Admin\{DashboardAdmin, OrderProduct};
use App\Livewire\Admin\Order\OrderIndex as AdminOrderIndex;
use App\Livewire\Admin\Product\ProductIndex;
use App\Livewire\User\Order\OrderIndex;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    // ADMIN
    Route::get('admin-dashboard', DashboardAdmin::class)->name('admin-dashboard.index');
    Route::get('order-produk-admin', AdminOrderIndex::class)->name('order-produk-admin.index');
    // Route::get('order-produk-admin', OrderProduct::class)->name('order-produk-admin.index');
    Route::get('produk-admin', ProductIndex::class)->name('produk-admin.index');

    // CUSTOMER
    Route::get('user-dashboard', UserDashboard::class)->name('user-dashboard.index');
    Route::get('order-produk-user', OrderIndex::class)->name('order-produk-user.index');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';
