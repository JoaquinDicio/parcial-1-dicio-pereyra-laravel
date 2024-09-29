<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


Route::get('/', function () {
    return view("register");
})->name(name: 'register');

Route::get('/register', function () {
    return view("register");
})->name(name: 'register');

Route::post('/register', [userController::class, 'registerUser']);


Route::get('/login', function () {
    return view("login");
})->name(name: 'login');

Route::post('/login', [userController::class, 'loginUser']);