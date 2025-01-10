<?php

require_once(__DIR__ . "/../controllers/AppointmentController.php");
use controllers\AppointmentController;

// Открытие страницы добавления записи (GET)
Route::add('/add_appointment', function () {
    (new AppointmentController())->addAppointmentToDoctorPage('add_appointment');
}, 'GET');

// Обработка формы добавления записи (POST)
Route::add('/add_appointment', function () {
    (new AppointmentController())->addAppointment();
}, 'POST');
