<?php

require_once(__DIR__ . "app/public/models/Appointment.php");

use Models\Appointment;

class AppointmentController
{
    private $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new Appointment();
    }

    // Получение животных пользователя
    public function getUserAnimals($userId)
    {
        return $this->appointmentModel->findByUserId($userId);
    }

    // Создание записи через API
    public function createAppointmentFromApi()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        if (!isset($data['doctor_id'], $data['pet_id'], $data['description'], $data['date'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            return;
        }

        $result = $this->appointmentModel->create($data);

        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => 'Appointment created successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to create appointment']);
        }
    }
}
