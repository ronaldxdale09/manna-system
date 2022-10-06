-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 02:40 AM
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
  `photo` text DEFAULT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `d_address` text NOT NULL,
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `cvv` int(11) NOT NULL,
  `ipaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `name`, `lastname`, `email`, `user_type`, `vcode`, `date_registered`, `password`, `photo`, `birthdate`, `address`, `d_address`, `cardname`, `cardnumber`, `cvv`, `ipaddress`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', NULL, '2022-01-31', 'password', NULL, '0000-00-00', '', '', '', '', 0, ''),
(22, 'FUENTEBELLA', 'DALE', 'ronaldxdale@gmail.com', 'client', NULL, '2022-06-16', '12345', NULL, '2022-06-16', 'San Jose Cawa Cawa', 'San Jose Cawa Cawa', '', '', 0, '::1'),
(23, 'RONALD DALE', 'FUENTEBELLA', 'devweb09@gmail.com', 'client', NULL, '2022-10-05', '12345', NULL, '2022-10-05', 'San Jose Cawa Cawa', 'San Jose Cawa Cawa', '', '', 0, '::1'),
(24, 'asd', 'asd', 'courier@mail.com', 'courier', NULL, '2022-10-06', 'password', '', '0000-00-00', '', '', '', '', 0, '');

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
(300, 25, 1, 71.41, 71.41, '22'),
(301, 24, 1, 80.78, 80.78, '22'),
(302, 23, 1, 25, 25, '22');

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
(54, 23, 'product.png'),
(55, 24, 'product.png'),
(56, 25, 'product.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `name`, `description`, `cat_id`, `price`, `datecreated`) VALUES
(23, 'Manna Cream Bread 500g', '', 19, 25, '2022-10-05 20:46:19'),
(24, 'Manna Whole Wheat Bread 560g', '', 19, 80.78, '2022-10-05 20:46:53'),
(25, 'Manna Whole Wheat Bread 500g', '', 19, 71.41, '2022-10-05 20:47:08');

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
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempuser`
--

INSERT INTO `tempuser` (`temp_id`, `ipaddress`, `datecreated`, `lastname`, `firstname`, `birthdate`, `address`, `deliveryaddr`, `email`, `password`, `cardname`, `cardnumber`, `cvv`) VALUES
(4, '::1', '2022-01-03 13:55:01', 'FUENTEBELLA', 'RONALD DALE', '2022-10-06', 'San Jose Cawa Cawa', 'oo', 'devweb09@gmail.com', '12345', '', '', ''),
(5, '192.168.1.3', '2022-02-01 08:10:52', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(7, '127.0.0.1', '2022-05-12 06:16:20', '', '', '0000-00-00', '', '', '', '', '', '', '');

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
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `user_id`, `paymentmethod`, `datecreated`, `photo_proof`, `status`) VALUES
(22, 22, 'cod', '2022-06-16 01:18:52', '', 'completed'),
(23, 22, 'cod', '2022-10-05 21:36:27', '', 'completed');

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

--
-- Dumping data for table `trans_record`
--

INSERT INTO `trans_record` (`order_id`, `prod_id`, `transaction_id`, `quantity`, `price`, `disc`, `dfee`, `date_ordered`, `date_approved`, `date_completed`, `total`, `pm`, `user_id`) VALUES
(88, 23, 23, 7, 25, 0, 100, '2022-10-05', NULL, NULL, 175, 'pending', 22),
(89, 25, 23, 3, 71.41, 0, 100, '2022-10-05', NULL, NULL, 214.23, 'pending', 22),
(90, 24, 23, 1, 80.78, 0, 100, '2022-10-05', NULL, NULL, 80.78, 'pending', 22);

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
(171, 23, '22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

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
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempuser`
--
ALTER TABLE `tempuser`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trans_record`
--
ALTER TABLE `trans_record`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

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
