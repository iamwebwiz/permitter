<?php

use App\Http\Controllers\Reviewer\ApplicationController;
use App\Http\Controllers\Reviewer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('applications')->group(static function () {
    Route::get('{application}', [ApplicationController::class, 'show'])->name('applications.show');
});
