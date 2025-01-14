<?php


require_once(__DIR__ . "/../controllers/ServiceController.php");
use controllers\ServiceController;

Route::add('/doctor_services', function () {
    (new ServiceController())->showDoctorServices('doctor_services');
}, 'GET');

Route::add('/api/doctor_services', function () {
    (new ServiceController())->fetchDoctorServices();
}, 'GET');

Route::add('/doctor_services', function () {
    (new ServiceController())->addService();
}, 'POST');

Route::add('/api/doctor_services', function () {
    (new ServiceController())->updateService();
}, 'PATCH');