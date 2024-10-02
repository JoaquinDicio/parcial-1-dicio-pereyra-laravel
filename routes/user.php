<?php

use App\Http\Controllers\userController;


Route::get('/', [userController::class, 'getHome'])
    ->name(name: 'users.home');

    
Route::get('/user-dashboard', [userController::class, 'getDashboard'])
    ->middleware('auth')    
    ->name(name: 'users.dashboard');


