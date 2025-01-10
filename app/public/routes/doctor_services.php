<?php
// routes/doctor_services.php

require_once(__DIR__ . "/../controllers/ServiceController.php");
use controllers\ServiceController;

Route::add('/doctor_services', function () {
    (new ServiceController())->showDoctorServices('doctor_services');
}, 'GET');
