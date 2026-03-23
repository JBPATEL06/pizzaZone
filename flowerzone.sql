-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 01:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_area`
--

CREATE TABLE `admin_area` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_area`
--

INSERT INTO `admin_area` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `userId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `userId`) VALUES
(70, 'Midnight Rose', '45', 'Farmhouse.jpg', 2, 40),
(71, 'Lilac Dreams', '150', 'Corn_&_Cheese.jpg', 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `userId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `status`, `userId`) VALUES
(7, 'Rutvik', '24', 'nababurbd@gmail.com', 'credit cart', 'rt', 'ffdgf', 'botad', 'gujarat', 'India', 334710, 'Midnight Rose (1), Lilac Dreams (1), Sunflower Bliss (1)', '765', 'in process', 0),
(8, 'Rutvik', '558585885', 'nababurbd@gmail.com', 'cash on delivery', 'rt', 'ffdgf', 'botad', 'gujarat', 'India', 334710, 'Sunflower Bliss (3), Midnight Rose (1), Lilac Dreams (1)', '1015', 'closed', 0),
(14, 'Rutvik Parmar', '9586643802', 'rutvikparmar@gmail.com', 'cash on delivery', 'botad paliyad road', 'Botad', 'botad', 'gujarat', 'India', 334710, 'Midnight Rose (1), Lilac Dreams (1), Sunflower Bliss (1)', '274', NULL, 41),
(15, 'Rutvik Parmar', '09586643802', 'rutvikparmar@gmail.com', 'cash on delivery', 'botad paliyad road', 'Botad', 'botad', 'gujarat', 'India', 334710, 'Lilac Dreams (1), Midnight Rose (1)', '195', 'closed', 42),
(16, 'Rutvik Parmar', '09586643802', 'rutvikparmar@gmail.com', 'cash on delivery', 'botad paliyad road', 'Botad', 'botad', 'gujarat', 'India', 334710, 'Midnight Rose (2), Lilac Dreams (1)', '240', 'closed', 40);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(33, 'Midnight Rose', '45', 'Farmhouse.jpg'),
(36, 'Lilac Dreams', '150', 'Corn_&_Cheese.jpg'),
(37, 'Sunflower Bliss', '79', 'Margherit.jpg'),
(38, 'Tulip Trio', '129', 'Farmhouse.jpg'),
(39, 'Orchid Elegance', '178', 'pizza1.jpg'),
(40, 'Peony Punch', '259', 'pizza2.jpg'),
(41, 'Daisy Delight', '159', 'Farmhouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `remark` mediumtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`) VALUES
(0, 6, 'in process', 'Thank You'),
(0, 6, 'rejected', 'Sorryy'),
(0, 6, 'closed', 'Done'),
(0, 6, 'in process', 'Done'),
(0, 6, 'in process', 'done'),
(0, 6, 'closed', 'Thanks'),
(0, 6, 'closed', 'donee'),
(0, 7, 'closed', 'done'),
(0, 8, 'closed', 'done'),
(0, 8, 'in process', 'DONEEE'),
(0, 7, 'closed', 'TANK-YOU FOR ORDER'),
(0, 12, 'in process', 'Done'),
(0, 12, 'closed', 'Thank-You For Order'),
(0, 12, 'in process', 'On The Way'),
(0, 8, 'closed', 'Success'),
(0, 6, 'in process', 'Hon the way'),
(0, 6, 'rejected', 'no'),
(0, 6, 'in process', 'done'),
(0, 6, 'closed', 'Doneee'),
(0, 15, 'in process', 'On The WAY'),
(0, 15, 'closed', 'THANK-YOU FOR ORDER'),
(0, 16, 'in process', 'dONEN'),
(0, 16, 'closed', 'tHANK YOU'),
(0, 7, 'in process', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailId` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `emailId`, `password`) VALUES
(39, 'rutvik', 'Rutvik', 'nababurbd@gmail.com', 'admin'),
(40, 'rutvik', 'Rutvik', 'rutvikparmar2056@gmail.com', '456'),
(41, 'maitree', 'shah', 'maitrishah1966@gmail.com', '123'),
(42, 'pilo', 'pilo', 'kukadiyapiyush95@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
