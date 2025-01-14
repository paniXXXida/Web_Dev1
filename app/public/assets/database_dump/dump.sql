-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Янв 14 2025 г., 13:34
-- Версия сервера: 11.6.2-MariaDB-ubu2404
-- Версия PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `developmentdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Дамп данных таблицы `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `doctor_id`, `description`, `user_id`, `pet_id`, `date`) VALUES
(7, 4, 'Broke a leg', 3, 3, '2025-01-31'),
(8, 4, '343', 3, 3, '2025-01-16'),
(9, 1, 'Ate a bone', 3, 3, '2025-01-29');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_services`
--

CREATE TABLE `doctor_services` (
  `name` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Дамп данных таблицы `doctor_services`
--

INSERT INTO `doctor_services` (`name`, `user_id`, `id`) VALUES
('Higher Education', 1, 1),
('Veterinary paramedic', 1, 2),
('Zoopsychologist', 1, 3),
('Pet healing', 4, 4),
('Diagnostogic', 4, 5),
('Surgeryнн', 4, 6),
('Observation', 4, 7),
('Pe767676767', 4, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `pets`
--

CREATE TABLE `pets` (
  `name` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(8) NOT NULL,
  `year` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Дамп данных таблицы `pets`
--

INSERT INTO `pets` (`name`, `user_id`, `id`, `type`, `year`) VALUES
('Tima', 2, 1, 'Cat', '15'),
('Sharik', 2, 2, 'Dog', '5'),
('Pupsikkk', 3, 3, 'Cat', '15'),
('patrick', 3, 4, 'Cat', '89'),
('patrick', 3, 5, 'Cat', '20'),
('Rick Owens', 3, 6, 'Dog', '22');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `img_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `login`, `user_type`, `name`, `img_name`) VALUES
(1, 'doctor@doctor.com', '+380999999999', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'doctor', 1, 'John Silver', NULL),
(2, 'client@client.com', '+380963451123', '62608e08adc29a8d6dbc9754e659f125', 'client', 0, 'Oleg Kotin', NULL),
(3, 'test8@gmail.com', '+380677705165', 'b25ef06be3b6948c0bc431da46c2c738', 'client8', 0, 'Frank Senatraa', NULL),
(4, 'test9@gmail.com', '+380688805175', '5d69dd95ac183c9643780ed7027d128a', 'doctor9', 1, 'Johan Liebert', NULL),
(5, 'meravej04555@gmail.com', '+38067770517599', '069103d83d40b742a336dee5fb92f4e5', 'client88', 0, 'RiKiTac', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctor_services`
--
ALTER TABLE `doctor_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `doctor_services`
--
ALTER TABLE `doctor_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
