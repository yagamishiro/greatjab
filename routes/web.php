<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceFeeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('dashboard', DashboardController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('transactions', TransactionController::class)
    ->only(['index', 'create', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('service-fees', ServiceFeeController::class)
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
