-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2017 г., 19:47
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MyBase`
--
CREATE DATABASE IF NOT EXISTS `MyBase` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `MyBase`;

-- --------------------------------------------------------

--
-- Структура таблицы `BoardGames`
--

CREATE TABLE `BoardGames` (
  `games_id` int(20) NOT NULL,
  `titleGame` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price_$` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `BoardGames`
--

INSERT INTO `BoardGames` (`games_id`, `titleGame`, `description`, `price_$`) VALUES
(1, 'Monopoly', 'Monopoly is a board game where players roll two six-sided dice to move around the game-board buying and trading properties, and then develop them with houses and hotels.', '11'),
(2, 'The Settlers of Catan', ' Players assume the roles of settlers, each attempting to build and develop holdings while trading and acquiring resources. Players are awarded points as their settlements grow.', '15'),
(3, 'Ticket to Ride', ' Ticket to Ride is a cross-country train adventure where players collect cards of various types of train cars that enable them to claim railway routes connecting cities in various countries around the world.', '20');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `time_comment` datetime NOT NULL,
  `text_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `time_comment`, `text_comment`, `name`, `page`) VALUES
(155, '2017-10-12 16:39:40', 'hello', 'odd', 'monopoly'),
(156, '2017-10-12 16:52:13', 'nice game', 'user', 'monopoly'),
(157, '2017-10-12 18:21:35', 'have fun:)', 'user', 'monopoly'),
(158, '2017-10-22 17:14:55', 'goog game', 'odd', 'monopoly');

-- --------------------------------------------------------

--
-- Структура таблицы `functions`
--

CREATE TABLE `functions` (
  `function_id` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `function_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `functions`
--

INSERT INTO `functions` (`function_id`, `description`, `function_name`) VALUES
(1, 'просмотр списка пользователей', 'f2'),
(2, 'доступ к личному кабинету', 'f3'),
(3, 'редактирование пользовалеля', 'f1');

-- --------------------------------------------------------

--
-- Структура таблицы `functions_roles`
--

CREATE TABLE `functions_roles` (
  `function_id` int(10) NOT NULL,
  `roles_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `functions_roles`
--

INSERT INTO `functions_roles` (`function_id`, `roles_id`) VALUES
(2, 2),
(1, 3),
(2, 3),
(1, 4),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170929044607, 'CreateGamesTable', '2017-09-30 12:55:18', '2017-09-30 12:55:18', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `roles_id` int(10) NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`roles_id`, `roles`) VALUES
(1, 'guest'),
(2, 'user'),
(3, 'moder'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 NOT NULL,
  `activation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` int(11) NOT NULL DEFAULT '0',
  `regTime` datetime NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `email`, `activation`, `status`, `role`, `avatar`, `regTime`, `role_id`) VALUES
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@mail.com', '1c910a0824942ef9696d21451b0a7dc0', 1, 'user', 6, '0000-00-00 00:00:00', 2),
(7, 'freeman', '6636e1322531bd6a9bf66f3c3aabd8d6', 'freeman@mail.com', '8c4bd61d0b63e7245e02c0ac40d29958', 1, 'user', 0, '0000-00-00 00:00:00', 2),
(8, 'odd', 'a2b6f2a6066ed8700d83335fc50a2b8e', 'odd@mail.com', '9458d02b5737b65c5ab06f46c25dd133', 1, 'moder', 8, '0000-00-00 00:00:00', 3),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.com', '883c28fda533005665f16f3a51722035', 1, 'admin', 0, '0000-00-00 00:00:00', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `BoardGames`
--
ALTER TABLE `BoardGames`
  ADD PRIMARY KEY (`games_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`function_id`),
  ADD KEY `function_id` (`function_id`),
  ADD KEY `function_id_2` (`function_id`);

--
-- Индексы таблицы `functions_roles`
--
ALTER TABLE `functions_roles`
  ADD KEY `function_id` (`function_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Индексы таблицы `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roles_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT для таблицы `functions`
--
ALTER TABLE `functions`
  MODIFY `function_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `roles_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `functions_roles`
--
ALTER TABLE `functions_roles`
  ADD CONSTRAINT `functions_roles_ibfk_1` FOREIGN KEY (`function_id`) REFERENCES `functions` (`function_id`),
  ADD CONSTRAINT `functions_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `role` (`roles_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`roles_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
