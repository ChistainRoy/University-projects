-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 01:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
(20, 'darknight7577', 'e10adc3949ba59abbe56e057f20f883e', 'ทรงพล ชุมทอง', '0658389715', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง'),
(30, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'ทรงพล ชุมทอง', '0954431596', '75/12');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `color`) VALUES
(1, '2023-08-25', '2023-08-25', '#696cff'),
(2, '2023-08-26', '2023-08-26', '#696cff'),
(3, '2023-08-30', '2023-08-30', '#696cff'),
(9, '2023-08-15', '2023-08-15', '#696cff'),
(10, '2023-09-01', '2023-09-01', '#696cff'),
(11, '2023-08-09', '2023-08-09', '#696cff'),
(12, '2023-08-31', '2023-08-31', '#696cff');

-- --------------------------------------------------------

--
-- Table structure for table `oderdetail`
--

CREATE TABLE `oderdetail` (
  `oder_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `oder_price` int(10) NOT NULL,
  `oder_qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oderdetail`
--

INSERT INTO `oderdetail` (`oder_id`, `product_id`, `oder_price`, `oder_qty`) VALUES
('1', '9', 1500, 1),
('2', '11', 300, 3),
('2', '8', 3000, 2),
('3', '8', 3000, 2),
('3', '9', 1500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(6) NOT NULL,
  `order_date` date NOT NULL,
  `order_reserve` date NOT NULL,
  `oder_total` int(5) NOT NULL,
  `cm_id` int(3) NOT NULL,
  `oder_status` varchar(20) NOT NULL,
  `em_id` varchar(4) NOT NULL,
  `order_address` varchar(100) NOT NULL,
  `payment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_reserve`, `oder_total`, `cm_id`, `oder_status`, `em_id`, `order_address`, `payment`) VALUES
(1, '2023-08-10', '2023-08-25', 1500, 20, 'อนุมัติ', '20', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', ''),
(2, '2023-08-10', '2023-08-26', 6900, 20, 'อนุมัติ', '20', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', 'upload/payment/pbx1ip7pkYZNFHqbg1B-o.jpg'),
(3, '2023-08-10', '2023-08-30', 13500, 20, 'รอชำระเงิน', '', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` int(3) NOT NULL,
  `pay_img` varchar(300) NOT NULL,
  `cm_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `order_id` int(11) NOT NULL,
  `performance_id` int(6) NOT NULL,
  `date_ operate` date NOT NULL,
  `detail_ correction` text NOT NULL,
  `img_correction` varchar(300) NOT NULL,
  `status_performance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`order_id`, `performance_id`, `date_ operate`, `detail_ correction`, `img_correction`, `status_performance`) VALUES
(2, 5, '2023-08-26', '', '', 'รอตรวจสอบสถานที่ติดตั้ง'),
(1, 6, '2023-08-25', '', '', 'รอตรวจสอบสถานที่ติดตั้ง'),
(2, 13, '2023-08-15', 'asdasd', 'upload/operate/365321290_810708183881816_2069100453224329101_n.jpg', 'รอดำเนินการติดตั้งสินค้า'),
(2, 14, '2023-09-01', 'asdasdasd', 'upload/operate/365321290_810708183881816_2069100453224329101_n.jpg', 'ดำเนินการแก้ไข'),
(2, 15, '2023-08-09', 'asdasdsd', 'upload/operate/358332070_312039524513421_3092975767706194653_n.jpg', 'รอดำเนินการติดตั้งสินค้า'),
(2, 16, '2023-08-31', 'asdasd', 'upload/operate/365321290_810708183881816_2069100453224329101_n.jpg', 'รอดำเนินการติดตั้งสินค้า');

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
(8, 'หน้าต่างบานเลื่อน', 3000, '', '130', '120', 1, 3, 'upload/IMG_4578-removebg-preview.png', 1),
(9, 'หน้าต่างห้องน้ำ', 1500, '', '50', '80', 1, 1, 'upload/021-removebg-preview.png', 4),
(11, 'หน้าต่างบานพับ', 300, '', '60', '120', 1, 3, 'upload/IMG_4580-removebg-preview.png', 2);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`oder_id`,`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`,`cm_id`,`em_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`performance_id`);

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
  MODIFY `id_cat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cumtomer`
--
ALTER TABLE `cumtomer`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `performance_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
