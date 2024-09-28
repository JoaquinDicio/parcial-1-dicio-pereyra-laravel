<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/register', function () {
    return view("register");
});

Route::post('/register', [userController::class,'registerUser']);

Route::get('/login', function () {
    return 'hola desde login';
});

