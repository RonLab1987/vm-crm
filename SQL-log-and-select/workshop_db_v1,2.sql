-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 17 2015 г., 13:12
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `ord_mech_id` int(11) DEFAULT NULL,
  `ord_client_note` text,
  `ord_internal_note` text,
  PRIMARY KEY (`ord_id`),
  KEY `ord_cl_id` (`ord_cl_id`),
  KEY `ord_mech_id` (`ord_mech_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatuslist`
--

CREATE TABLE IF NOT EXISTS `orderstatuslist` (
  `osl_id` int(11) NOT NULL AUTO_INCREMENT,
  `osl_ord_id` int(11) NOT NULL,
  `osl_os_id` int(11) NOT NULL,
  PRIMARY KEY (`osl_id`),
  KEY `osl_ord_id` (`osl_ord_id`),
  KEY `osl_os_id` (`osl_os_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
