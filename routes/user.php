<?php

use App\Http\Controllers\userController;

Route::get('/userDashboard',[userController::class, 'getDashboard'] )->name(name: 'userDashboard');
