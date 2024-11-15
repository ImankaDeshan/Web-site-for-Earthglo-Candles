-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 11:23 AM
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
-- Database: `earthglo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_name` varchar(50) NOT NULL,
  `prod_id` int(12) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_name`, `prod_id`, `price`, `qty`) VALUES
('imankadeshan', 10, 1200, 1),
('imankadeshan', 10, 1200, 1),
('imankadeshan', 10, 1200, 1),
('imankadeshan', 10, 1200, 1),
('imankadeshan', 11, 790, 1),
('imankadeshan', 11, 790, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `prod_image`, `prod_status`, `prod_category`) VALUES
(10, 'pillar candle', 'Standard size pillar candles for day today home usage ', 1200, 'Pillar candles.jpg', 'active', NULL),
(11, 'Rose Scented Candle', 'Rose fragrant scented candles for home decorations and hotel decorations.', 790, 'Scented Candles.webp', 'active', NULL),
(12, 'Soy candle', 'Soy candles for home decorations.', 1250, 'Soy candles 2.jpg', 'active', 'soy'),
(13, 'Tea Light Candles', 'Tea light candles for night party and honey moon decorations.', 350, 'Tealight Candles.jpg', 'active', 'tealight');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `username`, `email`, `password`) VALUES
(1, 'imankadeshan', 'imankadeshan2000@gma', 'Deshanmax@12');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
