<?php

/**
 * Set env variables and enable error reporting in local environment
 */
require_once(__DIR__ . "/lib/env.php");            // Считывает настройки окружения (база данных и т.д.)
require_once(__DIR__ . "/lib/error_reporting.php"); // Включает отображение ошибок в локальной среде

/**
 * Start user session
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Require routing library
 *  allows handling request for different URL routes, i.e. /users, /products, etc.
 */
require_once(__DIR__ . "/lib/Route.php");

/**
 * Require routes
 *  Defines the routes that our application will handle
 */
require_once(__DIR__ . "/routes/account.php");
require_once(__DIR__ . "/routes/add_appointment.php");
require_once(__DIR__ . "/routes/add_pet.php");
require_once(__DIR__ . "/routes/contact.php");
require_once(__DIR__ . "/routes/doctor.php");
require_once(__DIR__ . "/routes/doctor_appointments.php");
require_once(__DIR__ . "/routes/doctor_services.php");
require_once(__DIR__ . "/routes/edit_appointment.php");
require_once(__DIR__ . "/routes/index.php");
require_once(__DIR__ . "/routes/login.php");
require_once(__DIR__ . "/routes/register.php");

/**
 * (Опционально) Установим обработчики для маршрутов, которые не найдены,
 * и для методов, которые не разрешены
 */
Route::pathNotFound(function($path) {
    header("HTTP/1.1 404 Not Found");
    echo "Страница '$path' не найдена.";
});

Route::methodNotAllowed(function($path, $method) {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Метод '$method' не разрешён для '$path'.";
});

/**
 * Запускаем маршрутизатор
 */
Route::run();
