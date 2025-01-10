<?php
// routes/account.php

Route::add('/account', function () {
    require __DIR__ . '/../views/pages/account.php';
}, 'GET');
