-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 05:05 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agile`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `productId` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_id` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `del` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `amount`, `productId`, `bill_id`, `status`, `description`, `del`) VALUES
('5d7f4a023734363868832a78', 4, '5d7f415f3734363868d42e70', '5d7f4a023734363868b0cf98', NULL, NULL, NULL),
('5d7f6b486237380b44bd9922', 1, '5d7f50c66237380b4466220a', '5d7f6b486237380b44dcb406', NULL, NULL, NULL),
('5d80a5466237380b443b8fa3', 3, '5d7f50c66237380b4466220a', '5d80a5466237380b44153bfd', NULL, NULL, NULL),
('5d80a5466237380b44d5ac57', 3, '5d7f415f3734363868d42e70', '5d80a5466237380b44153bfd', NULL, NULL, NULL),
('5d8b8ff06237380b448a4d7d', 1, '5d7f50c66237380b4466220a', '5d8b8ff06237380b44eaa2d6', NULL, NULL, NULL),
('5d8c87c16237380b44965453', 1, '5d7f50c66237380b4466220a', '5d8c87c16237380b442b12e9', NULL, NULL, NULL),
('5d8db5a46237380b445b1087', 1, '5d7f50c66237380b4466220a', '5d8db5a46237380b44babec5', NULL, NULL, 1),
('5d8db5a46237380b44744a8e', 2, '5d7f415f3734363868d42e70', '5d8db5a46237380b44babec5', NULL, NULL, 1),
('5d948d896237380b441cc234', 1, '5d7f50c66237380b4466220a', '5d948d896237380b44939a17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_bill`
--

CREATE TABLE `order_bill` (
  `id` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `totalPrice` int(30) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `userId` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `del` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_bill`
--

INSERT INTO `order_bill` (`id`, `totalPrice`, `timestamp`, `userId`, `status`, `description`, `del`) VALUES
('5d7f4a023734363868b0cf98', 40000, '2019-09-16 15:38:26', '1', NULL, NULL, NULL),
('5d7f6b486237380b44dcb406', 10000, '2019-09-16 18:00:24', '1', NULL, NULL, NULL),
('5d80a5466237380b44153bfd', 345000, '2019-09-17 16:20:06', '1', NULL, NULL, NULL),
('5d8b8ff06237380b44eaa2d6', 15000, '2019-09-25 23:04:00', '1', NULL, NULL, NULL),
('5d8c87c16237380b442b12e9', 15000, '2019-09-26 16:41:21', '1', NULL, NULL, NULL),
('5d8db5a46237380b44babec5', 215000, '2019-09-27 14:09:24', '1', NULL, NULL, NULL),
('5d948d896237380b44939a17', 15000, '2019-10-02 18:44:09', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(20) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `del` tinyint(4) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `status`, `description`, `del`, `image`) VALUES
('5d7f415f3734363868d42e70', 'Mực chiên', 70000, '', '', NULL, 'public/images/mucchien.jpeg'),
('5d7f50c66237380b4466220a', 'Bánh mì thịt', 15000, 'Còn hàng', 'Bánh mì nhận chả lụa, thịt, jambon,...', NULL, 'public/images/banhmithit.jpg'),
('5d980c9a3030360ecc9d4ff3', 'Mì gói', 3000, 'Còn hàng', '', NULL, 'public/images/migoi.jpg'),
('5d980d4c3030360ecc7a93c4', 'Phô mai', 5000, 'Hết', 'Phô mai con bò cười', NULL, 'public/images/phomai.jpg'),
('5d9824ff3030361e84fd1e91', 'Sandwich', 20000, 'Còn hàng', '', NULL, 'public/images/sandwich.jpg'),
('5d9885263030361e846811e4', 'Snack', 2300, 'Hết', 'Bánh dành cho trẻ em', NULL, 'public/images/snack.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissionId` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `storeId` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `del` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `phone`, `permissionId`, `storeId`, `del`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', '1', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `bill_detail_fk0` (`bill_id`) USING BTREE,
  ADD KEY `bill_detail_product_id_fk` (`productId`) USING BTREE;

--
-- Indexes for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
