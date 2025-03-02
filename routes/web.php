<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('income', ExpenseController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
