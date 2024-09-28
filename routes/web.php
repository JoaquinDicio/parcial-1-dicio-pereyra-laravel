<?php

use Illuminate\Support\Facades\Route;

// routers personalizados
require base_path('routes/auth.php');

Route::get('/', function () {
    return "<h1>Homeee</h1>";
})->name(name: 'home');


//Route::post('/register', [UserController::class, 'registerUser']);
