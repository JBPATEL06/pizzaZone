-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2026 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `status`, `userId`) VALUES
(7, 'Rutvik', '24', 'nababurbd@gmail.com', 'credit cart', 'rt', 'ffdgf', 'botad', 'gujarat', 'India', 334710, 'Midnight Rose (1), Lilac Dreams (1), Sunflower Bliss (1)', '765', 'closed', 0),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(33, 'Midnight Rose', '45', '33.jpg'),
(36, 'Lilac Dreams', '150', '36.jpg'),
(38, 'Tulip Trio', '129', '38.jpg'),
(39, 'Orchid Elegance', '178', '39.jpg'),
(41, 'Daisy Delight', '159', '41.jpg'),
(44, 'Daisy ', '159', '44.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remark` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(0, 7, 'in process', ''),
(0, 7, 'closed', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_content`
--

CREATE TABLE `site_content` (
  `id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT 'menu.php',
  `order_priority` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_content`
--

INSERT INTO `site_content` (`id`, `section`, `title`, `description`, `image`, `link`, `order_priority`) VALUES
(2, 'popular', 'WEDDING GRACE', 'A selection that elegantly carries the weight of pure love, with white lilies and soft roses.', '2.jpg', 'menu.php', 2),
(3, 'popular', 'ORCHID ELEGANCE', 'It is sophisticated. It is timeless. It is FlowerZone signature. Exotic orchids with a touch of luxury.', '3.jpg', 'menu.php', 3),
(4, 'about', 'grown with care', 'No matter the occasion, flowers always convey the right message. Especially a bouquet that gives you freedom to customize.', '4.jpg', 'menu.php', 1),
(5, 'about', 'express floral delivery', 'Stop searching blindly for flowers. Order from FlowerZone for a fresh, beautiful bouquet at your doorstep in no time.', '5.jpg', 'menu.php', 2),
(6, 'about', 'cherish special moments', 'Celebrate your milestones with our premium floral arrangements. Check out our seasonal combos starting from ₹499.', '6.jpg', 'menu.php', 3),
(7, 'services', 'Free Delivery', 'The perfect ending to your floral gift is a hassle-free arrival. FlowerZone ensures your bouquets reach their destination in pristine condition within our delivery window.', '7.jpg', 'menu.php', 1),
(8, 'services', 'Online refund ', 'Securely checkout using various payment methods. We support all major UPI apps, cards, and net-banking for a seamless floral shopping experience.', '8.png', 'menu.php', 2),
(9, 'services', 'Freshly Picked', 'We guarantee the freshest blooms. Each bouquet is composed of flowers hand-picked at their peak to ensure lasting beauty and fragrance.', '9.jpg', 'menu.php', 3),
(10, 'review', 'Sarah Johnson', 'The \"Wedding Grace\" bouquet I ordered for my anniversary was absolutely stunning. The lilies were so fresh and lasted for over a week! Highly recommended.', '10.png', 'menu.php', 1),
(11, 'review', 'Michael Chen', 'I needed a last-minute gift and FlowerZone delivered. The \"Exotic Collection\" is breathe-taking. Excellent service and quality.', '11.png', 'menu.php', 2),
(12, 'review', 'Priya Sharma', 'Finest floral boutique in the city. The packaging was so premium and the orchids were exquisite. Will definitely order again.', '12.png', 'menu.php', 3),
(13, 'gallery', 'Our Bouquets', '', '13.jpg', 'menu.php', 1),
(14, 'gallery', 'Our Bouquets', '', '14.jpg', 'menu.php', 2),
(15, 'gallery', 'Our Bouquets', '', '15.jpg', 'menu.php', 3),
(16, 'gallery', 'Our Bouquets', '', '16.jpg', 'menu.php', 4),
(25, 'faq', 'What is Contactless Delivery?', 'Contactless Delivery means there is no direct contact between the customer and the delivery rider. The rider will leave the bouquet at your doorstep and notify you via call or message.', '25.png', 'menu.php', 1),
(26, 'faq', 'Can I do Cash-on-delivery for contactless delivery?', 'No, to ensure a completely contactless experience, we recommend using online payment methods for doorstep drops.', '', 'menu.php', 2),
(27, 'faq', 'How do I know where my bouquets will be kept?', 'You can specify instructions while placing the order. By default, the rider will place it in a safe spot at your entrance.', '', 'menu.php', 3),
(28, 'faq', 'How will I know the restaurant has received my order?', 'Once you submit your order, you will receive an instant confirmation and you can track the status in the \"Your Orders\" section.', '', 'menu.php', 4),
(29, 'about', 'The Velvet Blush Collection', 'Sophistication meets nature. Our premium velvet roses and delicate baby’s breath are hand-tied to perfection. Elevate your space or surprise a loved one with this touch of luxury.', '29.jpg', 'menu.php', 0),
(31, 'banner', 'Fresh Floral Arrangements', '', '31.jpg', 'menu.php', 0),
(32, 'gallery', 'Our Boutique', '', '32.jpg', 'menu.php', 0),
(33, 'gallery', 'Our Florists', '', '33.jpg', 'menu.php', 0),
(34, 'gallery', 'Our Florists', '', '34.jpg', 'menu.php', 0),
(35, 'gallery', 'Our Florists', '', '35.jpg', 'menu.php', 0),
(36, 'gallery', 'Our Florists', '', '36.jpg', 'menu.php', 0),
(37, 'gallery', 'Our Florists', '', '37.jpg', 'menu.php', 0),
(38, 'gallery', 'Our Bouquets', '', '38.jpg', 'menu.php', 0),
(39, 'gallery', 'Our Boutique', '', '39.jpg', 'menu.php', 0),
(40, 'gallery', 'Our Boutique', '', '40.jpg', 'menu.php', 0),
(41, 'gallery', 'Our Boutique', '', '41.jpg', 'menu.php', 0),
(42, 'gallery', 'Our Boutique', '', '42.jpg', 'menu.php', 0),
(44, 'popular', 'daisy', 'Sophistication meets nature. Our premium velvet roses and delicate baby’s breath are hand-tied to perfection. Elevate your space or surprise a loved one with this touch of luxury.', '44.jpg', 'menu.php', 0),
(45, 'popular', 'Lilac Dreams', 'Sophistication meets nature. Our premium velvet roses and delicate baby’s breath are hand-tied to perfection. Elevate your space or surprise a loved one with this touch of luxury.', '45.jpg', 'menu.php', 0),
(46, '', 'this demo', '🌻 Flower Zone: Hamari Kahani\r\nShuruaat Kaise Hui?\r\nEk choti si lakdi ki cabin se shuru hui ye dukaan, jahan sheher ke shore-sharabe ke beech thodi si shanti milti thi. Humne dekha ki log apni bhag-daur bhari zindagi mein itne busy hain ki unke paas prakriti (nature) ke liye waqt hi nahi hai. Isliye humne Flower Zone banaya—taaki har ghar mein thodi hariyali aur khushi pahunch sake.\r\n\r\nHamara Maqsad (Purpose):\r\n\r\nKhushi Baantna: Phool sirf ek tohfa nahi, ek ehsaas hain. Hum chahte hain ki har koi bina kisi pareshani ke apne apno ko pyaare phool bhej sake.\r\n\r\nZindagi ko Fresh Rakhna: Hum un logo ki madad karte hain jo sheher mein rehte hain par thoda sukoon chahte hain. Hamara maqsad hai ki har desk aur har balcony par ek chota sa \"Flower Zone\" ho.\r\n\r\nSimple Life: Humne ye app isliye banayi taaki ek button dabate hi aapke pasandida phool aapke darwaaze par hon.', '46.jpg', 'menu.php', 0),
(47, 'about_story', '🌻 Flower Zone: Hamari Kahani', 'Shuruaat Kaise Hui?\r\nEk choti si lakdi ki cabin se shuru hui ye dukaan, jahan sheher ke shore-sharabe ke beech thodi si shanti milti thi. Humne dekha ki log apni bhag-daur bhari zindagi mein itne busy hain ki unke paas prakriti (nature) ke liye waqt hi nahi hai. Isliye humne Flower Zone banaya—taaki har ghar mein thodi hariyali aur khushi pahunch sake.', '47.jpg', 'menu.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'logo', 'logo.jpg'),
(2, 'site_name', 'FlowerZone'),
(3, 'footer_text', '© Copyright @ 2026 FlowerZone By Srushti Lakkad | All Rights Reserved!'),
(4, 'mid_banner', 'mid_banner.png'),
(5, 'about_story_img', 'about_story_img.png'),
(6, 'about_story_text', 'FlowerZone is a bespoke floral boutique dedicated to bringing nature\'s finest creations to your doorstep. Our philosophy is rooted in elegance, quality, and the timeless language of flowers.');

-- --------------------------------------------------------

--
-- Table structure for table `slider_content`
--

CREATE TABLE `slider_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_content`
--

INSERT INTO `slider_content` (`id`, `title`, `subtitle`, `image`, `is_active`) VALUES
(11, '', '', '11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailId` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `flat` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT 'India',
  `pin_code` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `emailId`, `password`, `number`, `flat`, `street`, `city`, `state`, `country`, `pin_code`) VALUES
(39, 'rutvik', 'Rutvik', 'nababurbd@gmail.com', 'admin', NULL, NULL, NULL, NULL, NULL, 'India', NULL),
(40, 'rutvik', 'Rutvik', 'rutvikparmar2056@gmail.com', '456', NULL, NULL, NULL, NULL, NULL, 'India', NULL),
(41, 'maitree', 'shah', 'maitrishah1966@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 'India', NULL),
(42, 'pilo', 'pilo', 'kukadiyapiyush95@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 'India', NULL),
(43, 'Jeel ', 'Patel', 'bhanderijeel8@gmail.com', 'admin', '9510333333', 'erere', 'ererr', 'ererer', 'rerer', 'India', 321232);

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
-- Indexes for table `site_content`
--
ALTER TABLE `site_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `slider_content`
--
ALTER TABLE `slider_content`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `site_content`
--
ALTER TABLE `site_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_content`
--
ALTER TABLE `slider_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
