<?php
// routes/doctor.php

use Controllers\UserController;

Route::add('/doctor', function () {
    (new UserController())->showDoctors('doctor');
}, 'GET');
