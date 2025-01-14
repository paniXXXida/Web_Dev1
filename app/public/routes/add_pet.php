<?php

require_once(__DIR__ . "/../controllers/PetController.php");
use controllers\PetController;


Route::add('/add_pet', function () {
    (new PetController())->addPetPage('add_pet');
}, 'GET');


Route::add('/add_pet', function () {
    (new PetController())->addPet();
}, 'POST');
