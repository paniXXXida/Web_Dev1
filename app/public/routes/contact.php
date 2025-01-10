<?php
// routes/contact.php

Route::add('/contact', function () {
    require __DIR__ . '/../views/pages/contact.php';
}, 'GET');
