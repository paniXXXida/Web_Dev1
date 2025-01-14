<?php
namespace controllers;
require_once(__DIR__ . "/../models/Appointment.php");
require_once(__DIR__ . "/../models/Pet.php");
use models\Appointment;
use models\Pet;

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

    public function showEditAppointment()
    {

        $id = $_GET['id'] ?? null;
        if (!$id) {

            header('Location: /doctor_appointments?error=No appointment ID provided');
            exit();
        }


        error_log("Editing appointment with ID: $id");


        $appointmentModel = new Appointment();
        $appointment = $appointmentModel->findById($id);

        if (!$appointment) {

            header('Location: /doctor_appointments?error=Appointment not found');
            exit();
        }


        error_log("Fetched appointment: " . print_r($appointment, true));


        $id = $appointment['id'];
        $date = $appointment['date'];

        include "views/pages/edit_appointment.php";
    }

    public function editAppointment()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new \Exception('Invalid request method.');
            }


            $data = [
                'id' => $_POST['id'] ?? null,
                'date' => $_POST['date'] ?? null,

            ];


            error_log('editAppointment called with data: ' . print_r($data, true));


            foreach ($data as $key => $value) {
                if (empty($value)) {
                    throw new \Exception("Missing value for {$key}.");
                }
            }


            $appointmentModel = new Appointment();
            $updateStatus = $appointmentModel->update($data);

            if ($updateStatus) {
                error_log("Appointment ID {$data['id']} updated successfully.");

                header('Location: /doctor_appointments?success=1');
                exit();
            } else {
                throw new \Exception('Failed to update appointment.');
            }
        } catch (\Exception $e) {

            error_log('Error in editAppointment: ' . $e->getMessage());


            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=' . urlencode($e->getMessage()));
            exit();
        }
    }

    public function deleteAppointmentRequest(): void
    {

        header('Content-Type: application/json; charset=utf-8');

        $input = file_get_contents('php://input');
        $data  = json_decode($input, true);

        $id = $data['id'] ?? null;
        if (!$id) {

            echo json_encode(['success' => false, 'error' => 'Missing appointment ID']);
            return;
        }

        $appointment = new Appointment();
        $result = $appointment->deleteById($id);

        echo json_encode([
            'success' => (bool)$result
        ]);
    }

    public function addAppointmentToDoctorPage(string $view)
    {
        $doctorId = $_GET['id'];
        $userId = $_SESSION['user']['id'];
        $userAnimals = (new Pet())->findByUserId($userId);

        include "views/pages/{$view}.php";
    }

    public function showDoctorAppointments(string $view)
    {
        $doctorId = $_SESSION['user']['id'];
        $clients = (new Appointment())->findByDoctorId($doctorId);

        include "views/pages/{$view}.php";
    }

    public function showAccount(string $view)
    {

        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {

            header('Location: /login');
            exit();
        }


        $appointments = (new Appointment())->findByUserId($userId);

        // 3) Подключаем шаблон, передавая $appointments в account.php
        // Обратите внимание, переменная будет доступна в шаблоне
        // как $appointments
        include __DIR__ . "/../views/pages/{$view}.php";
    }
}
