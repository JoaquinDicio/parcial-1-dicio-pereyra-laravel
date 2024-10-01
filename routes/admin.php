<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;


Route::get('/dashboard', [AdminController::class, 'showDashboard'])
    ->middleware(['auth', 'role'])
    ->name('dashboard');

Route::get('/users', [AdminController::class, 'getUsers'])
    ->middleware('auth')
    ->name('users');

Route::get('/addServiceForm',[AdminController::class, 'addServiceForm'])
    ->middleware('auth')
    ->name('users');

Route::get('/users/{id}', [AdminController::class, 'showUserInfo'])
    ->middleware('auth')
    ->name('user.info');

 Route::get('/services', [AdminController::class, 'showServices'])
    ->middleware('auth')
    ->name('services');


Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
