<?php
namespace controllers;

require_once(__DIR__ . "/../models/Service.php");
use models\Service;

class ServiceController
{
    public function showDoctorServices(string $view)
    {
        $doctorId = $_SESSION['user']['id'];
        $doctorServices = (new Service())->findByDoctorId($doctorId);

        include "views/pages/{$view}.php";
    }

    public function addService()
    {
        $service = new Service();
        $statusCreate = $service->create($_POST);

        if ($statusCreate) {
            header('Location: /doctor_services');
        } else {
            header('Refresh:2; url=/doctor_services');
            echo 'Failed to add service, try again. You will be redirected in 2s';
        }
    }

    public function updateService()
    {
        $service = new Service();
        $statusUpdate = $service->update($_POST);

        if ($statusUpdate) {
            header('Location: /doctor_services');
        } else {
            header('Refresh:2; url=/doctor_services');
            echo 'Failed to update service, try again. You will be redirected in 2s';
        }
    }
}
