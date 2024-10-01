<?php

use App\Http\Controllers\userController;


Route::get('/', [userController::class, 'getDashboard'])
    ->name(name: 'userDashboard');

Route::post('/addSuscription', [userController::class, 'addSuscription'])
    ->middleware('auth')
    ->name('suscriptions');

Route::delete('/suscriptions/{service_id}', [UserController::class, 'unsubscribe'])
    ->middleware('auth')
    ->name('unsubscribe');
