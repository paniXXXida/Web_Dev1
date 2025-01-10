<?php
// routes/edit_appointment.php

use Controllers\AppointmentController;

// Показ страницы редактирования (GET) - если нужно
Route::add('/edit_appointment', function () {
    require __DIR__ . '/../views/pages/edit_appointment.php';
}, 'GET');

// Обработка формы редактирования (POST)
Route::add('/edit_appointment', function () {
    (new AppointmentController())->editAppointment();
}, 'POST');
