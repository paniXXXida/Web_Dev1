<?php
namespace Controllers;

use Models\Pet;

class PetController
{
    public function addPetPage(string $view)
    {
        $userId = $_SESSION['user']['id'];
        $pets = (new Pet())->findByUserId($userId);

        include "Views/{$view}.php";
    }

    public function addPet()
    {
        $pet = new Pet();
        $statusCreate = $pet->create($_POST);

        if ($statusCreate) {
            header('Location: /add-pet');
        } else {
            header('Refresh:2; url=/add-pet');
            echo 'Failed to add pet, try again. You will be redirected in 2s';
        }
    }
}
