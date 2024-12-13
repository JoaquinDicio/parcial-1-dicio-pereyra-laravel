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

Route::get('/cart/success', [CartController::class,'paymentSuccess'])
->middleware('auth')
->name('payment.success');

Route::get('/cart/failed', [CartController::class,'paymentFailed'])
->middleware('auth')
->name('payment.failed');