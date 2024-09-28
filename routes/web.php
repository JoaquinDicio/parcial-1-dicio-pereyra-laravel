<?php

use Illuminate\Support\Facades\Route;

// routers personalizados
require base_path('routes/auth.php'); 

Route::get('/', function () {
    return "<h1>Homeee</h1>";
});


//Route::post('/register', [UserController::class, 'registerUser']);
