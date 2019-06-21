-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2019 г., 14:05
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skalar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL COMMENT 'id',
  `full_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'full name user',
  `theme` int(11) NOT NULL COMMENT 'theme',
  `review` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'review',
  `creation_date` datetime NOT NULL COMMENT 'creation date',
  `evaluation` int(11) NOT NULL COMMENT 'like',
  `file` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'uploaded file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `full_name`, `theme`, `review`, `creation_date`, `evaluation`, `file`) VALUES
(1, 'Hugh Johnston', 2, 'I propose to improve the visual design of the site :)', '2019-06-19 15:10:03', 3, NULL),
(2, 'Sandra Morris', 2, 'I propose to improve the visual design of the site :)', '2019-06-20 12:41:32', 2, NULL),
(3, 'Mabel Santos', 3, 'I am outraged! :(', '2019-06-20 12:53:38', 1, NULL),
(4, 'Marlene Hawkins', 1, 'Thanks for the available information!', '2019-06-20 12:58:36', 2, NULL),
(5, 'Jan Greer', 1, 'Thanks for the available information!', '2019-06-20 14:30:50', 3, NULL),
(6, 'Pablo Hayes', 1, 'Thanks for the available information!', '2019-06-20 15:37:42', 3, NULL),
(7, 'Rodolfo Torres', 2, 'I propose to improve the visual design of the site :)', '2019-06-20 15:40:56', 3, NULL),
(9, 'Cornelius Daniels', 3, 'I am outraged! :(', '2019-06-20 17:38:55', 2, NULL),
(10, 'Alison Lyons', 1, 'Thanks for the available information!', '2019-06-20 17:49:30', 3, NULL),
(11, 'Herman Thomas', 1, 'Thanks for the available information!', '2019-06-20 17:53:39', 4, NULL),
(12, 'Lola	Hunter', 1, 'Thanks for the available information!', '2019-06-21 11:04:38', 4, NULL),
(13, 'Benjamin	Butler', 3, 'I am outraged! :(', '2019-06-21 12:50:06', 3, NULL),
(14, 'Evelyn	Rodgers', 1, 'Thanks for the available information!', '2019-06-21 13:45:59', 3, NULL),
(15, 'Beulah	Houston', 3, 'I am outraged! :(', '2019-06-21 14:00:31', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `topic_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `topic_name`) VALUES
(1, 'Gratitude'),
(2, 'Suggestions for improving'),
(3, 'Complaint');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme` (`theme`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`theme`) REFERENCES `themes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
