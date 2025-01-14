<?php
// routes/register.php
require_once(__DIR__ . "/../controllers/UserController.php");
use controllers\UserController;


Route::add('/register', function () {
    require __DIR__ . '/../views/pages/register.php';
}, 'GET');


Route::add('/register', function () {
    (new UserController())->register();
}, 'POST');
