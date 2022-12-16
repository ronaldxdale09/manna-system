-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 10:27 PM
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
(1, 'admin', 'admin', 'admin@admin.com', 'admin', NULL, '2022-01-31', 'password', NULL, NULL, '0000-00-00', '', NULL, '', '', '', 0, '', '1'),
(24, 'asd', 'asd', 'courier@mail.com', 'courier', NULL, '2022-10-06', 'password', NULL, '', '0000-00-00', '', NULL, '', '', '', 0, '', NULL),
(56, 'Test', 'Abby', 'abby@gmail.com', 'client', NULL, '2022-12-13', '12345', '+639352232051', NULL, '2022-12-13', 'Southcom Village', NULL, 'Southcom Village', '', '', 0, '::1', '1'),
(57, 'Danny Mae', 'Egido', 'egido123@mail.com', 'client', NULL, '2022-12-13', 'password', '+639559906613', NULL, '2022-12-13', 'San jose road', NULL, 'Yehey drive', '', '', 0, '131.226.114.40', '1');

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
(1, 'Mark Tubat', '+639352232051', 'San Jose Cawa Cawa', '7000', 38, 1),
(2, 'FUENTEBELLA RONALD DALE', '9352232051', 'San Jose Cawa Cawa', '7000', 22, 1),
(3, 'Abby Quintos', '9352232051', 'San Jose Cawa Cawa', '7000', 36, 0),
(4, 'FUENTEBELLA RONALD DALE', '9352232051', 'San Jose Cawa Cawa', '7000', 36, 1),
(5, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 39, 1),
(6, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 40, 1),
(7, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 41, 1),
(8, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 42, 1),
(9, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 43, 1),
(10, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 44, 1),
(11, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 45, 1),
(12, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 46, 1),
(13, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 47, 1),
(14, 'asd ronal', '+639352232051', 'Southcom Village', '7000', 48, 1),
(15, 'user test ', '+639456517431', 'test address', '7000', 49, 1),
(16, 'user test ', '+639352232051', 'test address', '7000', 50, 1),
(17, 'user test ', '+639352232051', '3434', '3444', 51, 1),
(18, 'user test ', '+639352232051', '123', '123', 52, 1),
(19, 'user test ', '+639352232051', 'asd', '12345', 53, 1),
(20, 'user test ', '+639456517431', 'test address', '7000', 54, 1),
(21, 'user test ', '+639352232051', '2asdad', '2333', 55, 1),
(22, 'Test Abby', '+639352232051', 'Southcom Village', '7000', 56, 0),
(23, 'Danny Mae Egido', '+639559906613', 'Yehey drive', '7000', 57, 1),
(24, 'rd', '9352232051', 'Southcom Village', '7000', 56, 1);

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `quantity`, `itemprice`, `total`, `user_id`) VALUES
(293, 19, 1, 249.99, 249.99, '21'),
(296, 22, 10, 600, 6000, '22'),
(310, 25, 5, 71.41, 4284.6, '22'),
(311, 25, 1, 71.41, 71.41, '32'),
(313, 24, 1, 80.78, 80.78, '25'),
(314, 23, 1, 25, 25, '32'),
(315, 26, 9, 25, 9072000, '32'),
(319, 31, 2, 48, 96, '31'),
(328, 0, 2, 0, 0, '38'),
(346, 54, 1, 20, 20, '55'),
(347, 51, 2, 20, 40, '55'),
(348, 38, 1, 41.47, 41.47, '55'),
(349, 37, 1, 61.74, 61.74, '55'),
(350, 34, 1, 28.29, 28.29, '55'),
(351, 35, 2, 28.29, 56.58, '55'),
(352, 36, 3, 61.19, 367.14, '55'),
(353, 34, 1, 28.29, 28.29, '57'),
(354, 35, 1, 28.29, 28.29, '57');

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
-- Table structure for table `item_inventory`
--

CREATE TABLE `item_inventory` (
  `inv_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(47, 56, '+639352232051', '205134', 1);

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
(64, 33, '188Photo_burger_buns.png'),
(69, 37, 'choco_creambread_wChocochips.png'),
(93, 61, 'ccs-grand-alumni-7f7854da-048e-43c3-8d93-e3e4bc2bae50.jpg');

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
  `ingredients` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `barcode`, `name`, `description`, `cat_id`, `cost`, `price`, `datecreated`, `ingredients`) VALUES
(33, NULL, 'Manna Cream Bread  500g', '', 19, NULL, 55.26, '2022-11-30 22:19:59', ','),
(37, NULL, 'Manna CHOCO Cream Bread 440g', '', 19, NULL, 61.74, '2022-11-30 22:24:10', 'Sugar,'),
(61, '4324512', 'Tide with Downy - Garden Bloom 380g', '232', 19, NULL, NULL, '2022-12-16 01:07:15', ',');

-- --------------------------------------------------------

--
-- Table structure for table `production_log`
--

CREATE TABLE `production_log` (
  `log_id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `qty_added` int(11) DEFAULT NULL,
  `prod_date` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_log`
--

INSERT INTO `production_log` (`log_id`, `prod_id`, `qty_added`, `prod_date`, `exp_date`) VALUES
(2, 28, 1234, '2022-11-20', '2022-11-20'),
(3, 28, 1000, '2022-11-20', '2022-11-20'),
(4, 28, 2, '2022-11-20', '2022-11-20'),
(5, 28, 1000, '2022-11-20', '2022-11-20'),
(6, 31, 100, '2022-11-20', '2022-12-02'),
(7, 33, 1000, '2022-12-15', '2022-12-18'),
(8, 33, 1000, '2022-12-15', '2022-12-15');

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
(2, 28, 1002),
(3, 29, 23),
(4, 30, 20),
(5, 31, 150),
(6, 32, 0),
(7, 33, 2000),
(8, 34, 0),
(9, 35, 0),
(10, 0, 0),
(11, 36, 0),
(12, 37, 0),
(13, 38, 0),
(14, 39, 0),
(15, 40, 0),
(16, 41, 10),
(17, 42, 0),
(18, 43, 10),
(19, 44, 0),
(20, 45, 0),
(21, 46, 0),
(22, 47, 10),
(23, 48, 1),
(24, 49, 0),
(25, 50, 0),
(26, 51, 0),
(27, 52, 0),
(28, 53, 0),
(29, 54, 0),
(30, 55, 0),
(31, 56, 10);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `maxvalue_toavail` float NOT NULL,
  `discount` float NOT NULL,
  `datecreated` datetime NOT NULL,
  `expiration-date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `user_id`, `prod_id`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691, NULL, NULL),
(9, 'Ronald Dale', 5, 'Awesome', 1621935691, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_prod`
--

CREATE TABLE `stock_prod` (
  `id` int(11) NOT NULL,
  `production_code` varchar(255) NOT NULL,
  `date_produced` date NOT NULL,
  `expiration_date` date NOT NULL
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
(4, '::1', '2022-01-03 13:55:01', 'Abby', 'Test', '2022-12-13', 'Southcom Village', 'Southcom Village', 'abby@gmail.com', '12345', '9352232051', '7000'),
(5, '192.168.1.3', '2022-02-01 08:10:52', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(7, '127.0.0.1', '2022-05-12 06:16:20', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(8, '112.198.98.100', '2022-12-13 15:09:59', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(9, '69.171.231.117', '2022-12-13 15:12:02', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(10, '69.171.231.120', '2022-12-13 15:12:03', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(11, '69.171.231.118', '2022-12-13 15:12:05', '', '', '0000-00-00', '', '', '', '', NULL, ''),
(12, '131.226.114.40', '2022-12-13 15:14:44', 'Egido', 'Danny Mae', '2022-12-13', 'San jose road', 'Yehey drive', 'egido123@mail.com', 'password', '9559906613', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paymentmethod` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `photo_proof` text NOT NULL,
  `status` text NOT NULL,
  `ship_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `user_id`, `paymentmethod`, `datecreated`, `photo_proof`, `status`, `ship_id`) VALUES
(22, 22, 'cod', '2022-06-16 01:18:52', '', 'completed', NULL),
(23, 22, 'cod', '2022-10-05 21:36:27', '', 'completed', NULL),
(24, 22, 'cod', '2022-10-06 09:13:03', 'collection-of-png-sun-rays-png-transparent-png-kindpng.png', 'completed', NULL),
(25, 25, 'cod', '2022-10-06 09:30:29', '', 'completed', NULL),
(26, 25, 'deliver', '2022-10-06 09:31:51', '', 'completed', NULL),
(27, 25, 'cod', '2022-10-06 09:35:37', '', 'completed', NULL),
(28, 31, 'cod', '2022-11-20 20:44:41', 'wheat_bread2.png', 'completed', NULL),
(29, 31, 'cod', '2022-11-20 22:43:45', 'biscocho_200g.png', 'completed', NULL),
(30, 36, 'cod', '2022-12-03 23:41:47', 'wheat440g.png', 'completed', NULL),
(31, 36, 'deliver', '2022-12-04 18:46:58', '', 'completed', NULL),
(32, 36, 'cod', '2022-12-05 21:02:13', '', 'completed', NULL),
(33, 36, 'cod', '2022-12-05 23:26:03', '', 'completed', NULL),
(34, 36, 'cod', '2022-12-06 00:05:08', '', 'pending', NULL),
(35, 36, 'cod', '2022-12-06 00:05:42', '', 'pending', NULL),
(36, 54, 'cod', '2022-12-12 21:45:30', '296471866_441810287676475_2071318071340032639_n.jpg', 'completed', NULL),
(37, 54, 'cod', '2022-12-13 06:06:21', '', 'ready', NULL),
(38, 55, 'cod', '2022-12-13 08:02:38', '', 'delivered', NULL);

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
  `date_approved` date DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `total` float NOT NULL,
  `pm` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `prod_id`, `user_id`) VALUES
(166, 22, '12'),
(167, 20, '12'),
(172, 23, '22');

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
-- Indexes for table `item_inventory`
--
ALTER TABLE `item_inventory`
  ADD PRIMARY KEY (`inv_id`);

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
-- Indexes for table `stock_prod`
--
ALTER TABLE `stock_prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempuser`
--
ALTER TABLE `tempuser`
  ADD PRIMARY KEY (`temp_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `account_ship_address`
--
ALTER TABLE `account_ship_address`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

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
-- AUTO_INCREMENT for table `item_inventory`
--
ALTER TABLE `item_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `otp-sms`
--
ALTER TABLE `otp-sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `production_log`
--
ALTER TABLE `production_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `prod_qty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_prod`
--
ALTER TABLE `stock_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempuser`
--
ALTER TABLE `tempuser`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `trans_record`
--
ALTER TABLE `trans_record`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

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
