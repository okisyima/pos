-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2019 at 05:09 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created`, `updated`) VALUES
(1, 'ATK', '2019-08-20 19:01:17', NULL),
(2, 'Elektronik', '2019-08-20 19:01:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Bejoasda', 'L', '09127309', 'Jauh Asli Jauh', '2019-08-20 18:29:45', '2019-08-20 13:52:19'),
(2, 'Kamu', 'P', '09127301927', 'Kamu', '2019-08-20 18:29:45', '0000-00-00 00:00:00'),
(3, 'kampret', 'P', '2234234', '234234', '2019-08-20 18:29:45', '2019-08-20 13:41:26'),
(7, 'dwedwedwed', 'L', '23232', 'sdfsdfasdasd', '2019-08-20 18:52:34', '2019-08-20 13:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(16, 'Z0001', 'KAMU', 1, 1, 1000, 0, 'item-190826-b37bc7935f.png', '2019-08-26 05:31:00', '2019-08-26 00:31:18'),
(18, 'Z0002', 'AKU', 2, 2, 2000, 0, 'item-190826-94766c5fc0.jpg', '2019-08-26 05:37:09', NULL),
(20, '@okkunc', 'aaaaaaaaaaaaaaa', 2, 1, 111111, 0, NULL, '2019-08-26 17:12:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(129) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Joy', '082210415514', 'Kampung Baru', 'Toko yang higienis', '2019-08-18 12:48:25', NULL),
(3, 'Kamu', '091283102937', 'Kamu', 'Kamu', '2019-08-18 13:05:15', NULL),
(4, 'Dia', '01729310971', 'Dia', 'Dia', '2019-08-18 13:05:15', NULL),
(5, 'asdasdasd', '235234234231', 'adasdasdasdasda', 'dddddddddddddddddddddddd', '2019-08-18 13:55:19', '2019-08-18 09:32:05'),
(7, 'cccccccccccccccc', '33333333333', 'zxcscsdcs', 'sdcsdcsdc', '2019-08-22 21:03:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `created`, `updated`) VALUES
(1, 'pack', '2019-08-20 19:55:18', NULL),
(2, 'liter', '2019-08-20 19:55:18', NULL),
(9, 'ons', '2019-08-24 10:55:37', NULL),
(10, 'kilogram', '2019-08-24 10:55:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mantappu', 'Jauh', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Maskas', 'Dekat', 2),
(4, 'admin2', '85ac21413f7f6288d9361297fab9cb49b7f200c2', 'Oki Kuncoro', 'Jauh Ajah', 2),
(9, 'aaa', '76c0af47fddcd9d6ea61bebe31bc73422c4c6b9b', 'ohyeah', 'kamu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
