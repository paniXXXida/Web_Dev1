<?php
// routes/edit_appointment.php

use Controllers\AppointmentController;

// Показ страницы редактирования (GET)
Route::add('/edit_appointment', function () {
    (new AppointmentController())->showEditAppointment();
}, 'GET');

// Обработка формы редактирования (POST)
Route::add('/edit_appointment', function () {
    (new AppointmentController())->editAppointment();
}, 'POST');
