<?php

require_once(__DIR__ . "/../controllers/PetController.php");
use controllers\PetController;

// Показ формы добавления питомца (GET)
Route::add('/add_pet', function () {
    (new PetController())->addPetPage('add_pet');
}, 'GET');

// Обработка формы добавления питомца (POST)
Route::add('/add_pet', function () {
    (new PetController())->addPet();
}, 'POST');
