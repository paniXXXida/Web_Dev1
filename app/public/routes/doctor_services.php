<?php

Route::add('/doctor_services', function () {
    // homepage is simply loading a static page
    require(__DIR__ . "/../views/pages/doctor_services.php");
});
