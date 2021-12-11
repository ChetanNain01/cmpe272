-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 04:13 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `rating`, `image`, `isDeleted`, `description`) VALUES
(1, 'Shoe', '10', '3', 'images/shoes-img6.png', 0, 'Multicolored Steps High Sole with Upper Mesh & Foam Material Footwear for Sport Activities, Running Shoes, Casual Shoes, Model Shoot Shoes Running Shoes For Men (Multicolor)'),
(2, 'Best Shoes', '60', '4', 'images/shoes-img4.png', 0, 'Multicolored Steps High Sole with Upper Mesh & Foam Material Footwear for Sport Activities, Running Shoes, Casual Shoes, Model Shoot Shoes Running Shoes For Men (Multicolor)'),
(3, 'Best Shoes', '40', '5', 'images/shoes-img5.png', 0, 'Multicolored Steps High Sole with Upper Mesh & Foam Material Footwear for Sport Activities, Running Shoes, Casual Shoes, Model Shoot Shoes Running Shoes For Men (Multicolor)'),
(4, 'Sports Shoes', '70', '5', 'images/shoes-img7.png', 0, 'Multicolored Steps High Sole with Upper Mesh & Foam Material Footwear for Sport Activities, Running Shoes, Casual Shoes, Model Shoot Shoes Running Shoes For Men (Multicolor)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `password`) VALUES
(1, 'Admin', '6692103743', 'pulloadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
