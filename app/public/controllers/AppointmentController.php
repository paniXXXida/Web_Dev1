<?php
namespace Controllers;

use Models\Appointment;
use Models\Pet;

class AppointmentController
{
    public function addAppointment()
    {
        $appointment = new Appointment();
        $statusCreate = $appointment->create($_POST);

        if ($statusCreate) {
            header('Location: /account');
        } else {
            header('Location: /account');
            echo 'Failed to add appointment, try again';
        }
    }

    public function editAppointment()
    {
        $appointment = new Appointment();
        $statusUpdate = $appointment->update($_POST);

        if ($statusUpdate) {
            header('Location: /doctor-appointment');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo 'Failed to update appointment, try again';
        }
    }

    public function deleteAppointmentById()
    {
        $idDeleted = $_POST['id'];
        $appointment = new Appointment();

        echo $appointment->deleteById($idDeleted);
    }

    public function addAppointmentToDoctorPage(string $view)
    {
        $doctorId = $_GET['id'];
        $userId = $_SESSION['user']['id'];
        $userAnimals = (new Pet())->findByUserId($userId);

        include "Views/{$view}.php";
    }

    public function showDoctorAppointments(string $view)
    {
        $doctorId = $_SESSION['user']['id'];
        $clients = (new Appointment())->findByDoctorId($doctorId);

        include "Views/{$view}.php";
    }
}
