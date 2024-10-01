<?php

use Illuminate\Support\Facades\Route;

// routers personalizados
require base_path('routes/auth.php');
require base_path(path: 'routes/admin.php');
require base_path(path: 'routes/user.php');
require base_path(path: 'routes/services.php');

Route::get('/home', function () {
    return "<h1>Homeee</h1>";
})->name(name: 'home');

