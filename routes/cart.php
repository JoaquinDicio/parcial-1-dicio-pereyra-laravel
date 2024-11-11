<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class,'showUserCart'])
    ->middleware('auth')
    ->name('cart');

Route::post('/cart', [CartController::class,'addToCart'])
    ->middleware('auth')
    ->name('cart.add');

Route::delete('/cart/${id}', [CartController::class,'deleteFromCart'])
    ->middleware('auth')
    ->name('cart.remove');

Route::post('/cart/checkout', [CartController::class,'checkout'])
    ->middleware('auth')
    ->name('cart.payment');

Route::get('/cart/checkout', [CartController::class,'showCheckout'])
    ->middleware('auth')
    ->name('cart.checkout');