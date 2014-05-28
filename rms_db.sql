-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2014 at 12:39 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ospos_app_config`
--

CREATE TABLE IF NOT EXISTS `ospos_app_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_app_config`
--

INSERT INTO `ospos_app_config` (`key`, `value`) VALUES
('address', 'suntonpon@hotmail.com'),
('company', 'Motel Management'),
('currency_side', 'currency_side'),
('currency_symbol', '฿'),
('custom10_name', '0'),
('custom1_name', '0'),
('custom2_name', '0'),
('custom3_name', '0'),
('custom4_name', '0'),
('custom5_name', '0'),
('custom6_name', '0'),
('custom7_name', '0'),
('custom8_name', '0'),
('custom9_name', '0'),
('default_tax_1_name', '0'),
('default_tax_1_rate', '0'),
('default_tax_2_name', '0'),
('default_tax_2_rate', '0'),
('default_tax_rate', '8'),
('email', 'suntonpon@hotmail.com'),
('fax', '-'),
('language', 'english'),
('phone', '0910344556'),
('print_after_sale', '0'),
('return_policy', '0'),
('timezone', 'Asia/Bangkok'),
('website', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ospos_booking_detail`
--

CREATE TABLE IF NOT EXISTS `ospos_booking_detail` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `booking_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `booking_price` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `person_id` int(10) NOT NULL,
  `booking_status` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `person_id` (`person_id`),
  KEY `person_id_2` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `ospos_booking_detail`
--

INSERT INTO `ospos_booking_detail` (`booking_id`, `room_id`, `booking_type`, `booking_price`, `start_time`, `end_time`, `person_id`, `booking_status`) VALUES
(128, 16, 'temporaly', 300, '2014-05-25 12:20:04', '2014-05-25 13:57:16', 1, 'close'),
(130, 15, 'temporaly', 300, '2014-05-25 11:23:33', '2014-05-25 13:57:30', 1, 'close'),
(173, 16, 'temporaly', 300, '2014-05-25 13:04:29', '2014-05-25 16:04:11', 1, 'close'),
(174, 15, 'temporaly', 300, '2014-05-25 13:04:58', '2014-05-25 16:04:18', 1, 'close'),
(175, 15, 'temporaly', 300, '2014-05-27 00:24:46', '2014-05-25 16:05:29', 22, 'close'),
(176, 16, 'temporaly', 300, '2014-05-25 13:11:47', '2014-05-25 16:11:34', 22, 'close'),
(177, 18, 'temporaly', 100, '2014-05-25 16:24:59', '2014-05-25 19:23:10', 1, 'close'),
(178, 16, 'temporaly', 300, '2014-05-27 00:51:28', '2014-05-25 19:24:43', 22, 'close'),
(179, 18, 'temporaly', 100, '2014-05-26 16:49:33', '2014-05-26 04:01:52', 1, 'close'),
(180, 18, 'temporaly', 100, '2014-05-27 00:24:46', '2014-05-26 19:51:15', 1, 'close'),
(181, 15, 'temporaly', 300, '2014-05-27 00:27:38', '2014-05-27 03:27:35', 1, 'close'),
(182, 15, 'temporaly', 300, '2014-05-27 00:36:29', '2014-05-27 03:36:26', 1, 'close'),
(183, 15, 'temporaly', 300, '2014-05-27 00:37:19', '2014-05-27 03:37:03', 1, 'close'),
(184, 15, 'temporaly', 300, '2014-05-27 00:45:10', '2014-05-27 03:40:27', 1, 'close'),
(185, 15, 'temporaly', 300, '2014-05-27 01:25:05', '2014-05-27 04:25:05', 1, 'close'),
(186, 18, 'temporaly', 100, '2014-05-27 10:43:20', '2014-05-27 13:43:20', 1, 'close'),
(187, 15, 'temporaly', 300, '2014-05-27 10:44:17', '2014-05-27 13:44:17', 1, 'close'),
(188, 18, 'temporaly', 100, '2014-05-28 00:20:57', '2014-05-28 03:20:57', 1, 'close'),
(189, 35, 'night', 100, '2014-05-28 00:21:08', '2014-05-29 05:00:00', 1, 'open'),
(190, 36, 'temporaly', 300, '2014-05-28 00:21:15', '2014-05-28 03:21:15', 1, 'close'),
(191, 37, 'temporaly', 300, '2014-05-28 00:21:20', '2014-05-28 03:21:20', 1, 'close'),
(192, 34, 'temporaly', 300, '2014-05-28 00:21:27', '2014-05-28 03:21:27', 1, 'close'),
(193, 15, 'temporaly', 300, '2014-05-28 00:21:33', '2014-05-28 03:21:33', 1, 'close'),
(194, 16, 'temporaly', 300, '2014-05-28 00:22:02', '2014-05-28 03:22:02', 1, 'close'),
(195, 18, 'temporaly', 100, '2014-05-28 00:23:00', '2014-05-28 03:23:00', 1, 'close'),
(196, 18, 'temporaly', 100, '2014-05-28 00:23:00', '2014-05-28 03:23:00', 1, 'close'),
(197, 15, 'temporaly', 300, '2014-05-28 00:23:06', '2014-05-28 03:23:06', 1, 'close'),
(198, 16, 'night', 1000, '2014-05-28 00:23:13', '2014-05-29 05:00:00', 1, 'open'),
(199, 18, 'night', 1000, '2014-05-28 00:23:20', '2014-05-29 05:00:00', 1, 'close'),
(200, 18, 'night', 1000, '2014-05-28 00:23:28', '2014-05-29 05:00:00', 1, 'close'),
(201, 34, 'temporaly', 300, '2014-05-28 00:23:48', '2014-05-28 03:23:48', 1, 'close'),
(202, 36, 'temporaly', 300, '2014-05-28 00:23:55', '2014-05-28 03:23:55', 1, 'close'),
(203, 18, 'temporaly', 100, '2014-05-28 00:24:32', '2014-05-28 03:24:32', 1, 'close'),
(204, 15, 'temporaly', 300, '2014-05-28 08:19:54', '2014-05-28 11:19:54', 1, 'open'),
(205, 18, 'temporaly', 100, '2014-05-28 08:20:04', '2014-05-28 11:20:04', 1, 'open'),
(206, 34, 'temporaly', 300, '2014-05-28 08:20:11', '2014-05-28 11:20:11', 1, 'open'),
(207, 36, 'temporaly', 300, '2014-05-28 08:20:18', '2014-05-28 11:20:18', 1, 'open'),
(208, 37, 'temporaly', 300, '2014-05-28 08:21:19', '2014-05-28 11:21:19', 1, 'open'),
(209, 38, 'temporaly', 250, '2014-05-28 09:58:04', '2014-05-28 12:58:04', 1, 'open'),
(210, 39, 'temporaly', 250, '2014-05-28 09:58:11', '2014-05-28 12:58:11', 1, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `ospos_employees`
--

CREATE TABLE IF NOT EXISTS `ospos_employees` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_employees`
--

INSERT INTO `ospos_employees` (`username`, `password`, `person_id`, `deleted`) VALUES
('admin', '439a6de57d475c1a0ba9bcb1c39f0af6', 1, 0),
('padungsak', '031ab4bcca10b7e46a4df04c81a414e3', 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ospos_modules`
--

CREATE TABLE IF NOT EXISTS `ospos_modules` (
  `name_lang_key` varchar(255) NOT NULL,
  `desc_lang_key` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `desc_lang_key` (`desc_lang_key`),
  UNIQUE KEY `name_lang_key` (`name_lang_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_modules`
--

INSERT INTO `ospos_modules` (`name_lang_key`, `desc_lang_key`, `sort`, `module_id`) VALUES
('module_config', 'module_config_desc', 100, 'config'),
('module_employees', 'module_employees_desc', 80, 'employees'),
('module_reports', 'module_reports_desc', 50, 'reports'),
('module_rooms_booking', 'module_rooms_booking_desc', 10, 'rooms_booking'),
('module_rooms_manage', 'module_rooms_manage_desc', 30, 'rooms_manage');

-- --------------------------------------------------------

--
-- Table structure for table `ospos_people`
--

CREATE TABLE IF NOT EXISTS `ospos_people` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ospos_people`
--

INSERT INTO `ospos_people` (`first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `comments`, `person_id`) VALUES
('John', 'Doe', '555-555-5555', 'admin@pappastech.com', 'Address 1', '', '', '', '', '', '', 1),
('padungsak', 'suntonphon', '', '', '', '', '', '', '', '', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `ospos_permissions`
--

CREATE TABLE IF NOT EXISTS `ospos_permissions` (
  `module_id` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`module_id`,`person_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_permissions`
--

INSERT INTO `ospos_permissions` (`module_id`, `person_id`) VALUES
('config', 1),
('employees', 1),
('reports', 1),
('rooms_booking', 1),
('rooms_manage', 1),
('rooms_booking', 22);

-- --------------------------------------------------------

--
-- Table structure for table `ospos_rooms`
--

CREATE TABLE IF NOT EXISTS `ospos_rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `tempPrice` int(11) NOT NULL,
  `temp_duration` int(11) NOT NULL,
  `nightPrice` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ospos_rooms`
--

INSERT INTO `ospos_rooms` (`room_id`, `name`, `description`, `tempPrice`, `temp_duration`, `nightPrice`, `status`, `deleted`) VALUES
(15, 'Room1', 'room one', 300, 3, 600, 1, 0),
(16, 'Room2', 'room two', 300, 3, 1000, 1, 0),
(17, 'Room10', 'room ten', 300, 3, 600, 1, 1),
(18, 'Room3', 'room three', 100, 3, 1000, 1, 0),
(19, 'Room3', 'room three', 100, 3, 1000, 1, 1),
(20, 'room4', 'room four', 100, 10, 1000, 1, 1),
(21, 'room5', 'room five', 10, 10, 10, 0, 1),
(22, 'room6', 'room six', 10, 10, 10, 0, 1),
(23, 'Room7', 'room seven', 1, 2, 2, 0, 1),
(24, 'Room8', 'Room eight', 11, 1, 1, 0, 1),
(25, 'room9', 'room nine', 100, 10, 100, 1, 1),
(26, 'qqq', 'qqq', 1000, 1, 1, 1, 1),
(27, 'www', 'www', 1, 1, 1, 1, 1),
(28, 'eee', 'eee', 100, 3, 100, 1, 1),
(29, 'rrr', 'rrr', 12, 12, 12, 1, 1),
(30, 'aaa', 'aaa', 1, 1, 1, 1, 1),
(31, 'zzz', 'zzz', 1000, 3, 100, 0, 1),
(32, 'xxx', 'xxx', 100, 3, 100, 1, 1),
(33, 'xxx', 'xxx', 100, 3, 100, 1, 1),
(34, 'room4', 'room four', 300, 3, 1000, 1, 0),
(35, 'Room5', 'Room five', 100, 10, 100, 1, 0),
(36, 'Room6', 'Room six', 300, 3, 1000, 1, 0),
(37, 'Room7', 'Room seven', 300, 3, 600, 1, 0),
(38, 'Room8', 'Room eigth', 250, 3, 600, 1, 0),
(39, 'Room9', 'Room nine', 250, 3, 600, 1, 0),
(40, 'Room10', 'Room ten', 400, 3, 1000, 1, 0),
(41, 'Room11', 'Room eleven', 400, 3, 1000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ospos_sessions`
--

CREATE TABLE IF NOT EXISTS `ospos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ospos_sessions`
--

INSERT INTO `ospos_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('06e86df96ab89d7c942094f392f929b2', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Spark/2.x Safari/537.31', 1401270900, 'a:2:{s:9:"user_data";s:0:"";s:9:"person_id";s:1:"1";}'),
('43cd4f21cc93da18e3f0c26f39a75658', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2; rv:29.0) Gecko/20100101 Firefox/29.0 FirePHP/0.7.4', 1401267972, 'a:2:{s:9:"user_data";s:0:"";s:9:"person_id";s:1:"1";}'),
('525602b118548c27a013e443e9fa92f0', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2; rv:29.0) Gecko/20100101 Firefox/29.0', 1401273004, 'a:2:{s:9:"user_data";s:0:"";s:9:"person_id";s:1:"1";}'),
('7049e7d275818ffd01aae6a933a426c3', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2; rv:29.0) Gecko/20100101 Firefox/29.0', 1401267902, 'a:2:{s:9:"user_data";s:0:"";s:9:"person_id";s:1:"1";}'),
('9bace9bcbcd985b40aae72be0e867b74', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2; rv:29.0) Gecko/20100101 Firefox/29.0', 1401273005, 'a:2:{s:9:"user_data";s:0:"";s:9:"person_id";s:1:"1";}');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ospos_employees`
--
ALTER TABLE `ospos_employees`
  ADD CONSTRAINT `ospos_employees_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`);

--
-- Constraints for table `ospos_permissions`
--
ALTER TABLE `ospos_permissions`
  ADD CONSTRAINT `ospos_permissions_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_employees` (`person_id`),
  ADD CONSTRAINT `ospos_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `ospos_modules` (`module_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
