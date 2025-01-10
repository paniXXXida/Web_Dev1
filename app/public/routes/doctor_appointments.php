<?php


require_once(__DIR__ . "/../controllers/AppointmentController.php");
use controllers\AppointmentController;

Route::add('/doctor_appointments', function () {
    (new AppointmentController())->showDoctorAppointments('doctor_appointments');
}, 'GET');
