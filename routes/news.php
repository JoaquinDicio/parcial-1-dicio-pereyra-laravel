<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::post('/news', [NewsController::class, 'postNewArticle'])
    ->middleware(['auth', 'role'])
    ->name('news');

 Route::get('/user-news', [NewsController::class, 'getNewsList'])
    ->name('user.news');

Route::get('/user-news/{id}', [NewsController::class, 'getNewDetail'])
    ->name('news.detail');

Route::delete('/news/{id}', [NewsController::class, 'deleteArticle'])
    ->middleware(['auth', 'role'])
    ->name('news.delete');

Route::put('/news/{id}', [NewsController::class, 'editArticle'])
    ->middleware(['auth', 'role'])
    ->name('news.update');
