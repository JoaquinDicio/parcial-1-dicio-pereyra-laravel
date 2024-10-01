<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::post('/news', [NewsController::class, 'postNewArticle'])
    ->middleware(['auth', 'role'])
    ->name('news');

Route::delete('/news/{id}', [NewsController::class, 'deleteArticle'])
    ->middleware(['auth', 'role'])
    ->name('news.delete');

Route::put('/news/{id}', [NewsController::class, 'editArticle'])
    ->middleware(['auth', 'role'])
    ->name('news.update');
