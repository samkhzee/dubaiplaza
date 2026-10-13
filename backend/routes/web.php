<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaptopUnitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['auth', 'role:owner,staff'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('laptops', LaptopUnitController::class)->except(['destroy']);
    Route::resource('accessories', AccessoryController::class)->except(['destroy', 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
