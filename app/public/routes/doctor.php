<?php

Route::add('/doctor', function () {
    // homepage is simply loading a static page
    require(__DIR__ . "/../views/pages/doctor.php");
});
