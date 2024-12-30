<?php

Route::add('/doctor_appointments', function () {
    // homepage is simply loading a static page
    require(__DIR__ . "/../views/pages/doctor_appointments.php");
});
