<?php
// routes/login.php

use Controllers\UserController;

// Показ страницы логина (GET)
Route::add('/login', function () {
    require __DIR__ . '/../views/pages/login.php';
}, 'GET');

// Обработка логина (POST)
Route::add('/login', function () {
    (new UserController())->login();
}, 'POST');

Route::add('/logout', function () {
    (new UserController())->logout();
}, 'GET');
