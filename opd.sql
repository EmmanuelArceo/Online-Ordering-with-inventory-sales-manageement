-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 04:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opd`
--

-- --------------------------------------------------------

--
-- Table structure for table `addonns`
--

CREATE TABLE `addonns` (
  `addid` int(55) NOT NULL,
  `addcategoryid` int(11) NOT NULL,
  `addname` varchar(255) NOT NULL,
  `addprice` int(55) NOT NULL,
  `addstocks` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieDesc` text NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT 0 COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `userId`, `email`, `phoneNo`, `orderId`, `message`, `time`) VALUES
(1, 3, 'maxjean@gmail.com', 9876543212, 0, 'SDasdASDasdASDasdd', '2024-11-26 21:06:53'),
(2, 4, 'emmanuelarceo@gail.com', 9876543212, 0, 'otw napo yung inorder item?', '2024-11-27 12:49:39'),
(3, 2, 'qwerty@gmail.com', 0, 0, 'asdasdasdasdasd', '2024-11-29 13:57:02'),
(29, 4, 'emmanuelarceo@gail.com', 0, 0, 'asdasdasdasd', '2024-11-29 15:04:09'),
(30, 4, 'emmanuelarceo@gail.com', 0, 3, 'asdasdad', '2024-11-29 15:04:29'),
(31, 4, 'emmanuelarceo@gail.com', 0, 0, 'again agian agianjnskjdansd', '2024-11-29 19:03:13'),
(32, 5, 'emmanuelarcceo@gmail.com', 0, 0, 'example message ', '2024-12-13 13:15:37'),
(33, 6, 'markal@gmail.com', 0, 0, 'example message', '2024-12-13 13:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactreply`
--

INSERT INTO `contactreply` (`id`, `contactId`, `userId`, `message`, `datetime`) VALUES
(1, 3, 2, 'ok asdasd', '2024-11-29 14:02:09'),
(2, 3, 2, 'asdasdasdas', '2024-11-29 14:57:15'),
(3, 31, 4, 'okokok', '2024-11-29 19:03:33'),
(4, 32, 5, 'example', '2024-12-13 13:15:56'),
(5, 33, 6, 'example', '2024-12-13 13:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `deliverydetails`
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliverydetails`
--

INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`, `dateTime`) VALUES
(1, 2, 'mark', 987654545, 45, '2024-12-06 16:47:54'),
(2, 17, 'ran', 987643211, 43, '2024-12-06 17:06:06'),
(3, 19, 'mark ', 9876543218, 45, '2024-12-13 13:12:12'),
(4, 21, 'mark', 987654321, 30, '2024-12-13 13:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `pizzaId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `pizzaId`, `itemQuantity`) VALUES
(2, 2, 53, 1),
(3, 3, 69, 3),
(4, 4, 69, 13),
(5, 5, 69, 1),
(6, 5, 70, 1),
(7, 6, 71, 5),
(8, 7, 71, 3),
(9, 8, 69, 10),
(10, 9, 69, 5),
(11, 10, 69, 3),
(12, 11, 70, 3),
(13, 12, 69, 2),
(14, 12, 70, 2),
(15, 13, 69, 4),
(16, 14, 69, 3),
(17, 15, 70, 1),
(18, 15, 69, 1),
(19, 15, 71, 1),
(20, 16, 69, 2),
(21, 17, 69, 1),
(22, 18, 70, 5),
(23, 19, 69, 1),
(24, 20, 69, 1),
(25, 21, 69, 1),
(26, 22, 78, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(2, 2, 'swedfrgthyjuio, sdfghmjhngbvfcdsxas', 234567, 987654321, 20, '0', '0', '2024-11-25 02:05:50'),
(3, 3, 'asd asd , asd asd asd', 123, 987612345, 177, '0', '1', '2024-11-25 14:06:04'),
(4, 3, 'qwer, asdfasfd', 1234, 987654321, 767, '0', '4', '2024-11-25 14:08:14'),
(5, 3, 'C. Falsa 445, iso 2, Apartament 1', 11001, 9553428400, 118, '0', '4', '2024-11-25 15:19:44'),
(6, 3, 'asd , asdsda', 1234, 987654321, 645, '0', '4', '2024-11-25 15:27:53'),
(7, 2, 'swedfrgthyjuio, asd asd asd', 234567, 987654321, 387, '0', '4', '2024-11-25 15:49:17'),
(8, 3, 'C. Falsa 445, iso 2, Apartament 1', 1234, 980980987, 590, '0', '4', '2024-11-26 20:15:20'),
(9, 3, 'C. Falsa 445, asdfasfd', 1234, 987643212, 295, '0', '0', '2024-11-26 20:58:25'),
(10, 3, 'b22 l42 imus cavite, sdfghmjhngbvfcdsxas', 1234, 987643212, 177, '0', '0', '2024-11-26 20:59:33'),
(11, 3, 'C. Falsa 445, sdfghmjhngbvfcdsxas', 1234, 987654321, 177, '0', '4', '2024-11-26 21:02:46'),
(12, 2, '123 main street, asd asd asd', 123, 987654321, 236, '0', '5', '2024-11-26 21:25:20'),
(13, 2, 'C. Falsa 445, iso 2, Apartament 1', 6543, 987654321, 236, '0', '5', '2024-11-27 12:27:11'),
(14, 4, 'C. Falsa 445, iso 2, Apartament 1', 1234, 987654321, 177, '0', '4', '2024-11-27 12:45:27'),
(15, 4, 'werty, qwert', 4321, 986543211, 247, '0', '4', '2024-12-04 13:21:51'),
(16, 2, 'C. Falsa 445, iso 2, Apartament 1', 123, 987654321, 138, '0', '5', '2024-12-06 16:55:56'),
(17, 2, 'b22 l42 imus cavite, iso 2, Apartament 1', 1234, 987643212, 69, '0', '5', '2024-12-06 17:01:39'),
(18, 2, 'b22 l42 imus cavite, iso 2, Apartament 1', 123, 987654321, 295, '0', '0', '2024-12-07 14:05:13'),
(19, 5, 'C. Falsa 445, iso 2, Apartament 1', 9876, 987654321, 69, '0', '4', '2024-12-13 13:07:56'),
(20, 6, 'C. Falsa 445, iso 2, Apartament 1', 123, 987654321, 69, '0', '5', '2024-12-13 13:26:28'),
(21, 6, 'C. Falsa 445, iso 2, Apartament 1', 123, 987654321, 69, '0', '3', '2024-12-13 13:27:26'),
(22, 6, 'C. Falsa 445, iso 2, Apartament 1', 234567, 987654321, 59, '0', '0', '2024-12-13 13:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizzaId` int(12) NOT NULL,
  `pizzaName` varchar(255) NOT NULL,
  `pizzaPrice` int(12) NOT NULL,
  `pizzaDesc` text NOT NULL,
  `pizzaCategorieId` int(12) NOT NULL,
  `pizzaPubDate` datetime NOT NULL DEFAULT current_timestamp(),
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(50) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'PetBuddy', 'PetBuddy@gmail.com', 915654636, 915654636, 'DASMARINAS CAVITE', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(2, 'user', 'user', 'user', 'qwerty@gmail.com', 9876432122, '0', '$2y$10$uzygTAhZ9aUnD0unjAZyRueDEdQD0F0l/Tq2A.SpYYZ1YmecJTUVC', '2024-11-25 01:53:24'),
(3, 'max', 'max', 'jean', 'maxjean@gmail.com', 987654376, '0', '$2y$10$aGp500QGY5mDplVvVIb9Q.0GGWvgv.JVJXnm36Px.dwmiAB1ceNmy', '2024-11-25 12:29:03'),
(4, 'emmanuel', 'emmanuel Louise', 'arceo', 'emmanuelarceo@gail.com', 987654321, '0', '$2y$10$f5nNjFnLfELiA.JDfmKnkuTQRr60Q4bQf/Ou.pdJuFXfQFa3.Or5K', '2024-11-27 12:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `pizzaId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `pizzaId`, `itemQuantity`, `userId`, `addedDate`) VALUES
(37, 77, 1, 5, '2024-12-13 13:14:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addonns`
--
ALTER TABLE `addonns`
  ADD PRIMARY KEY (`addid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`,`categorieDesc`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`),
  ADD KEY `userId_2` (`userId`),
  ADD KEY `userId_3` (`userId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaId`);
ALTER TABLE `pizza` ADD FULLTEXT KEY `pizzaName` (`pizzaName`,`pizzaDesc`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addonns`
--
ALTER TABLE `addonns`
  MODIFY `addid` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizzaId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orderitems` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
