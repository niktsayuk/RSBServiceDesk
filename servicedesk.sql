-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 20:49
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `servicedesk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Проблемы в работе оборудования'),
(2, 'Снятие оборудования'),
(3, 'Установка оборудования'),
(4, 'Редактирование данных');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Клиент'),
(3, 'МПТО'),
(4, 'Техническая поддержка'),
(5, 'МПЭС');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_categories` int NOT NULL,
  `description` text NOT NULL,
  `merchant` text NOT NULL,
  `terminal_id` text NOT NULL,
  `company_name` text NOT NULL,
  `address` text NOT NULL,
  `phone_manager` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `id_user`, `id_categories`, `description`, `merchant`, `terminal_id`, `company_name`, `address`, `phone_manager`) VALUES
(1, 3, 2, 'При оплате картой МИР терминал пищит и на чеке выводит код ответа 909', '9293834321', '29444715', '1', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_profile` int NOT NULL,
  `full_name` text NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `id_profile`, `full_name`, `login`, `password`, `phone`) VALUES
(1, 1, 'Молчанов Павел Андреевич', 'ma-molshanov', 'QAZwsx1234', '+7 929 410 71-72'),
(2, 3, 'Цаюк Никита Сергеевич', 'ns-tsayuk', 'nstsayuk@1', '+7 984 281 40-17'),
(3, 2, 'Ена Ирина Анатольевна', 'ia-ena', 'QWERTY1234', '+7 929 674 20 48'),
(4, 4, 'Караулова Наталья Викторовна', 'nv-karaulova', 'WSXqaz4321', '+7 929 212 48 32'),
(5, 5, 'Караулова Наталья Викторовна', 'nv-karaulova', 'WSXqaz4321', '+7 929 212 48 32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profile` (`id_profile`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
