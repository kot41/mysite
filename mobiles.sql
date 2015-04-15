-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 02 2015 г., 23:12
-- Версия сервера: 5.6.21
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mobiles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
`id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `lang` enum('ru','en','es','') NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `body`, `url`, `lang`, `showhide`, `price`) VALUES
(1, 'Мобильный телефон 1', 'Описание товара', 'mobile_phone_1', 'ru', 'show', '10.000 руб.'),
(2, 'Мобильный телефон 2', 'Описание телефона 2', 'mobile_phone_2', 'ru', 'show', '15000');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
`id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `lang` enum('ru','en','es') NOT NULL DEFAULT 'ru',
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `lang`, `showhide`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт!', 'Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.', 'index', 'ru', 'show', '0000-00-00 00:00:00'),
(2, 'О нас', '123454668789780978', 'about', 'ru', 'show', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalogs`
--
ALTER TABLE `catalogs`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `maintexts`
--
ALTER TABLE `maintexts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalogs`
--
ALTER TABLE `catalogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `maintexts`
--
ALTER TABLE `maintexts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
