<?php

Route::add('/account', function () {
    // homepage is simply loading a static page
    require(__DIR__ . "/../views/pages/account.php");
});
