-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 10:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(2) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `cat_name`) VALUES
(1, 'หน้าต่างบานเลื่อน'),
(2, 'หน้าต่างบานพับ'),
(3, 'หน้าต่างห้องน้ำ'),
(4, 'ประตูบานเลื่อน'),
(5, 'ประตูบานพับ');

-- --------------------------------------------------------

--
-- Table structure for table `cumtomer`
--

CREATE TABLE `cumtomer` (
  `cm_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cumtomer`
--

INSERT INTO `cumtomer` (`cm_id`, `username`, `password`, `name`, `tel`, `address`) VALUES
(20, 'darknight7577', 'e10adc3949ba59abbe56e057f20f883e', 'ทรงพล ชุมทอง', '0658389715', 'ซอย 35'),
(26, 'redmeowx321', '7cf5316f901f6f7798e23a906a96dd8a', 'Songpon Chumtrong', '0658389715', 'ซอย 35');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `em_id` int(11) NOT NULL,
  `em_username` varchar(20) NOT NULL,
  `em_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`em_id`, `em_username`, `em_password`) VALUES
(1, 'paranee', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(6) NOT NULL,
  `product_detail` varchar(80) NOT NULL,
  `product_width` varchar(100) NOT NULL,
  `product_length` varchar(100) NOT NULL,
  `colorglass` int(1) NOT NULL,
  `colorframe` int(1) NOT NULL,
  `product_img` varchar(600) NOT NULL,
  `category_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_detail`, `product_width`, `product_length`, `colorglass`, `colorframe`, `product_img`, `category_id`) VALUES
(8, 'หน้าต่างห้องน้ำ', 2390, '', '60', '50', 1, 3, 'upload/image-removebg-preview.png', 3),
(9, 'หน้าต่างบานเลื่อน', 4000, '', '120', '70', 3, 2, 'upload/10279749_s_1200_1-removebg-preview.png', 1),
(10, 'ประตูบานพับอลูมิเนียม', 2000, '', '50', '120', 1, 1, 'upload/Screenshot 2022-12-20 002457.png', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `cumtomer`
--
ALTER TABLE `cumtomer`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cumtomer`
--
ALTER TABLE `cumtomer`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
