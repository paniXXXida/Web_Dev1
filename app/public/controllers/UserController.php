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


    public function showDoctors(string $view)
    {
        $doctors = (new User())->findDoctors();

        foreach ($doctors as $key => $doctor) {
            $doctors[$key]['services'] = (new Service())->findByDoctorId($doctor['id']);
        }

        include "views/pages/{$view}.php";
    }

}
