-- phpMyAdmin SQL Dump
-- version 4.0.10.2
-- http://www.phpmyadmin.net
--
-- Хост: librar00.mysql.ukraine.com.ua
-- Время создания: Май 22 2015 г., 09:39
-- Версия сервера: 5.1.72-cll-lve
-- Версия PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `librar00_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`, `firstname`, `lastname`, `email`) VALUES
(1, 'san1', '897c8fde25c5cc5270cda61425eed3c8', 'a6aefbaa76fc38902ef24bce49302cd5', '1315901526', 'Александр', 'Шеховцов', 'shehovtsov_av@mail.ru'),
(2, 'san25', '897c8fde25c5cc5270cda61425eed3c8', 'e46438ea742f68829cc4e97a0f0fe5a2', '1315901526', 'Александр', 'Шеховцов', 'shehovtsov_av@mail.ru'),
(12, 'alexsheh', '224cf2b695a5e8ecaecfb9015161fa4b', 'a3b9a81d83f061b27413b417841715c4', '1315901526', 'Саша', 'Саша', 'example@mail.ru'),
(17, 'san10', '897c8fde25c5cc5270cda61425eed3c8', '12f9c0e249dbb8b50e0d311e6b7c228e', '1315901526', 'Александр', 'Шеховцов', 'shehovtsov_av@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `client_parameters`
--

CREATE TABLE IF NOT EXISTS `client_parameters` (
  `news` tinyint(4) NOT NULL,
  `act` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`par_id`),
  UNIQUE KEY `par_id` (`par_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `client_parameters`
--

INSERT INTO `client_parameters` (`news`, `act`, `user_id`, `par_id`) VALUES
(1, 1, 1, 1),
(0, 1, 2, 2),
(1, 1, 12, 12),
(0, 1, 17, 17);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `client_parameters`
--
ALTER TABLE `client_parameters`
  ADD CONSTRAINT `client_parameters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
