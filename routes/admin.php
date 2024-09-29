<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/dashboard', [AdminController::class, 'showDashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
