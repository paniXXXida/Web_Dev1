<?php

require_once(__DIR__ . "/../controllers/AppointmentController.php");

Route::add('/api/add_appointment/pet', function () {
    $appointmentController = new AppointmentController();
    $userId = $_SESSION['user']['id'];
    $animals = $appointmentController->getUserAnimals($userId);
    echo json_encode($animals);
});

Route::add('/api/add_appointment', function () {
    $appointmentController = new AppointmentController();
    $appointmentController->createAppointmentFromApi();
}, "POST");
