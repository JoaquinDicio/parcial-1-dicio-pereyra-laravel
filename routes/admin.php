<?php

use App\Http\Controllers\AdminController;


Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
