<?php

require_once(__DIR__ . "/../controllers/AppointmentController.php");
use controllers\AppointmentController;


Route::add('/add_appointment', function () {
    (new AppointmentController())->addAppointmentToDoctorPage('add_appointment');
}, 'GET');


Route::add('/add_appointment', function () {
    (new AppointmentController())->addAppointment();
}, 'POST');
