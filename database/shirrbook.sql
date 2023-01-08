-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 11:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shirrbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` varchar(20) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `client_lastname` varchar(20) NOT NULL,
  `client_phone_number` int(14) NOT NULL,
  `client_e_mail` varchar(50) NOT NULL,
  `client_city` varchar(20) NOT NULL,
  `client_zip` int(20) NOT NULL,
  `client_adress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_lastname`, `client_phone_number`, `client_e_mail`, `client_city`, `client_zip`, `client_adress`) VALUES
('at84392', 'hiba', 'toufah', 683748274, 'hiba@gmail.com', 'settat', 26000, 'settat'),
('bh45689', 'amina', 'moujahid', 666603548, 'aminamoujahid@gmail.com', 'settat', 26000, 'al kassam'),
('bh75834', 'marouane', 'belmir', 699863548, 'marouane@gmail.Com', 'casablance', 26458, 'm rachid'),
('bh92405', 'ahmed', 'dahman', 762708645, 'achraftoufah452gmail.com', 'settat', 26000, 'al kassam'),
('bh9240545', 'achraf', 'toufah', 762708242, 'achraftoufah452gmail.com', 'settat', 26000, 'al kassam'),
('hf75633', 'hamid', 'sabiri', 683492748, 'hamid@gmail.com', 'settat', 259765, 'settat'),
('w456379', 'lahcen', 'dahman', 4568, 'achraftoufah452gmail.com', 'settat', 26000, 'al kassam'),
('w45637944', 'lahcen', 'toufah', 758695847, 'toufah@onee.ma', 'settat', 26000, 'al kassam'),
('w789545', 'hamid', 'hamdoun', 688957486, 'hamdoun@gmail.com', 'settat', 26000, 'kamal'),
('zq92832', 'nissan', 'nissan', 789458768, 'toufah@onee.ma', 'settat', 26000, 'settat');

-- --------------------------------------------------------

--
-- Table structure for table `e_mails`
--

CREATE TABLE `e_mails` (
  `e_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_mails`
--

INSERT INTO `e_mails` (`e_mail`) VALUES
('test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `order_product_id` varchar(255) NOT NULL,
  `order_client_id` varchar(255) NOT NULL,
  `order_product_quantity` varchar(255) NOT NULL,
  `order_invoice` float NOT NULL,
  `order_payment_method` tinyint(10) NOT NULL DEFAULT 0,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_product_id`, `order_client_id`, `order_product_quantity`, `order_invoice`, `order_payment_method`, `order_date`, `state`) VALUES
(8, '22/29', 'bh92405', '10/11', 254, 0, '2022-12-21 11:34:58', 1),
(9, '21/29', 'bh9240545', '1/1', 36, 0, '2022-12-21 11:42:33', 1),
(10, '21', 'w456379', '1', 24, 0, '2022-12-21 11:42:57', 1),
(11, '29', 'w456379', '1', 14, 0, '2022-12-21 11:50:36', 1),
(16, '22', 'fds56', '10', 122, 0, '2022-12-24 16:10:03', 1),
(17, '30', 'w456379', '1', 7, 0, '2022-12-24 16:10:41', 1),
(18, '21', 'bh45689', '17', 376, 0, '2022-12-25 14:29:48', 1),
(19, '34', 'w789545', '1', 14, 0, '2022-12-25 15:49:35', 1),
(20, '32', 'bh75834', '1', 24, 0, '2022-12-26 20:21:55', 1),
(21, '24', 'at84392', '10', 122, 0, '2022-12-26 20:24:40', 2),
(22, '22', 'zq92832', '11', 134, 0, '2022-12-26 20:25:46', 1),
(23, '24/21/29/32/22', 'hf75633', '1/1/1/1/1', 82, 0, '2022-12-27 17:45:05', 1),
(24, '21', 'w45637944', '1', 24, 0, '2023-01-04 17:27:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(800) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_quantity`, `product_price`, `product_image`) VALUES
(33, 'brown notebook', 'brown notebook with soft cover', 70, 12, '6399dd4b97342.jpg'),
(34, 'test product 2', 'this is a product for test number 2', 10, 12, '6395dd90d6eac.jpg'),
(35, 'product name', 'this is a large description to this testing product i\'m just writing things that comes to my mind at this moment so i make this field as large as possible and i\'m running out of words and i don\'t know even what\'s the meaning of what i said 1 minute before even if it\'s not one minute okay salamo alaykom', 20, 12, '63a1d77d3cd0a.jpg'),
(38, 'black notebook', 'black notebook with high quality hard cover', 50, 22, '63947657c44aa.jpg'),
(39, 'brown notebook', 'brown notebook with soft cover', 70, 12, '6399dd4b97342.jpg'),
(40, 'test product 2', 'this is a product for test number 2', 10, 12, '6395dd90d6eac.jpg'),
(41, 'product name', 'this is a large description to this testing product i\'m just writing things that comes to my mind at this moment so i make this field as large as possible and i\'m running out of words and i don\'t know even what\'s the meaning of what i said 1 minute before even if it\'s not one minute okay salamo alaykom', 20, 12, '63a1d77d3cd0a.jpg'),
(44, 'black notebook', 'black notebook with high quality hard cover', 50, 22, '63947657c44aa.jpg'),
(45, 'brown notebook', 'brown notebook with soft cover', 70, 12, '6399dd4b97342.jpg'),
(46, 'test product 2', 'this is a product for test number 2', 10, 12, '6395dd90d6eac.jpg'),
(47, 'product name', 'this is a large description to this testing product i\'m just writing things that comes to my mind at this moment so i make this field as large as possible and i\'m running out of words and i don\'t know even what\'s the meaning of what i said 1 minute before even if it\'s not one minute okay salamo alaykom', 20, 12, '63a1d77d3cd0a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(14) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(14) CHARACTER SET utf8 NOT NULL,
  `phone_number` int(10) NOT NULL,
  `e_mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_pwd` varchar(20) CHARACTER SET utf8 NOT NULL,
  `role_as` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `lastname`, `phone_number`, `e_mail`, `user_pwd`, `role_as`) VALUES
(1, 'achraf', 'toufah', 762708242, 'achraftoufah452@gmail.com', 'toufah', 1),
(17, 'user', 'test', 57846925, 'userTest@gmail.Com', 'toufah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `ip_adress` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`ip_adress`, `date`) VALUES
('::1', '2022-12-24 13:21:38'),
('192.168.1.103', '2022-12-24 13:21:45'),
('::1', '2022-12-25 13:30:41'),
('::1', '2022-12-26 20:21:09'),
('::1', '2022-12-27 17:43:46'),
('::1', '2023-01-04 17:26:29'),
('::1', '2023-01-07 18:29:36'),
('::1', '2023-01-08 14:14:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `e_mails`
--
ALTER TABLE `e_mails`
  ADD PRIMARY KEY (`e_mail`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `e_mail` (`e_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
