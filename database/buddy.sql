-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 05:05 AM
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `order_id` int(6) NOT NULL,
  `comment_id` int(6) NOT NULL,
  `comment_detail` text NOT NULL,
  `comment_img` varchar(300) NOT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`order_id`, `comment_id`, `comment_detail`, `comment_img`, `comment_date`) VALUES
(2, 11, 'ทางร้านใจดีมากครับ', '4', '2023-09-07');

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
  `address` text NOT NULL,
  `date_regis` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cumtomer`
--

INSERT INTO `cumtomer` (`cm_id`, `username`, `password`, `name`, `tel`, `address`, `date_regis`) VALUES
(20, 'darknight7577', 'e10adc3949ba59abbe56e057f20f883e', 'ทรงพล ชุมทอง', '0954431596', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', '2023-07-25'),
(30, 'test', '14e1b600b1fd579f47433b88e8d85291', 'กษิดิ์เดช ซุ่นสั้น', '0954431596', '126/12 ตำบล โคกหล่อ อำเภอเมือง จังหวัด ตรัง ', '2023-07-26'),
(46, 'duan230844', 'a394b68d0a2d9cf953b315989e3e2157', 'ภารณี ศรีนวลปาน', '0658049814', '14 หมู่5 ตำบลกะลาเส อำเภอสิเกา จังหวัดตรัง', '2023-09-07'),
(47, 'Yellow', 'a013924e6cc3e77c295c70ebc1d571bf', 'กษิดิ์เดช ซุ่นสั้น', '0878840694', '34/12 หมู่ 2 ตำบลวัดครองน้ำเจ็ด อำเภอเมืองตรัง จังหวัดตรัง', '2023-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `em_id` int(11) NOT NULL,
  `em_username` varchar(20) NOT NULL,
  `em_password` varchar(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address_em` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`em_id`, `em_username`, `em_password`, `name`, `phone`, `address_em`) VALUES
(1, 'paranee', '123456', 'ไฟซอล หมาดสุวรรณ', '0954431596', ''),
(2, 'sos', '147852', 'บุริศน์ ทองอยู่คง', '0658389715', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `order_id`, `start`, `end`, `color`) VALUES
(41, 2, '2023-09-08', '2023-09-08', '#696cff'),
(42, 3, '2023-09-07', '2023-09-07', '#696cff'),
(43, 0, '2023-09-11', '2023-09-11', '#696cff'),
(44, 0, '2023-09-13', '2023-09-13', '#696cff'),
(45, 0, '2023-09-14', '2023-09-14', '#696cff'),
(46, 4, '2023-09-15', '2023-09-15', '#696cff'),
(47, 0, '2023-09-17', '2023-09-17', '#696cff'),
(48, 5, '2023-09-20', '2023-09-20', '#696cff');

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
('2', '11', 300, 3),
('2', '9', 1500, 1),
('3', '9', 1500, 1),
('4', '9', 1500, 1),
('5', '9', 1500, 1);

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
(2, '2023-09-06', '2023-09-08', 2400, 20, 'ชำระเงินแล้ว', '1', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', 'upload/payment/64f90063c4b91_64f8d9cfcfed2_IMG_5791.png'),
(3, '2023-09-06', '2023-09-07', 1500, 20, 'ชำระเงินแล้ว', '1', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', 'upload/payment/64f9071d03ccd_Slip.jpg'),
(4, '2023-09-07', '2023-09-15', 1500, 20, 'ชำระเงินแล้ว', '1', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', 'upload/payment/64f90e9e0d0c7_64f90063c499d_64f8d9cfcfed2_IMG_5791.png'),
(5, '2023-09-07', '2023-09-20', 1500, 20, 'รอชำระเงิน', '', '44/19 ต.บ้านควน อ.เมือง จ.ตรัง', '');

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
(3, 65, '2023-09-14', '', '', 'ดำเนินการเสร็จสิ้น'),
(4, 66, '2023-09-15', '', '', 'รอตรวจสอบสถานที่ติดตั้ง'),
(4, 67, '2023-09-17', 'แก้วงกบ 2 เซน', '', 'ดำเนินการแก้ไข');

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
(9, 'หน้าต่างห้องน้ำ', 1500, '', '50', '80', 1, 1, 'upload/021-removebg-preview.png', 3),
(11, 'หน้าต่างบานพับ', 300, '', '60', '120', 1, 3, 'upload/IMG_4580-removebg-preview.png', 2),
(14, 'หน้าต่างห้องน้ำ', 2500, '', '60', '40', 1, 3, 'upload/image-removebg-preview.png', 3),
(15, 'หน้าต่างห้องน้ำ', 2600, '', '60', '40', 1, 2, 'upload/20191127_083431_product_2106512_800_600-removebg-preview.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `Shop_id` int(1) NOT NULL,
  `em_id` int(11) NOT NULL,
  `img_1` varchar(300) NOT NULL,
  `img_2` varchar(300) NOT NULL,
  `img_3` varchar(300) NOT NULL,
  `boss_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `google` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`Shop_id`, `em_id`, `img_1`, `img_2`, `img_3`, `boss_name`, `address`, `phone`, `email`, `facebook`, `google`) VALUES
(1, 1, 'upload/ex.jpg', 'upload/ex.jpg', 'upload/ex.jpg', 'ทรงพล ชุมทอง', '17/5 ', '0658389715', 'sapa27577@gmail.com', 'https://www.facebook.com/profile.php?id=61550913933982', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.148166388064!2d99.60200807576531!3d7.558819010265493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d8c4f660881c9%3A0x688833c77e5d1f7c!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LiV4Lij4Lix4LiHIOC4leC4s-C4muC4pSDguJfguLHguJrguYDguJfguLXguYjguKLguIcg4Lit4Liz4LmA4Lig4Lit4LmA4Lih4Li34Lit4LiH4LiV4Lij4Lix4LiHIOC4leC4o-C4seC4hyA5MjAwMA!5e0!3m2!1sth!2sth!4v1693981665124!5m2!1sth!2sth\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`order_id`);

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
  ADD PRIMARY KEY (`id`,`order_id`);

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
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`Shop_id`,`em_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cumtomer`
--
ALTER TABLE `cumtomer`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `performance_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `Shop_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
