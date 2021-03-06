-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2015 г., 18:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bike_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(25) NOT NULL,
  `cl_surname` varchar(25) DEFAULT NULL,
  `cl_patronymic` varchar(25) DEFAULT NULL,
  `cl_phone1` varchar(20) NOT NULL,
  `cl_phone2` varchar(20) DEFAULT NULL,
  `cl_mail` text,
  `cl_other_contact` text,
  `cl_note` text,
  `cl_cs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `cl_cs_id` (`cl_cs_id`),
  KEY `cl_id` (`cl_id`,`cl_phone1`,`cl_phone2`,`cl_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`cl_id`, `cl_name`, `cl_surname`, `cl_patronymic`, `cl_phone1`, `cl_phone2`, `cl_mail`, `cl_other_contact`, `cl_note`, `cl_cs_id`) VALUES
(1, 'Roman', 'Laptev', NULL, '+7(912)337-07-70', '+7(833)243-45-95', NULL, NULL, NULL, NULL),
(3, 'Svetlana', NULL, NULL, '+7(922)913-77-33', NULL, NULL, NULL, NULL, NULL),
(4, 'Спорт Актив', NULL, NULL, '+7(833)236-21-10', NULL, NULL, NULL, NULL, NULL),
(5, 'Владимир', NULL, NULL, '+7(953)789-45-12', NULL, NULL, NULL, NULL, NULL),
(6, 'Вася ', NULL, NULL, '+7(111)111-11-11', NULL, NULL, NULL, NULL, NULL),
(7, 'Fake Test User', NULL, NULL, '+7(000)000-00-00', NULL, NULL, NULL, NULL, NULL),
(8, 'new', NULL, NULL, '+7(000)000-00-01', NULL, NULL, NULL, NULL, NULL),
(9, 'Александр', NULL, NULL, '+7(922)913-07-12', NULL, NULL, NULL, NULL, NULL),
(10, 'еуые', NULL, NULL, '+7(953)654-78-90', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `clientstatus`
--

CREATE TABLE IF NOT EXISTS `clientstatus` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cs_name` varchar(20) DEFAULT NULL,
  `cs_bonus_job` int(11) DEFAULT NULL,
  `cs_bonus_part` int(11) DEFAULT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mechanic`
--

CREATE TABLE IF NOT EXISTS `mechanic` (
  `mech_id` int(11) NOT NULL AUTO_INCREMENT,
  `mech_name` varchar(50) NOT NULL,
  `mech_status` int(11) DEFAULT NULL,
  `mech_acc_id` int(11) DEFAULT NULL,
  `mech_login` text NOT NULL,
  `mech_password` text NOT NULL,
  PRIMARY KEY (`mech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `mechanic`
--

INSERT INTO `mechanic` (`mech_id`, `mech_name`, `mech_status`, `mech_acc_id`, `mech_login`, `mech_password`) VALUES
(0, 'не определен', NULL, NULL, '', ''),
(1, 'Роман', NULL, NULL, 'RonLab', 'GSyngach'),
(2, 'Лёха Маракулин', NULL, NULL, 'benjke', 'benjke');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_cl_id` int(11) NOT NULL,
  `ord_bike` text,
  `ord_start_job` date NOT NULL,
  `ord_finish_job` date DEFAULT NULL,
  `ord_price` int(11) NOT NULL,
  `ord_mech_id` int(11) DEFAULT '0',
  `ord_client_note` text,
  `ord_internal_note` text,
  PRIMARY KEY (`ord_id`),
  KEY `ord_cl_id` (`ord_cl_id`),
  KEY `ord_mech_id` (`ord_mech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`ord_id`, `ord_cl_id`, `ord_bike`, `ord_start_job`, `ord_finish_job`, `ord_price`, `ord_mech_id`, `ord_client_note`, `ord_internal_note`) VALUES
(3, 3, 'Test Bike', '2015-11-16', NULL, 0, 2, NULL, 'Test note. Just test'),
(4, 4, 'Test Bike', '2015-11-18', NULL, 0, 2, NULL, 'Test note. Just test'),
(5, 1, 'Test Bike', '2015-11-18', NULL, 0, 2, NULL, 'Test note. Just test'),
(6, 5, 'Stels Navigator 510', '2015-11-18', NULL, 0, 2, NULL, 'Сделать всё по красоте )'),
(7, 6, 'Forvard 1100', '2015-11-16', NULL, 0, 2, NULL, 'Сделать всё по красоте )'),
(8, 4, 'One more bike', '2015-11-18', NULL, 0, 2, NULL, 'non'),
(9, 7, 'Fake Bike', '2015-11-14', NULL, 0, 2, NULL, 'test note'),
(10, 1, 'test', '2015-11-17', NULL, 0, 2, NULL, 'no'),
(11, 1, 'test', '2015-11-18', NULL, 0, 2, NULL, 'no note'),
(12, 3, 'test', '2015-11-19', NULL, 0, 2, NULL, 'test'),
(13, 7, 'test', '2015-11-19', NULL, 0, 2, NULL, 'test'),
(14, 1, 'wer', '2015-11-19', NULL, 0, 2, NULL, 'rew'),
(15, 1, 'qwe', '2015-11-19', NULL, 0, 2, NULL, 'ewq'),
(16, 8, 'test', '2015-11-19', NULL, 0, 1, NULL, ''),
(17, 8, 'asd', '2015-11-19', NULL, 0, 1, NULL, 'dsa'),
(18, 1, NULL, '0000-00-00', NULL, 0, 1, NULL, NULL),
(19, 1, 'test', '2015-11-20', NULL, 0, 1, NULL, 'test this '),
(20, 1, 'еще тест', '2015-11-25', NULL, 0, 1, NULL, ''),
(21, 9, 'Merida BigNine (black)', '2015-11-25', NULL, 0, 1, NULL, 'настроить переклюки (150+50)\r\nпереборка вилки (450)'),
(22, 10, 'лыоваи', '2015-11-25', NULL, 0, 0, NULL, 'влоситлво'),
(23, 1, 'sw', '2015-12-01', NULL, 0, 0, NULL, 'sdf');

--
-- Триггеры `order`
--
DROP TRIGGER IF EXISTS `onNewOrder`;
DELIMITER //
CREATE TRIGGER `onNewOrder` AFTER INSERT ON `order`
 FOR EACH ROW INSERT INTO `orderstatuslist`(`osl_ord_id`, `osl_os_id`) VALUES ( NEW.ord_id, 1 )
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `orderjoblist`
--

CREATE TABLE IF NOT EXISTS `orderjoblist` (
  `ojl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ojl_ord_id` int(11) NOT NULL,
  `ojl_pl_id` int(11) NOT NULL,
  `ojl_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`ojl_id`),
  KEY `ojl_pl_id` (`ojl_pl_id`),
  KEY `ojl_ord_id` (`ojl_ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orderpartlist`
--

CREATE TABLE IF NOT EXISTS `orderpartlist` (
  `opl_id` int(11) NOT NULL AUTO_INCREMENT,
  `opl_ord_id` int(11) NOT NULL,
  `opl_name` varchar(50) DEFAULT NULL,
  `opl_price_in` int(11) DEFAULT NULL,
  `opl_price_out` int(11) DEFAULT NULL,
  PRIMARY KEY (`opl_id`),
  KEY `opl_ord_id` (`opl_ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `os_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_status` varchar(30) DEFAULT NULL,
  `os_show_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `orderstatus`
--

INSERT INTO `orderstatus` (`os_id`, `os_status`, `os_show_id`) VALUES
(1, 'в работе', 0),
(2, 'готово', 1),
(3, 'архив', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatuslist`
--

CREATE TABLE IF NOT EXISTS `orderstatuslist` (
  `osl_id` int(11) NOT NULL AUTO_INCREMENT,
  `osl_ord_id` int(11) NOT NULL,
  `osl_os_id` int(11) NOT NULL DEFAULT '1',
  `called` tinyint(1) DEFAULT '0',
  `paid` tinyint(1) DEFAULT '0',
  `taken` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`osl_id`),
  KEY `osl_ord_id` (`osl_ord_id`),
  KEY `osl_os_id` (`osl_os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `orderstatuslist`
--

INSERT INTO `orderstatuslist` (`osl_id`, `osl_ord_id`, `osl_os_id`, `called`, `paid`, `taken`) VALUES
(7, 5, 1, 0, 0, 0),
(8, 10, 2, 1, 0, 0),
(9, 11, 2, 1, 0, 0),
(10, 14, 3, 1, 1, 1),
(11, 15, 3, 1, 1, 1),
(12, 3, 1, 0, 0, 0),
(13, 12, 2, 1, 0, 0),
(14, 4, 1, 0, 0, 0),
(15, 8, 2, 0, 0, 0),
(16, 6, 1, 0, 0, 0),
(17, 7, 1, 0, 0, 0),
(18, 9, 2, 0, 0, 0),
(19, 13, 2, 1, 0, 0),
(20, 16, 3, 1, 1, 1),
(21, 17, 3, 1, 1, 1),
(23, 19, 1, 0, 0, 0),
(24, 20, 1, 0, 0, 0),
(25, 21, 1, 0, 0, 0),
(26, 22, 1, 0, 0, 0),
(27, 23, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pricelist`
--

CREATE TABLE IF NOT EXISTS `pricelist` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_plg_id` int(11) NOT NULL,
  `pl_name` mediumtext,
  `pl_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`pl_id`),
  KEY `pl_plg_id` (`pl_plg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `pricelist`
--

INSERT INTO `pricelist` (`pl_id`, `pl_plg_id`, `pl_name`, `pl_price`) VALUES
(1, 1, 'test 1', 100),
(2, 1, 'test 2', 200),
(3, 2, 'test 1', 150),
(4, 2, 'test 2', 250),
(5, 2, 'test 3', 350),
(6, 1, 'test 3', 300),
(7, 4, 'test 1', 100),
(8, 4, 'test 2', 150),
(9, 4, 'test 3', 350),
(10, 5, 'test 1', 350),
(11, 5, 'test 2', 250),
(12, 1, 'test 4', 250),
(13, 4, 'test 4', 290);

-- --------------------------------------------------------

--
-- Структура таблицы `pricelistgroup`
--

CREATE TABLE IF NOT EXISTS `pricelistgroup` (
  `plg_id` int(11) NOT NULL AUTO_INCREMENT,
  `plg_name` char(50) DEFAULT NULL,
  `plg_show_id` int(11) DEFAULT '0',
  PRIMARY KEY (`plg_id`),
  UNIQUE KEY `plg_name` (`plg_name`),
  KEY `plg_name_2` (`plg_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `pricelistgroup`
--

INSERT INTO `pricelistgroup` (`plg_id`, `plg_name`, `plg_show_id`) VALUES
(1, 'Test group 1', 0),
(2, 'Test group 2', 0),
(3, '', 0),
(4, 'Test group 3', 0),
(5, 'Test group 4', 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`cl_cs_id`) REFERENCES `clientstatus` (`cs_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ord_cl_id`) REFERENCES `client` (`cl_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ord_mech_id`) REFERENCES `mechanic` (`mech_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderjoblist`
--
ALTER TABLE `orderjoblist`
  ADD CONSTRAINT `orderjoblist_ibfk_2` FOREIGN KEY (`ojl_pl_id`) REFERENCES `pricelist` (`pl_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderjoblist_ibfk_3` FOREIGN KEY (`ojl_ord_id`) REFERENCES `order` (`ord_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderpartlist`
--
ALTER TABLE `orderpartlist`
  ADD CONSTRAINT `orderpartlist_ibfk_1` FOREIGN KEY (`opl_ord_id`) REFERENCES `order` (`ord_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderstatuslist`
--
ALTER TABLE `orderstatuslist`
  ADD CONSTRAINT `orderstatuslist_ibfk_1` FOREIGN KEY (`osl_ord_id`) REFERENCES `order` (`ord_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderstatuslist_ibfk_2` FOREIGN KEY (`osl_os_id`) REFERENCES `orderstatus` (`os_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pricelist`
--
ALTER TABLE `pricelist`
  ADD CONSTRAINT `pricelist_ibfk_1` FOREIGN KEY (`pl_plg_id`) REFERENCES `pricelistgroup` (`plg_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
