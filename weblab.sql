-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 12:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblab`
--

-- --------------------------------------------------------

--
-- Table structure for table `pts`
--

CREATE TABLE `pts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `des` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pts`
--

INSERT INTO `pts` (`id`, `name`, `image`, `des`) VALUES
(1, 'Acer Predator Helios 300', 'lap1.jpg', 'Display size: 15.60-inch\r\nDisplay resolution: 1920x1080 pixels\r\nRAM: 16GB\r\nHard disk: 1TB\r\nSSD: 256GB\r\nGraphics: Nvidia GeForce RTX 3060\r\nWeight: 2.30 kg'),
(2, 'Asus ROG Zypherus ', 'lap2.jpg', 'Display size: 15.60-inch\r\nDisplay resolution: 1920x1080 pixels\r\nRAM: 16GB\r\nHard disk: 1TB\r\nSSD: 256GB\r\nGraphics: Nvidia GeForce GtX 3070\r\nWeight: 2.10 kg'),
(3, 'Alienware X17 ', 'lap3.jpg', 'Display size: 17.30-inch\r\nDisplay resolution: 1920x1080 pixels\r\nProcessor: Core i7\r\nRAM: 32GB\r\nHard disk: TB\r\nSSD: 512GB\r\nGraphics: Nvidia GeForce GtX 300\r\nWeight: 2.10 kg\r\n'),
(5, 'Samsung Galaxy S20 Ultra  \r\n', 'io.jpg', ''),
(4, 'Iphone 13 pro max', 'i.jpg', ''),
(6, 'Google Pixel 6\r\n', '33.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Acer Predator Helios 300', 'lap1.jpg', 1500.00),
(2, 'Asus ROG Zypherus ', 'lap2.jpg', 2000.00),
(3, 'Alienware X17 ', 'lap3.jpg', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product2`
--

CREATE TABLE `tbl_product2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product2`
--

INSERT INTO `tbl_product2` (`id`, `name`, `image`, `price`) VALUES
(1, 'Iphone 13 pro max', 'i.jpg', 1599.00),
(2, 'Samsung Galaxy S20 Ultra  ', 'io.jpg', 600.00),
(3, 'Google Pixel 6 ', '33.jpg', 599.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(48) DEFAULT NULL,
  `last_name` varchar(48) DEFAULT NULL,
  `email` varchar(48) DEFAULT NULL,
  `username` varchar(48) DEFAULT NULL,
  `password` varchar(48) DEFAULT NULL,
  `status` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `status`) VALUES
(1, 'Arefin', 'Shimon', 'arefinshimon@gmail.com', 'arefin12000', '12345', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pts`
--
ALTER TABLE `pts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product2`
--
ALTER TABLE `tbl_product2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product2`
--
ALTER TABLE `tbl_product2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
