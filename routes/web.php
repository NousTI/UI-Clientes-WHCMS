<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('services', [DashboardController::class, 'services'])->name('services');
    Route::get('domains', [DashboardController::class, 'domains'])->name('domains');
    Route::get('invoices', [DashboardController::class, 'invoices'])->name('invoices');
    Route::get('tickets', [DashboardController::class, 'tickets'])->name('tickets');
});

require __DIR__.'/settings.php';
