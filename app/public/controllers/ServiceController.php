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
        $service->update(json_decode(file_get_contents("php://input"), true));
        header('Content-Type: application/json');
        http_response_code(200);
        $updatedService = $service->findServiceById(json_decode(file_get_contents("php://input"), true)['service_id']);
        echo json_encode($updatedService);
    }

    public function fetchDoctorServices()
    {
        $doctorId = $_SESSION['user']['id'];
        $doctorServices = (new Service())->findByDoctorId($doctorId);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($doctorServices);
    }
}
