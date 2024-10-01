<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;

// el controlador de servicios maneja los metodos POST DELETE Y UPDATE

Route::post('/services', [ServicesController::class, 'postNewService'])
    ->middleware(['auth', 'role'])
    ->name('services');

Route::delete('/services/{id}', [ServicesController::class, 'deleteService'])
->middleware(['auth', 'role'])
->name('services.delete');