<?php

use App\Http\Controllers\Applicant\ApplicationController;
use App\Http\Controllers\Applicant\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('applications')->group(static function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('applications');
    Route::get('create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('store', [ApplicationController::class, 'store'])->name('applications.store');
});
