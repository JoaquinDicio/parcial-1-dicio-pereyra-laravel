<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/dashboard', [AdminController::class, 'showDashboard'])
    ->middleware(['auth', 'role'])
    ->name('dashboard');

Route::get('/services/{id}/edit', [AdminController::class, 'editServiceForm'])
    ->middleware(['auth', 'role'])
    ->name('services.edit');

Route::get('/users', [AdminController::class, 'getUsers'])
    ->middleware(['auth', 'role'])
    ->name('users');

Route::get('/users/{id}', [AdminController::class, 'showUserInfo'])
    ->middleware(['auth', 'role'])
    ->name('user.info');

Route::get('/services', [AdminController::class, 'showServices'])
    ->middleware(['auth', 'role'])
    ->name('admin.services');

Route::get('/addServiceForm', [AdminController::class, 'addServiceForm'])
    ->middleware(['auth', 'role'])
    ->name('services.form');

Route::get('/addNewsForm', [AdminController::class, 'addNewsForm'])
    ->middleware(['auth', 'role'])
    ->name('new.form');

Route::get('/news', [AdminController::class, 'showNews'])
    ->middleware(['auth', 'role'])
    ->name('admin.news');

Route::get('/news/{id}/edit', [AdminController::class, 'editNewsForm'])
    ->middleware(['auth', 'role'])
    ->name('admin.editNewsForm');
    

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
