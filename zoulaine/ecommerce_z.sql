-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 02:29 AM
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
-- Database: `ecommerce_z`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2024-12-05 06:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`) VALUES
(5, 4, 4456.00, 'completed', '2024-12-05 22:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `stock`, `created_at`, `image`) VALUES
(7, 'iPhone 13 Mini', 'Apple smartphone with A15 Bionic chip', 799.99, 'Smartphones', 50, '2024-12-04 22:32:41', 'https://m.media-amazon.com/images/I/61H3jeeHnUL._AC_SX679_.jpg'),
(8, 'Samsung Galaxy S21', 'Samsung smartphone with Exynos 2100', 699.99, 'Smartphones', 30, '2024-12-04 22:32:41', 'https://m.media-amazon.com/images/I/51P6nQSx+YL._AC_SX679_.jpg'),
(9, 'Nokia 3310', 'Classic feature phone with durable design', 49.99, 'Smartphones', 100, '2024-12-04 22:33:36', 'https://m.media-amazon.com/images/I/71ArvO6yf+L._AC_SX679_.jpg'),
(10, 'Alcatel 1054D', 'Compact feature phone with dual SIM capability', 19.99, 'Smartphones', 80, '2024-12-04 22:33:36', 'https://m.media-amazon.com/images/I/61hzJVav-tL._AC_SX679_.jpg'),
(11, 'iPhone 13 Case', 'Durable silicone case for iPhone 13', 19.99, 'Accessoires', 150, '2024-12-04 22:34:38', 'https://m.media-amazon.com/images/I/71Go+X-xMOL._AC_SX679_.jpg'),
(12, 'Samsung Galaxy Charger', 'Fast charger for Galaxy series phones', 29.99, 'Accessoires', 200, '2024-12-04 22:34:38', 'https://m.media-amazon.com/images/I/61Fh-KvHu7L._AC_SX679_.jpg'),
(13, 'Nokia 150', 'Affordable feature phone with camera and flashlight', 39.99, 'Offres spéciales', 70, '2024-12-04 22:35:00', 'https://m.media-amazon.com/images/I/61dqNLauyUL._AC_UL320_.jpg'),
(14, 'Itel it5602', 'Dual SIM feature phone with FM radio and flashlight', 24.99, 'Offres spéciales', 120, '2024-12-04 22:35:00', 'https://m.media-amazon.com/images/I/71+tMqM4vgL._AC_UL320_.jpg'),
(15, 'Smartphone Bundle Offer', 'Bundle deal with two smartphones', 999.99, 'Offres spéciales', 20, '2024-12-04 22:36:00', 'https://m.media-amazon.com/images/I/610TtSUg+YL._AC_UL320_.jpg'),
(16, 'Accessory Combo', 'Phone case and charger combo at a discounted price', 39.99, 'Accessoires', 50, '2024-12-04 22:36:00', 'https://m.media-amazon.com/images/I/71Fj0wSewBL._AC_UL320_.jpg'),
(19, 'Cell Phone Dry Bag', 'Waterproof Phone Pouch Case for iPhone 15 14 13 12 Pro Max, IP8 Mobilephone Dry Bag, Beach Cruise Ship Water Sport Essentials 1Pack-4.72 * 9.9 Inch, Black', 16.00, 'Accessoires', 23, '2024-12-05 22:46:43', 'https://m.media-amazon.com/images/I/71UI9Z-wWZL.__AC_SX300_SY300_QL70_ML2_.jpg'),
(20, 'Nulaxy Dual ', 'Fully Adjustable Desktop Cell Phone Holder Accessories for Office Compatible with 4-8\" Mobile Devices iPhone Pro/Max/Plus, iPad Pro/Air/Mini, Rose Gold', 15.00, 'Accessoires', 43, '2024-12-05 22:47:56', 'https://m.media-amazon.com/images/I/61WU1nSPTvL._AC_SX679_.jpg'),
(21, 'C24 Ultra ', 'Unlocked Cell Phones Smartphone Android 13 Phones 8+256GB/6.8\" HD Screen/Dual SIM/108MP+48MP Camera/6800 mAh/Built-in Pen(Titanium Grey)', 2655.00, 'Smartphones', 56, '2024-12-05 22:48:55', 'https://m.media-amazon.com/images/I/71XnJsSlZnL.__AC_SX300_SY300_QL70_ML2_.jpg'),
(22, 'SAMSUNG Galaxy S20 FE', '(Canadian Model G781W) 6.5\" Display Unlocked Smartphone - Cloud Navy (Renewed)', 250.00, 'Smartphones', 56, '2024-12-05 22:49:55', 'https://m.media-amazon.com/images/I/61uw-JTPfhL._AC_SY606_.jpg'),
(23, 'Blackview Smartphone ', 'Color 8 16GB RAM+128GB ROM Unlocked Cell Phones with 6000mAh 18W Fast Charge, 6.75\" HD+ 90Hz, 50MP Camera, 4G Dual SIM Android Phone, 3 Card Slots, 3.5mm Jack, Fingerprint, GPS', 45.00, 'Offres spéciales', 568, '2024-12-05 22:50:46', 'https://m.media-amazon.com/images/I/71ppV3ggsiL._AC_UL320_.jpg'),
(24, 'Cell Phones I15 Ultra ', 'Unlocked Cell Phones I15 Ultra Smartphones 5G Phone Android 13 Mobile Phones 8GB+256GB/7 Display/48MP+108MP Camera/6800 mAh/Dual SIM/Build-in Pen (Grey)', 56.00, 'Offres spéciales', 67, '2024-12-05 22:51:25', 'https://m.media-amazon.com/images/I/71oGIYRJK2L._AC_SX425_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(4, 'test', 'test@gmail.com', '$2y$10$GgPp3schodSo5p1Hyr/OdOLQwDabjCmKwam6r1MbEf04YOTNJhksa', '547123', '123e', '2024-12-05 22:26:15'),
(5, 'test tes', 'test1@gmail.com', '$2y$10$OKrQ6DuuDo.yUXS1el6fTuSYqraJvgTFVoxz1vmi7oV5pegnv/yFW', '547123', 'frefwerf', '2024-12-05 22:33:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
