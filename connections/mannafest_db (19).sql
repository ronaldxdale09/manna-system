-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 07:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mannafest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `vcode` varchar(40) DEFAULT NULL,
  `date_registered` date NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `postal` int(11) DEFAULT NULL,
  `d_address` text NOT NULL,
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `cvv` int(11) NOT NULL,
  `ipaddress` text NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `name`, `lastname`, `email`, `user_type`, `vcode`, `date_registered`, `password`, `mobile_number`, `photo`, `birthdate`, `address`, `postal`, `d_address`, `cardname`, `cardnumber`, `cvv`, `ipaddress`, `status`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', NULL, '2022-01-31', 'eldwUUFNbnlSUWZEYjVrUjhrTmRBUT09', NULL, NULL, '0000-00-00', '', NULL, '', '', '', 0, '', '1'),
(24, 'Courier', 'Number 1', 'courier@mail.com', 'courier', NULL, '2022-10-06', 'eldwUUFNbnlSUWZEYjVrUjhrTmRBUT09', '0935223232', '', '0000-00-00', '', NULL, '', '', '', 0, '', NULL),
(56, 'Test', 'Abby', 'abby@gmail.com', 'client', NULL, '2022-12-13', 'SW5GcnNoSWlEUVpnQ0VmTGlOTE50QT09', '+639352232051', NULL, '2022-12-13', 'Southcom Village', NULL, 'Southcom Village', '', '', 0, '::1', '1'),
(59, 'Walk-in', 'Customer', 'walkin@walkin.com', 'walkin', NULL, '2023-01-05', 'N25RNHZNWkNINExELzMyeTJDMGIyQT09', NULL, '', '0000-00-00', '', NULL, '', '', '', 0, '', NULL),
(60, 'Distributor', 'Distributor', 'distributor@distributor.com', 'client', NULL, '2023-01-10', 'Distributor', NULL, '', '0000-00-00', '', NULL, '', '', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_ship_address`
--

CREATE TABLE `account_ship_address` (
  `ship_id` int(11) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_ship_address`
--

INSERT INTO `account_ship_address` (`ship_id`, `contact_name`, `phone_number`, `address`, `postal_code`, `user_id`, `status`) VALUES
(22, 'Test Abby', '09456517431', 'Southcom Village', '7000', 56, 1),
(24, 'rd', '9352232051', 'Southcom Village', '7000', 56, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemprice` float NOT NULL,
  `total` float NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `datecreated`) VALUES
(19, 'Breads', '2022-10-05 20:41:27'),
(20, 'Biscuits', '2022-10-05 20:41:40'),
(21, 'Cakes', '2022-10-05 20:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `chat_acc`
--

CREATE TABLE `chat_acc` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('Guest','Operator') NOT NULL,
  `secret` varchar(255) NOT NULL DEFAULT '',
  `last_seen` datetime NOT NULL,
  `status` enum('Occupied','Waiting','Idle') NOT NULL DEFAULT 'Idle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_acc`
--

INSERT INTO `chat_acc` (`id`, `email`, `password`, `full_name`, `role`, `secret`, `last_seen`, `status`) VALUES
(1, 'operator@example.com', '$2y$10$thE7hIJF/EJvKjmJy7hd5uH3a/BNgSUepkYoES0q80YEzi7VqWsRG', 'Operator', 'Operator', '$2y$10$lqkp9JCHT3QGvWtaiyK9AOFRI1aU9FSUXIU1iNn4f0KNtUEJOfmRW', '2022-12-12 17:52:48', 'Occupied'),
(13, 'admin@admin.com', '', 'Test Compression', 'Guest', '$2y$10$brLdwYENyI6JlrQa7lDHFeoKvulXXg3NKyw8vOZwEnqvwu.SBK1vu', '2022-12-12 17:51:13', 'Occupied'),
(14, 'devweb09@gmail.com', '', 'Test Compression', 'Guest', '$2y$10$2YXDy1SwZTb6G4EjfDobg.4TtXSGHbGStAqvixfJE8HJ56wg6eoI.', '2022-12-15 16:56:18', 'Waiting'),
(15, 'ron@ronaldxdale.online', '', 'ron dale', 'Guest', '$2y$10$lojmcv.eWLMfHU9PtPkdHODL6yo2p2mLU4wGsHnaTLJnWGsqlvtE.', '2022-12-16 06:32:18', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `account_sender_id` int(11) NOT NULL,
  `account_receiver_id` int(11) NOT NULL,
  `submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `account_sender_id`, `account_receiver_id`, `submit_date`) VALUES
(9, 7, 1, '2022-12-12 17:46:18'),
(10, 13, 1, '2022-12-12 17:49:38'),
(11, 14, 1, '2022-12-12 17:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `courier_trans`
--

CREATE TABLE `courier_trans` (
  `courier_trans_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `total_remit` varchar(255) DEFAULT NULL,
  `total_cash_onhand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_trans`
--

INSERT INTO `courier_trans` (`courier_trans_id`, `user_id`, `date`, `total_amount`, `total_remit`, `total_cash_onhand`) VALUES
(7, 24, '2023-01-11', '78', '78', '0');

-- --------------------------------------------------------

--
-- Table structure for table `distributor_details`
--

CREATE TABLE `distributor_details` (
  `dis_id` int(11) NOT NULL,
  `distributor_name` varchar(255) NOT NULL,
  `distributor_contact` varchar(255) DEFAULT NULL,
  `distributor_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor_details`
--

INSERT INTO `distributor_details` (`dis_id`, `distributor_name`, `distributor_contact`, `distributor_address`) VALUES
(1, 'John Dalipe', '0912345678', 'Zamboanga'),
(2, 'Ron Dale', '2323232', 'Zamboanga');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `account_id`, `msg`, `submit_date`) VALUES
(13, 10, 1, 'asd', '2022-12-12 17:51:26'),
(14, 11, 1, 'Hello\\', '2022-12-12 17:52:12'),
(15, 11, 14, 'kumusta?', '2022-12-12 17:52:21'),
(16, 11, 1, 'yo', '2022-12-12 17:52:26'),
(17, 11, 14, 'ano problema?', '2022-12-12 17:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `otp-sms`
--

CREATE TABLE `otp-sms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp-sms`
--

INSERT INTO `otp-sms` (`id`, `user_id`, `mobile_number`, `otp`, `status`) VALUES
(16, 41, '+639352232051', '397227', 0),
(17, 42, '+639352232051', '732404', 0),
(18, 43, '+639352232051', '767737', 0),
(19, 44, '+639352232051', '411957', 0),
(20, 45, '+639352232051', '310027', 0),
(21, 46, '+639352232051', '145284', 0),
(22, 47, '+639352232051', '166735', 0),
(23, 48, '+639352232051', '112808', 1),
(24, 48, '+639352232051', '508642', 0),
(25, 48, '+639352232051', '501150', 0),
(26, 48, '+639352232051', '751108', 0),
(27, 48, '+639352232051', '348783', 0),
(28, 48, '+639352232051', '505324', 0),
(29, 48, '+639352232051', '275852', 1),
(30, 49, '+639456517431', '848253', 0),
(31, 49, '+639456517431', '853882', 0),
(32, 49, '+639456517431', '744001', 0),
(33, 49, '+639456517431', '415018', 0),
(34, 49, '+639456517431', '223037', 0),
(35, 50, '+639352232051', '971355', 0),
(36, 50, '+639352232051', '277342', 0),
(37, 50, '+639352232051', '175461', 0),
(38, 51, '+639352232051', '951935', 0),
(39, 52, '+639352232051', '638052', 0),
(40, 53, '+639352232051', '140009', 0),
(41, 54, '+639456517431', '416164', 1),
(42, 54, '+639456517431', '988144', 0),
(43, 54, '+639456517431', '626732', 1),
(44, 55, '+639352232051', '181457', 1),
(45, 56, '+639352232051', '665625', 0),
(46, 57, '+639559906613', '119936', 1),
(47, 56, '+639352232051', '205134', 1),
(48, 58, '+639361778011', '315524', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `is_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `user_id`, `reset_token`, `is_valid`) VALUES
(1, 54, '8S1naruYsjTP', 1),
(2, 54, 'cKDLhjkWQT8x', 1),
(3, 54, 'yhPaDpJYHUKd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `p_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`p_id`, `prod_id`, `photo`) VALUES
(96, 64, '315521030_849567313135975_4976028542777019927_n.jpg'),
(101, 69, 'burger_buns.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `stockAlert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `barcode`, `name`, `description`, `cat_id`, `cost`, `price`, `datecreated`, `ingredients`, `stockAlert`) VALUES
(64, '123456', 'test prod 1', '', 19, 20, 39, '2023-01-06 03:41:26', ',', NULL),
(69, '439238493', 'Burger Buns', '', 19, 10, 20, '2023-01-08 21:08:36', ',', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_log`
--

CREATE TABLE `production_log` (
  `log_id` int(11) NOT NULL,
  `production_code` varchar(255) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `qty_added` int(11) DEFAULT NULL,
  `qty_remaining` int(11) DEFAULT NULL,
  `prod_date` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_log`
--

INSERT INTO `production_log` (`log_id`, `production_code`, `prod_id`, `qty_added`, `qty_remaining`, `prod_date`, `exp_date`, `price`, `cost`, `status`) VALUES
(15, 'P2023003', 64, 50, 0, '2023-01-07', '2023-01-09', NULL, NULL, 'EMPTY'),
(16, 'P2023004', 65, 23, 23, '2023-01-08', '2023-01-09', NULL, NULL, 'EXPIRED'),
(17, 'P2023005', 69, 20, 20, '2023-01-08', '2023-01-10', NULL, NULL, 'EXPIRED'),
(18, 'P2023006', 64, 10, 3, '2023-01-11', '2023-01-13', NULL, NULL, 'ACTIVE'),
(19, 'P2023005', 64, 20, 20, '2023-01-12', '2023-01-14', NULL, NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

CREATE TABLE `product_quantity` (
  `prod_qty_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`prod_qty_id`, `prod_id`, `quantity`) VALUES
(27, 52, 0),
(28, 53, 0),
(29, 54, 0),
(30, 55, 0),
(31, 56, 10),
(32, 64, 1072),
(33, 65, 23),
(35, 0, 0),
(36, 0, 0),
(37, 69, 18);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `minvalue_toavail` float NOT NULL,
  `discount` float NOT NULL,
  `datecreated` datetime NOT NULL,
  `expiration-date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promo_id`, `code`, `minvalue_toavail`, `discount`, `datecreated`, `expiration-date`) VALUES
(7, 'Sokx8', 1000, 100, '2023-01-11 03:57:45', 'No Expiry'),
(8, 'h90AW', 10, 20, '2023-01-11 04:03:50', '2023-01-10T04:09'),
(11, '3qbyZ', 1000, 100, '2023-01-11 04:09:15', '2023-01-20T04:09'),
(12, 'aasYp', 400, 100, '2023-01-11 04:23:55', 'No Expiry');

-- --------------------------------------------------------

--
-- Table structure for table `returnrequest`
--

CREATE TABLE `returnrequest` (
  `return_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_rating`, `user_review`, `datetime`, `user_id`, `prod_id`) VALUES
(10, 4, 'asdasd', 1672594266, 56, 37),
(11, 5, 'TEST', 1672850481, 56, 33),
(12, 4, 'test review 12345', 1672941134, 56, 33),
(14, 4, 'amazing', 1673007918, 56, 64);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `autoReceived` int(11) DEFAULT NULL,
  `minTotalOrder` int(11) DEFAULT NULL,
  `minMaxOrder` int(11) DEFAULT NULL,
  `deliveryMessage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempuser`
--

CREATE TABLE `tempuser` (
  `temp_id` int(11) NOT NULL,
  `ipaddress` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `deliveryaddr` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `postal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempuser`
--

INSERT INTO `tempuser` (`temp_id`, `ipaddress`, `datecreated`, `lastname`, `firstname`, `birthdate`, `address`, `deliveryaddr`, `email`, `password`, `mobile_number`, `postal`) VALUES
(4, '::1', '2022-01-03 13:55:01', 'Distributor', 'Distributor', '2023-01-11', 'Zamboanga', 'Zamboanga', 'james@gmail.com', '12345', '9361778011', '7302'),
(5, '192.168.1.3', '2022-02-01 08:10:52', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(7, '127.0.0.1', '2022-05-12 06:16:20', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(8, '112.198.98.100', '2022-12-13 15:09:59', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(9, '69.171.231.117', '2022-12-13 15:12:02', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(10, '69.171.231.120', '2022-12-13 15:12:03', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(11, '69.171.231.118', '2022-12-13 15:12:05', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(12, '131.226.114.40', '2022-12-13 15:14:44', 'Egido', 'Danny Mae', '2022-12-13', 'San jose road', 'Yehey drive', 'egido123@mail.com', 'password', '9559906613', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_log`
--

CREATE TABLE `traffic_log` (
  `traffic_id` int(11) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traffic_log`
--

INSERT INTO `traffic_log` (`traffic_id`, `device_type`, `date`) VALUES
(1, 'computer', '2023-01-07 21:35:08'),
(2, 'computer', '2023-01-08 07:13:02'),
(3, 'computer', '2023-01-08 07:22:26'),
(4, 'computer', '2023-01-08 07:25:03'),
(10, 'computer', '2023-01-08 18:37:58'),
(11, 'computer', '2023-01-09 03:32:06'),
(12, 'computer', '2023-01-09 14:59:43'),
(13, 'computer', '2023-01-10 15:42:21'),
(14, 'computer', '2023-01-10 18:54:15'),
(15, 'computer', '2023-01-10 19:46:02'),
(16, 'computer', '2023-01-10 19:49:07'),
(17, 'computer', '2023-01-10 20:22:39'),
(18, 'computer', '2023-01-10 21:11:48'),
(19, 'computer', '2023-01-10 22:21:50'),
(20, 'computer', '2023-01-11 10:04:24'),
(21, 'computer', '2023-01-11 10:22:40'),
(22, 'computer', '2023-01-11 13:28:13'),
(23, 'computer', '2023-01-11 15:26:21'),
(24, 'computer', '2023-01-11 17:07:39'),
(25, 'computer', '2023-01-11 17:37:58'),
(26, 'computer', '2023-01-11 17:39:19'),
(27, 'computer', '2023-01-11 18:24:21'),
(28, 'computer', '2023-01-11 18:37:14'),
(29, 'computer', '2023-01-11 18:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `photo_proof` text DEFAULT NULL,
  `status` text NOT NULL,
  `ship_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prod_log_id` int(11) DEFAULT NULL,
  `dis_id` int(11) DEFAULT NULL,
  `delivery_rider` varchar(255) DEFAULT NULL,
  `delivery_rider_id` int(11) DEFAULT NULL,
  `trans_changes` int(11) DEFAULT NULL,
  `trans_pay` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `user_id`, `paymentmethod`, `datecreated`, `photo_proof`, `status`, `ship_id`, `type`, `prod_log_id`, `dis_id`, `delivery_rider`, `delivery_rider_id`, `trans_changes`, `trans_pay`) VALUES
(47, 59, 'cash', '2023-01-06 03:14:18', '', 'walkin-completed', NULL, 'walkin', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 56, 'cod', '2023-01-06 04:03:26', 'test.png', 'completed', NULL, 'online', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 56, 'cod', '2023-01-08 14:50:40', 'png-clipart-congratulations-illustration-prize-award-united-states-award-wish-text-removebg-preview.png', 'ready', NULL, 'online', 51, NULL, '24,Courier Number 1 | Contact : 0935223232', 24, NULL, NULL),
(55, NULL, 'cash', '2023-01-10 23:49:46', NULL, 'distributor-completed', NULL, 'distributor', NULL, 1, NULL, NULL, NULL, NULL),
(56, NULL, 'cash', '2023-01-11 02:43:54', NULL, 'distributor-completed', NULL, 'distributor', NULL, 2, NULL, NULL, NULL, NULL),
(57, 59, 'cash', '2023-01-11 02:49:26', NULL, 'walkin-completed', NULL, 'walkin', NULL, NULL, NULL, NULL, 419, 799),
(58, 59, 'cash', '2023-01-11 03:21:37', NULL, 'walkin-completed', NULL, 'walkin', NULL, NULL, NULL, NULL, 20, 100),
(59, 56, 'cod', '2023-01-11 04:37:24', NULL, 'completed', NULL, 'online', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 59, 'cash', '2023-01-12 01:50:41', NULL, 'walkin-completed', NULL, 'walkin', NULL, NULL, NULL, NULL, 622, 700),
(64, NULL, 'cash', '2023-01-12 02:20:04', NULL, 'Distributor-pending', NULL, 'distributor', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_record`
--

CREATE TABLE `trans_record` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `disc` double DEFAULT NULL,
  `dfee` double DEFAULT NULL,
  `date_ordered` date NOT NULL,
  `total` float NOT NULL,
  `pm` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_record`
--

INSERT INTO `trans_record` (`order_id`, `prod_id`, `transaction_id`, `quantity`, `price`, `disc`, `dfee`, `date_ordered`, `total`, `pm`, `user_id`) VALUES
(132, 64, 49, 2, 39, 0, 100, '2023-01-06', 78, 'pending', 56),
(133, 64, 50, 1, 39, 0, 100, '2023-01-06', 39, 'pending', 56),
(134, 64, 51, 2, 39, 0, 100, '2023-01-08', 78, 'pending', 56),
(136, 64, 55, 6, 39, NULL, NULL, '0000-00-00', 234, '', 59),
(138, 69, 56, 1, 20, NULL, NULL, '0000-00-00', 20, '', 59),
(139, 69, 57, 19, 20, NULL, NULL, '0000-00-00', 380, '', 59),
(140, 69, 58, 4, 20, NULL, NULL, '0000-00-00', 80, '', 59);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `account_ship_address`
--
ALTER TABLE `account_ship_address`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat_acc`
--
ALTER TABLE `chat_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_trans`
--
ALTER TABLE `courier_trans`
  ADD PRIMARY KEY (`courier_trans_id`);

--
-- Indexes for table `distributor_details`
--
ALTER TABLE `distributor_details`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp-sms`
--
ALTER TABLE `otp-sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `production_log`
--
ALTER TABLE `production_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD PRIMARY KEY (`prod_qty_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempuser`
--
ALTER TABLE `tempuser`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `traffic_log`
--
ALTER TABLE `traffic_log`
  ADD PRIMARY KEY (`traffic_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `account_ship_address`
--
ALTER TABLE `account_ship_address`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chat_acc`
--
ALTER TABLE `chat_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courier_trans`
--
ALTER TABLE `courier_trans`
  MODIFY `courier_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distributor_details`
--
ALTER TABLE `distributor_details`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `otp-sms`
--
ALTER TABLE `otp-sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `production_log`
--
ALTER TABLE `production_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `prod_qty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempuser`
--
ALTER TABLE `tempuser`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `traffic_log`
--
ALTER TABLE `traffic_log`
  MODIFY `traffic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `trans_record`
--
ALTER TABLE `trans_record`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD CONSTRAINT `trans_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_record_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
