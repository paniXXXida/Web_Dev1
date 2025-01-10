<?php
namespace controllers;

require_once(__DIR__ . "/../models/Pet.php");

use models\Pet;

class PetController
{
    public function addPetPage(string $view)
    {
        $userId = $_SESSION['user']['id'];
        $pets = (new Pet())->findByUserId($userId);

        include "views/pages/{$view}.php";
    }

    public function addPet()
    {
        $pet = new Pet();
        $statusCreate = $pet->create($_POST);

        if ($statusCreate) {
            header('Location: /add_pet');
        } else {
            header('Refresh:2; url=/add_pet');
            echo 'Failed to add pet, try again. You will be redirected in 2s';
        }
    }
}
