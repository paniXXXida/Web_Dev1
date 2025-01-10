<?php
// routes/profile.php

use Controllers\UserController;

Route::add('/profile', function () {
    (new UserController())->showProfile('profile');
}, 'GET');
