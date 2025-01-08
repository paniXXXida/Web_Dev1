<?php
namespace Controllers;

use Models\Service;

class ServiceController
{
    public function showDoctorServices(string $view)
    {
        $doctorId = $_SESSION['user']['id'];
        $doctorServices = (new Service())->findByDoctorId($doctorId);

        include "Views/{$view}.php";
    }

    public function addService()
    {
        $service = new Service();
        $statusCreate = $service->create($_POST);

        if ($statusCreate) {
            header('Location: /doctor-services');
        } else {
            header('Refresh:2; url=/doctor-services');
            echo 'Failed to add service, try again. You will be redirected in 2s';
        }
    }

    public function updateService()
    {
        $service = new Service();
        $statusUpdate = $service->update($_POST);

        if ($statusUpdate) {
            header('Location: /doctor-services');
        } else {
            header('Refresh:2; url=/doctor-services');
            echo 'Failed to update service, try again. You will be redirected in 2s';
        }
    }
}
