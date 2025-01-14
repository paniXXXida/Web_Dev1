<?php


use Controllers\AppointmentController;


Route::add('/edit_appointment', function () {
    (new AppointmentController())->showEditAppointment();
}, 'GET');


Route::add('/edit_appointment', function () {
    (new AppointmentController())->editAppointment();
}, 'POST');
