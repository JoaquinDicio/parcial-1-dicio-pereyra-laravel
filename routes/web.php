<?php

use Illuminate\Support\Facades\Route;

// routers personalizados
require base_path('routes/auth.php');

Route::get('/home', function () {
    return "<h1>Homeee</h1>";
})->name(name: 'home');

