-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2023 at 09:19 AM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kathasagar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('e6db8fad863196e947cbab7d1db78f7d43ae0abf', '103.85.11.108', 1692455448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353434383b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('475dcf751fe41726f3e003bedeab5f551484764b', '103.85.11.108', 1692455278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353237383b),
('2eba556810e1f795e944a5906768b43bc58ce6ec', '103.85.11.108', 1692455279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353237393b),
('2c295c7f296fe135f9f919fd970b663de64bb3f3', '103.85.11.108', 1692455289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353238393b),
('7f6b6dfe918a1168d02466f24c6334554a7f7d5d', '103.85.11.108', 1692455399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353339393b),
('e0921900dfd8cb6d9b73a34eaf02c43775caf446', '103.85.11.108', 1692455765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353736353b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b6d6573736167657c613a323a7b693a303b733a313a2231223b693a313b733a33323a224e6f74696669636174696f6e207375636365737366756c6c792061646465642e223b7d5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('b56841bf39915f8e58ab29aa7c8bd36cde64a7c9', '103.85.11.108', 1692455519, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353531393b),
('5771d61ca5f750b0a15714c3eac61a321c58c4cd', '103.85.11.108', 1692455639, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353633393b),
('a53fa4cf0036892eaad30210fa3fda385731bb7c', '103.85.11.108', 1692455759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353735393b),
('4586f8580e4ab3b50d9f6171fee5c2a347932e7f', '103.85.11.108', 1692456070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363037303b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('58de559e8a3c975f1c4a452b4fa6e9b1161832b4', '103.85.11.108', 1692455879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353837393b),
('1408bf21ff157ed1d4051084527ba772286ab186', '103.85.11.108', 1692455999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435353939393b),
('c4091e444f218ca89c39d6b44e6bc4899caf6a60', '103.85.11.108', 1692456623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363632333b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('f70ddba7c766c8e9cd9ceb5e5d4bbc3f7a24af54', '103.85.11.108', 1692456119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363131393b),
('2d63dc031842da076ad5454d281264e693f5409e', '103.85.11.108', 1692456427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363432373b),
('e7156ae6f1e1416b917a4cf8639e5fe36e29a4e5', '162.19.161.214', 1692456571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363537313b),
('68e0cbe53d1d9d45f2eb6aa61176c1a1484a0fd1', '162.19.161.214', 1692456599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363539393b),
('0b7d59780f8fec961c09708937f78fc43bc2b1c4', '103.85.11.108', 1692456924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363932343b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('e57df41b6cd739cb3174ae519eeff3803a9c7690', '103.85.11.108', 1692456668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363636383b),
('12387f69d98dc7ccb744edc72092dbb9fd16c9f4', '103.85.11.108', 1692456789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363738393b),
('002285c9818bab2d2bde3ec3e62e72befc5f7410', '103.85.11.108', 1692456908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435363930383b),
('afdd05554dc62cd5e022c53b55efe69a5eef44a6', '103.85.11.108', 1692457416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373431363b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('8967c7547d2e987b7f43bc5f73df1b8c7e0d5a88', '103.85.11.108', 1692457057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373035373b),
('a49fa191fbb3b34f01b27963013c37c3f83f6b77', '103.85.11.108', 1692457254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373235343b),
('02f27088e43f8fe119809d94a5f2456772d6e7e8', '103.85.11.108', 1692457765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373736353b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('44108985a231185dadd79fb2a6cfa7eaa1af7fd4', '103.85.11.108', 1692457432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373433323b),
('93d748d7a1f20fafc4363f79d452dd5e2513995d', '103.85.11.108', 1692457552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373535323b),
('db5b14a7c6d373496cd61485ab6f6bfc1d65bd32', '103.85.11.108', 1692458094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435383039343b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b),
('7d342322abf4a7f2f97915e7630e50ec3b4ff64e', '103.85.11.108', 1692460063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436303036333b6d6573736167657c613a323a7b693a303b733a313a2230223b693a313b733a32363a22496e76616c696420656d61696c206f722070617373776f72642e223b7d5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('695858c5ac12ec1a729da65e37ede7ebc1f2eace', '52.90.178.83', 1692459480, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435393438303b),
('7fc61a034abd2d8f39c37593ca71197c802cfd91', '54.159.17.55', 1692459481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435393438313b),
('0ebd7c818fc3bd43ab1320c3d7e995e57884be65', '52.90.178.83', 1692459490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435393439303b),
('a6433a4183e85dc1da73edfaffebb8653060c8f8', '103.85.11.108', 1692460413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436303431333b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b6d6573736167657c613a323a7b693a303b733a313a2231223b693a313b733a31383a225375636365737366756c6c79206c6f67696e223b7d5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('5d4f7fb1891ecb02d1ce229b6fadb92a5c625d40', '103.85.11.108', 1692460850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436303835303b69647c733a313a2231223b6e616d657c733a333a224d6178223b636f6d70616e795f6e616d657c4e3b67726f75705f69647c733a313a2232223b6c616e677c733a323a22656e223b),
('e2bf70d6d498cb34209d72290d8e11246709262f', '103.85.11.108', 1692461169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436313136393b69647c733a313a2231223b6e616d657c733a333a224d6178223b636f6d70616e795f6e616d657c4e3b67726f75705f69647c733a313a2232223b6c616e677c733a323a22656e223b),
('8237b232f6dd06f867135b9b9baf15e93b785e29', '103.85.11.108', 1692461484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436313438343b69647c733a313a2231223b6e616d657c733a333a224d6178223b636f6d70616e795f6e616d657c4e3b67726f75705f69647c733a313a2232223b6c616e677c733a323a22656e223b),
('0b5cd84cd6e45302ec2f184b15da35c0c7535164', '103.85.11.108', 1692461792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436313739323b69647c733a313a2231223b6e616d657c733a333a224d6178223b636f6d70616e795f6e616d657c4e3b67726f75705f69647c733a313a2232223b6c616e677c733a323a22656e223b),
('d5d527d52e07896a6ee4fd7599f614a83d5aaade', '103.85.11.108', 1692461797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323436313739323b69647c733a313a2231223b6e616d657c733a393a22776172627572746f6e223b636f6d70616e795f6e616d657c733a393a22576172627572746f6e223b67726f75705f69647c733a313a2231223b6c616e677c733a323a22656e223b6d6573736167657c613a323a7b693a303b733a313a2231223b693a313b733a31383a225375636365737366756c6c79206c6f67696e223b7d5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `entity` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `entity`, `name`, `created_on`, `updated_on`) VALUES
(10, 1, 'Maintenance', '2023-08-10 19:11:22', NULL),
(11, 1, 'Housekeeping', '2023-08-10 19:11:33', NULL),
(12, 6, 'K_P', '2023-08-18 23:34:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` text,
  `lattitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `entity` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `emp_lat` float DEFAULT NULL,
  `emp_long` float DEFAULT NULL,
  `device_id` text,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `lattitude`, `longitude`, `entity`, `manager`, `department`, `emp_lat`, `emp_long`, `device_id`, `created_on`, `updated_on`) VALUES
(1, 'Hary', 'Potter', 'hary@gmail.com', 123456789, '123456', 23.071, 72.5635, 1, 1, 10, 54.2961, -130.34, 'fB4GTz83T-6rxQA78iQA2A:APA91bHPcefbAkfw6dmEJCdayNG_aaT_XhVsbbInUv-mw3ql_vuuwOa5gwJeUPhfCeA5R67DMi49lU8sCgIvtn4iLbYPgYudPp-hJjvpoA0R2mdeTZCiA0AlkSaJgpXbg84JtiY2Flxv', '2023-07-19 17:30:02', '2023-07-26 19:36:18'),
(2, 'Leo', 'Harmony', 'leo@gmail.com', 12345689, '123456', 11.2, 32.63, 1, 1, 10, NULL, NULL, 'ebhYPK8YRYWxf0BUnFhVfl:APA91bEUPIQHyaxGD6eXKNA3V4-NXB77DmEyMA8O3CSDH75Oro5ykKyspaM7yCwLXZPxbIODOcdMxv_WuRxkNYOYq6Hbq8Ikuih3XWXY0bN8LIN1IlM1a5kbA7aHx3DG_dpbnhc8ZBH9', '2023-07-26 19:14:27', '2023-08-12 14:49:40'),
(3, 'Krunal', 'Nathani', 'krunal@gmail.com', 1234512345, '123456', 12.2, 12.5, 1, 1, 10, NULL, NULL, NULL, '2023-08-05 21:02:27', '2023-08-12 14:50:04'),
(4, 'Donald', 'Trump', 'test@gmail.com', 2147483647, '123456', 12121, 121.122, 1, 1, 10, NULL, NULL, NULL, '2023-08-09 23:06:25', '2023-08-12 14:50:15'),
(5, 'test', 'test', 'test@gmail.com', 123123123, 'test@123', 12.5, 12.5, 6, 3, 12, 54.2961, -130.34, 'fB4GTz83T-6rxQA78iQA2A:APA91bHPcefbAkfw6dmEJCdayNG_aaT_XhVsbbInUv-mw3ql_vuuwOa5gwJeUPhfCeA5R67DMi49lU8sCgIvtn4iLbYPgYudPp-hJjvpoA0R2mdeTZCiA0AlkSaJgpXbg84JtiY2Flxv', '2023-08-18 23:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `name`, `created_on`, `updated_on`) VALUES
(1, 'Highliner Hotel and Plaza', '2023-07-24 18:37:31', '2023-08-10 19:08:20'),
(2, 'Ridge Hotel', '2023-07-24 18:38:44', '2023-08-10 19:08:31'),
(3, '1st Ave Hotel', '2023-07-24 18:38:53', '2023-08-10 19:08:44'),
(5, 'Olde Time Trolley Limited', '2023-08-09 23:01:25', NULL),
(6, 'KP', '2023-08-18 23:34:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` text,
  `entity` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `entity`, `department`, `group_id`, `created_on`, `updated_on`) VALUES
(1, 'Max', 'Smith', 'max@gmail.com', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 1, '10', 2, '2023-07-19 17:29:15', '2023-08-11 15:49:15'),
(2, 'Mahesh', 'Gautam', 'test@gmail.com', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 3, '10', 2, '2023-08-09 23:03:41', '2023-08-12 14:48:48'),
(3, 'KInchan', 'Kinchan', 'john@gmail.com', 123456, 'e10adc3949ba59abbe56e057f20f883e', 6, '12', 2, '2023-08-18 23:35:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `created_on`, `updated_on`) VALUES
(1, 'New', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-08-13 10:27:00', '2023-08-13 10:29:07'),
(2, 'ABC ', 'Test1', '2023-08-13 10:47:02', '2023-08-13 07:07:41'),
(4, 'RCS', 'Lore Ipsum', '2023-08-13 10:47:25', '2023-08-13 07:12:54'),
(5, 'New Notification', 'This is Notification', '2023-08-15 12:40:31', NULL),
(6, 'dsdsdsfdsf', 'fsdfdsfsdfdsffdsf', '2023-08-15 14:16:48', NULL),
(7, 'fdssdfsd', 'fdsfsdfdsfsdfdsdfsdsd', '2023-08-15 14:17:36', NULL),
(8, 'gfdgdg', 'gdfgfdgdfgdfgdgdgf', '2023-08-15 14:28:21', NULL),
(9, 'Test 123', 'This is Independence day.', '2023-08-16 13:43:53', NULL),
(10, 'Independence Day', 'This is Independent.', '2023-08-16 13:59:16', NULL),
(11, 'New One', 'This is New One.', '2023-08-16 14:01:27', NULL),
(12, 'Jackson', 'Shshhshhzhbxxhx', '2023-08-16 14:25:56', NULL),
(13, 'Nnnn', 'This is update. ', '2023-08-16 14:27:36', NULL),
(14, 'Yyyyy', 'Tchvgvvh hvhhvfgh', '2023-08-16 14:29:33', NULL),
(15, 'Jsjssn', 'Jsjjssjsb', '2023-08-16 15:50:22', NULL),
(16, 'Judge', 'This is New One.', '2023-08-17 02:09:55', NULL),
(17, 'This day', 'New one', '2023-08-17 02:15:13', NULL),
(18, 'New one', 'Test for you', '2023-08-17 02:16:58', NULL),
(19, 'New Test', 'This is my day. ', '2023-08-17 02:18:47', NULL),
(20, 'Hshssh', 'Jsksnxjnsnsjs', '2023-08-17 02:20:07', NULL),
(21, 'This one', 'This is new one', '2023-08-17 02:27:14', NULL),
(22, 'This is new', 'Djjsjkzjzkzmkz', '2023-08-17 02:27:37', NULL),
(23, 'ljfodsf', 'fkkfksdf;sd;lfds', '2023-08-18 08:38:33', NULL),
(24, 'gfgdfgd', 'dgdfgfdgdfgdf', '2023-08-18 08:39:22', NULL),
(25, 'Thus is One', ';ldgxfgldmfg', '2023-08-18 08:40:57', NULL),
(26, 'gdfdfg', 'dfgdfgdfgdfg', '2023-08-18 08:45:49', NULL),
(27, 'sdfsdfdf', 'dsfdsfdsfsdfs', '2023-08-19 10:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `entity` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `description` longtext,
  `request_approved` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `entity`, `department`, `manager`, `employee`, `description`, `request_approved`, `created_on`, `updated_on`) VALUES
(1, 1, 10, 1, 2, 'This is my request. ', NULL, NULL, NULL),
(2, 1, 10, 1, 1, 'Thanks', 1, NULL, NULL),
(3, 6, 12, 3, 5, 'Test', 1, NULL, NULL),
(4, 1, 10, 1, 1, 'Hello \nGood morning', 1, NULL, NULL),
(5, 1, 10, 1, 2, 'This is present. ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `entity` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `entity`, `department`, `manager`, `employee`, `created_on`, `updated_on`) VALUES
(10, 1, 10, 1, 1, '2023-08-10 07:29:10', NULL),
(11, 1, 10, 1, 1, '2023-08-18 23:33:26', NULL),
(12, 6, 12, 3, 5, '2023-08-18 23:39:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_shift`
--

CREATE TABLE `schedule_shift` (
  `id` int(11) NOT NULL,
  `schedule_tbl_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `shift_status` varchar(255) DEFAULT NULL,
  `emp_start_time` time DEFAULT NULL,
  `emp_end_time` time DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_shift`
--

INSERT INTO `schedule_shift` (`id`, `schedule_tbl_id`, `shift_id`, `date`, `start_time`, `end_time`, `shift_status`, `emp_start_time`, `emp_end_time`, `created_on`, `updated_on`) VALUES
(1, 10, 1, '2023-08-09', '22:00:00', '21:00:00', 'initiated', NULL, NULL, '2023-08-10 08:52:30', '2023-08-17 07:14:57'),
(2, 10, 2, '2023-08-10', '22:00:00', '21:00:00', 'initiated', NULL, NULL, '2023-08-10 08:52:30', '2023-08-17 07:14:57'),
(3, 10, 3, '2023-08-13', '10:00:00', '14:00:00', 'initiated', '21:45:00', '21:45:00', '2023-08-10 08:52:30', '2023-08-17 07:14:57'),
(4, 10, 4, '2023-08-13', '15:00:00', '21:00:00', 'initiated', '21:45:00', '21:45:00', NULL, '2023-08-17 07:14:57'),
(5, 10, 5, '2023-08-14', '10:00:00', '14:00:00', 'initiated', '20:56:00', '20:56:00', NULL, '2023-08-17 07:14:57'),
(6, 10, 6, '2023-08-16', '09:00:00', '17:00:00', 'initiated', '23:59:00', '23:59:00', NULL, '2023-08-17 07:14:57'),
(7, 10, 7, '2023-08-17', '10:30:00', '17:30:00', 'completed', '22:43:00', '22:43:00', NULL, '2023-08-17 13:13:56'),
(8, 10, 8, '2023-08-17', '16:46:00', '20:50:00', 'start', '22:43:00', NULL, NULL, '2023-08-17 13:13:58'),
(9, 11, 1, '2023-08-18', '21:01:00', '22:33:00', 'initiated', NULL, NULL, '2023-08-18 23:33:26', NULL),
(10, 12, 1, '2023-08-19', '09:00:00', '10:42:00', 'initiated', NULL, NULL, '2023-08-18 23:39:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lattitude` int(11) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_code` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_time` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0 = Inactive, 1 = Active',
  `last_login` int(10) UNSIGNED DEFAULT NULL COMMENT 'Unixtimestamp',
  `created_on` datetime NOT NULL COMMENT 'Unixtimestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `slug`, `name`, `company_name`, `phone`, `email`, `profile_image`, `password`, `lattitude`, `longitude`, `group_id`, `activation_code`, `forgotten_code`, `forgotten_time`, `is_active`, `last_login`, `created_on`) VALUES
(1, 1, 'warburton', 'warburton', 'Warburton', '123456789', 'admin@gmail.com', 'uploads/profile/profile_1678945316734.jpg', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, NULL, NULL, NULL, 1, 1692461796, '0000-00-00 00:00:00'),
(2, 2, 'abc', 'Krunal', 'Abc', '123412314', 'john@gmail.com', 'sdfsf', '123', 12, 50, 1, '123', '12313', NULL, 1, NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_shift`
--
ALTER TABLE `schedule_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule_shift`
--
ALTER TABLE `schedule_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
