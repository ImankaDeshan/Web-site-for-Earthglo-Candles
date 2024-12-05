-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 02:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earthglo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmin`
--

CREATE TABLE `addmin` (
  `addmin_id` int(12) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phoneno` int(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addmin`
--

INSERT INTO `addmin` (`addmin_id`, `user_name`, `password`, `phoneno`, `email`) VALUES
(1, 'imankadeshan', 'Deshanmax@123', 776676570, 'imankadeshan2000@gmail.com'),
(2, 'Dulmi', '00001111', 767001137, 'dulmioshadi0@gmail.com'),
(3, 'Lakshmee', '123123123', 762331787, 'lakshmee@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(12) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `prod_id` int(15) NOT NULL,
  `price` int(12) NOT NULL,
  `qty` int(10) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name`) VALUES
(6, 'imankadeshan', 12, 1250, 1, 'Soy candles 2.jpg', 'Soy candle'),
(13, 'DulmiOshadi', 16, 1320, 1, 'Soy candles 2.jpg', 'Scended Candle 1a'),
(16, 'DulmiOshadi', 13, 350, 1, 'Tealight Candles.jpg', 'Tea Light Candles');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `userid` int(12) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `messageid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`userid`, `full_name`, `email`, `message`, `messageid`) VALUES
(0, 'dulmi', 'dulmioshadi@gmail.com', 'candle', 1),
(0, 'dulmi', 'dulmioshadi@gmail.com', 'candle', 2),
(0, 'dulmi', 'dulmioshadi0@gmail.com', 'red candles', 3),
(9, 'imanga', 'imanganethmini18@gmail.com', 'purple candles', 4);

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE `placeorder` (
  `userid` int(12) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `P_no` int(15) NOT NULL,
  `Home_no` varchar(12) NOT NULL,
  `Street_1` varchar(20) NOT NULL,
  `Street_2` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Distric` varchar(20) NOT NULL,
  `Postal_code` int(10) NOT NULL,
  `Item_code` varchar(20) NOT NULL,
  `Item_name` varchar(20) NOT NULL,
  `QTy` int(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(12) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_description` varchar(200) NOT NULL,
  `prod_price` int(12) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_status` varchar(30) NOT NULL,
  `prod_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `prod_image`, `prod_status`, `prod_category`) VALUES
(10, 'pillar candle', 'Standard size pillar candles for day today home usage ', 1200, 'Pillar candles.jpg', 'active', NULL),
(12, 'Soy candle', 'Soy candles for home decorations.', 1250, 'Soy candles 2.jpg', 'active', 'soy'),
(13, 'Tea Light Candles', 'Tea light candles for night party and honey moon decorations.', 350, 'Tealight Candles.jpg', 'active', 'tealight'),
(15, 'Scended Candle 4', 'adqwfawsevaweaweqabnweaweaweaqwe hyudhby', 1300, 'Scented Candles.webp', 'active', 'scented'),
(17, 'Scented Candle 3', 'deco and frequences', 1500, 'images (1).jpeg', 'active', 'scented'),
(18, 'Pillar Candle', 'Decorations', 1100, 'images.jpeg', 'active', 'pilar'),
(19, 'Pillar Candle', 'deco', 1400, 'leaf+candle+main+image+cropped.jpeg', 'active', 'pilar');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(12) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `username`, `email`, `password`, `profile_pic`) VALUES
(7, 'imankadeshan', 'imankadeshan2000@gmail.com', 'Deshanmax@12', NULL),
(9, 'DulmiOshadi', 'dulmioshadi@gmail.com', '12345678', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmin`
--
ALTER TABLE `addmin`
  ADD PRIMARY KEY (`addmin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmin`
--
ALTER TABLE `addmin`
  MODIFY `addmin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `messageid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
