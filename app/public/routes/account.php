<?php

require_once(__DIR__ . "/../controllers/AppointmentController.php");
use controllers\AppointmentController;

Route::add('/account', function () {
    (new AppointmentController())->showAccount('account');
}, 'GET');

Route::add('/api/appointments/delete', function () {
    (new AppointmentController())->deleteAppointmentRequest();
}, 'POST');

Route::add('/account', function () {
    require __DIR__ . '/../views/pages/account.php';
}, 'GET');



