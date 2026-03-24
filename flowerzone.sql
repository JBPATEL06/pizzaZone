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
-- Database tables for Dynamic Content Phase 1

-- Table for global site settings
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL UNIQUE,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for homepage slider/banners
CREATE TABLE IF NOT EXISTS `slider_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed initial data
INSERT IGNORE INTO `site_settings` (`setting_key`, `setting_value`) VALUES 
('logo', 'logo.png'),
('site_name', 'FlowerZone'),
('footer_text', '© Copyright @ 2026 FlowerZone By Rutvik Parmar & Nayan Jadav | All Rights Reserved!');

INSERT IGNORE INTO `slider_content` (`title`, `subtitle`, `image`) VALUES 
('Fresh Floral <br> Arrangements', 'Handpicked just for you', 'home-img-1.png'),
('Premium <br> Bouquets', 'Elegant designs for every occasion', 'home-img-2.png'),
('Same Day <br> Delivery', 'Surprise your loved ones in no time', 'home-img-3.png');
-- Further Dynamic Content Expansion

CREATE TABLE IF NOT EXISTS `site_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL, -- 'popular', 'about', etc.
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT 'menu.php',
  `order_priority` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Popular Section
INSERT IGNORE INTO `site_content` (`section`, `title`, `description`, `image`, `order_priority`) VALUES 
('popular', 'EXOTIC COLLECTION', 'A delight for floral enthusiasts! Choose from our wide range of rare and exotic blooms, curated to perfection.', 'maxvage.jpg', 1),
('popular', 'WEDDING GRACE', 'A selection that elegantly carries the weight of pure love, with white lilies and soft roses.', 'paneer.jpg', 2),
('popular', 'ORCHID ELEGANCE', 'It is sophisticated. It is timeless. It is FlowerZone signature. Exotic orchids with a touch of luxury.', 'makhni.jpg', 3);

-- Seed About Section
INSERT IGNORE INTO `site_content` (`section`, `title`, `description`, `image`, `order_priority`) VALUES 
('about', 'grown with care', 'No matter the occasion, flowers always convey the right message. Especially a bouquet that gives you freedom to customize.', 'about-1.svg', 1),
('about', 'express floral delivery', 'Stop searching blindly for flowers. Order from FlowerZone for a fresh, beautiful bouquet at your doorstep in no time.', 'about-2.svg', 2),
('about', 'cherish special moments', 'Celebrate your milestones with our premium floral arrangements. Check out our seasonal combos starting from ₹499.', 'about-3.svg', 3);
-- SEEDING FOR PHASE 2 DYNAMIC CONTENT

-- 1. Services Section
INSERT INTO `site_content` (`section`, `title`, `description`, `image`, `order_priority`) VALUES
('services', 'Free Delivery', 'The perfect ending to your floral gift is a hassle-free arrival. FlowerZone ensures your bouquets reach their destination in pristine condition within our delivery window.', 'freedelivery.png', 1),
('services', 'Online Payment', 'Securely checkout using various payment methods. We support all major UPI apps, cards, and net-banking for a seamless floral shopping experience.', 'onlinepay.png', 2),
('services', 'Freshly Picked', 'We guarantee the freshest blooms. Each bouquet is composed of flowers hand-picked at their peak to ensure lasting beauty and fragrance.', 'freshfood.png', 3);

-- 2. Testimonials Section
INSERT INTO `site_content` (`section`, `title`, `description`, `image`, `order_priority`) VALUES
('review', 'Sarah Johnson', 'The "Wedding Grace" bouquet I ordered for my anniversary was absolutely stunning. The lilies were so fresh and lasted for over a week! Highly recommended.', 't1.png', 1),
('review', 'Michael Chen', 'I needed a last-minute gift and FlowerZone delivered. The "Exotic Collection" is breathe-taking. Excellent service and quality.', 't2.png', 2),
('review', 'Priya Sharma', 'Finest floral boutique in the city. The packaging was so premium and the orchids were exquisite. Will definitely order again.', 't3.png', 3);

-- 3. Gallery Section
INSERT INTO `site_content` (`section`, `title`, `image`, `order_priority`) VALUES
('gallery', 'Spring Morning', 'gallery/g1.jpg', 1),
('gallery', 'Rose Romance', 'gallery/g2.jpg', 2),
('gallery', 'Lily Love', 'gallery/g3.jpg', 3),
('gallery', 'Orchid Glow', 'gallery/g4.jpg', 4),
('gallery', 'Petal Power', 'gallery/p1.jpg', 5),
('gallery', 'Vibrant Vases', 'gallery/p2.jpg', 6),
('gallery', 'Garden Fresh', 'gallery/p3.jpg', 7),
('gallery', 'Lush Leaves', 'gallery/p4.jpg', 8),
('gallery', 'Classic Colors', 'gallery/c1.jpg', 9),
('gallery', 'Modern Mix', 'gallery/c2.jpg', 10),
('gallery', 'Simple Smiles', 'gallery/c3.jpg', 11),
('gallery', 'Bloom Blast', 'gallery/c4.jpg', 12);

-- 4. FAQ Section
INSERT INTO `site_content` (`section`, `title`, `description`, `order_priority`) VALUES
('faq', 'What is Contactless Delivery?', 'Contactless Delivery means there is no direct contact between the customer and the delivery rider. The rider will leave the bouquet at your doorstep and notify you via call or message.', 1),
('faq', 'Can I do Cash-on-delivery for contactless delivery?', 'No, to ensure a completely contactless experience, we recommend using online payment methods for doorstep drops.', 2),
('faq', 'How do I know where my bouquets will be kept?', 'You can specify instructions while placing the order. By default, the rider will place it in a safe spot at your entrance.', 3),
('faq', 'How will I know FlowerZone has received my order?', 'Once you submit your order, you will receive an instant confirmation and you can track the status in the "Your Orders" section.', 4);

-- 5. Additional Settings
INSERT IGNORE INTO `site_settings` (`setting_key`, `setting_value`) VALUES 
('mid_banner', 'Home.png'),
('about_story_img', 'services.png'),
('about_story_text', 'FlowerZone is a bespoke floral boutique dedicated to bringing nature\'s finest creations to your doorstep. Our philosophy is rooted in elegance, quality, and the timeless language of flowers.');
