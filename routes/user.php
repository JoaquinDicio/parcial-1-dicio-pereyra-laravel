<?php

Route::get('/userHome', function () {
    return "<h1>Home del usuario</h1>";
})->name(name: 'userHome');
