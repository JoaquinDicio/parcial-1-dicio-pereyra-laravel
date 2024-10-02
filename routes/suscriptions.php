<?php
use App\Http\Controllers\SuscriptionsController;

Route::post('/addSuscription', [SuscriptionsController::class, 'addSuscription'])
    ->middleware('auth')
    ->name('suscriptions');

Route::delete('/suscriptions/{service_id}', [SuscriptionsController::class, 'unsubscribe'])
    ->middleware('auth')
    ->name('unsubscribe');