<?php

use App\Http\Controllers\userController;

Route::get('/userDashboard', [userController::class, 'getDashboard'])
    ->middleware(['auth'])
    ->name(name: 'userDashboard');
