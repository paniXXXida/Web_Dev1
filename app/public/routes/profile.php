<?php

Route::add('/profile', function () {
    // homepage is simply loading a static page
    require(__DIR__ . "/../views/pages/profile.php");
});
