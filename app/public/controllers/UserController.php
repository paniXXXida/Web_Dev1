<?php
namespace controllers;

require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/../models/Service.php");
use models\User;
use models\Service;
class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = $_SESSION['user'] ?? false;
    }

    public function login()
    {
        $user = new User();
        $loginUser = $user->login($_POST);

        if (empty($loginUser)) {
            header('Refresh:2; url=/login');
            echo 'No user found, try again. You will be redirected in 2s';
        } else {
            $_SESSION['user'] = $loginUser;
            header('Location: /');
        }
    }

    public function register()
    {
        $user = new User();
        $statusRegister = $user->register($_POST);

        if ($statusRegister) {
            header('Location: /login');
        } else {
            header('Refresh:2; url=/register');
            echo 'Error during registration, try again. You will be redirected in 2s';
        }
    }

    public function logout()
    {
        $user = new User();
        $user->logout();

        header('Location: /');
    }

    public function showProfile(string $view)
    {
        $userId = $_SESSION['user']['id'];

        if ($userId == null) {
            header('Refresh:2; url=/login');
            echo 'You must log in for this page. Redirected in 2s';
            exit();
        }

        $imgName = (new User())->getImageByUserId($userId);
        include "views/pages/{$view}.php";
    }

    public function updateProfile()
    {
        $userId = $_POST['user_id'];
        $user = new User();

        $newImageName = $user->updateImg($userId);
        echo json_encode(['src' => $newImageName]);
    }

    public function showDoctors(string $view)
    {
        $doctors = (new User())->findDoctors();

        foreach ($doctors as $key => $doctor) {
            $doctors[$key]['services'] = (new Service())->findByDoctorId($doctor['id']);
        }

        include "views/pages/{$view}.php";
    }

}
