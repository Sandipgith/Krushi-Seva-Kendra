-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 05, 2024 at 10:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krushi_kendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_name`, `admin_password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(5, 7, 'SPIC Neem Coated Urea', '1200', 'urea.jpg', 5),
(9, 6, 'Arysta-Banest 20', '120', 'Arysta-Banest 20.jpeg', 7),
(10, 6, 'mahadhan.16-16-16', '2020', 'maha.16-16-16.png', 1),
(13, 6, 'SPIC Neem Coated Urea', '1200', 'urea.jpg', 9),
(14, 8, 'mahadhan.16-16-16', '1450', 'maha.0.52.34.jpg', 1),
(15, 8, 'Arysta-Banest 20', '120', 'Arysta-Banest 20.jpeg', 4),
(16, 8, 'amistra-top', '450', 'amistra-top.jpg', 3),
(17, 7, 'mahadhan.19.19.19', '1500', 'maha.19.19.19.jpg', 10),
(20, 10, 'mahadhan.16-16-16', '2020', 'maha.16-16-16.png', 5),
(21, 10, 'mahadhan.19.19.19', '1500', 'maha.19.19.19.jpg', 10),
(22, 10, 'Adama-2-4-D', '550', 'Adama-2-4-D.jpg', 3),
(25, 6, 'mahadhan.19.19.19', '1500', 'maha.19.19.19.jpg', 10),
(26, 6, 'mahadhan.24.24.24', '1500', 'maha.24.24.24.png', 10),
(27, 6, 'Adama-2-4-D', '550', 'Adama-2-4-D.jpg', 3),
(47, 11, 'mahadhan.16-16-16', '2200', 'maha.16-16-16.png', 100),
(48, 11, 'mahadhan.20.20.20', '1500', 'maha.20.20.20.jpg', 150),
(49, 11, 'Adama-2-4-D', '550', 'Adama-2-4-D.jpg', 60),
(50, 9, 'mahadhan.16-16-16', '2200', 'maha.16-16-16.png', 4),
(51, 12, 'mahadhan.16-16-16', '2200', 'maha.16-16-16.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'fertilizers'),
(2, 'pesticides'),
(3, 'fungicides'),
(4, 'herbicides');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `comm_name` varchar(100) NOT NULL,
  `comm_email` varchar(100) NOT NULL,
  `comm_phone` varchar(10) NOT NULL,
  `comm_comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `comm_name`, `comm_email`, `comm_phone`, `comm_comment`) VALUES
(9, 'Amit Petkar', 'amit@gmail.com', '9022601075', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quod nesciunt, doloribus nulla deserunt quaerat nobis, voluptas sapiente esse architecto, sunt fugiat? Sunt voluptatibus dicta, placeat deleniti soluta nulla numquam.'),
(10, 'Sandesh Nalwade', 'sandesh@gmail.com', '2314567323', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quod nesciunt, doloribus nulla deserunt quaerat nobis, voluptas sapiente esse architecto, sunt fugiat? Sunt voluptatibus dicta, placeat deleniti soluta nulla numquam.'),
(11, 'Kiran Bhong', 'kiran@gmail.com', '7058706373', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quod nesciunt, doloribus nulla deserunt quaerat nobis, voluptas sapiente esse architecto, sunt fugiat? Sunt voluptatibus dicta, placeat deleniti soluta nulla numquam.'),
(13, 'Mauli Kshirsagar', 'mauli@gmail.com', '2314567323', 'something');

-- --------------------------------------------------------

--
-- Table structure for table `harvesters`
--

CREATE TABLE `harvesters` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harvesters`
--

INSERT INTO `harvesters` (`id`, `name`, `mobile`, `address`) VALUES
(5, 'somthing', '9022328912', 'adresss something'),
(6, 'harvester-3', '1234567890', 'post :- indapur dist-pune tal-indapur Maharastra india');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(23, 'Kiran Bhong', '7058706373', 'kiran@gmail.com', 'cash on delivery', 'none', 'indapur', 'Indapur', 'Maharastra', 'India', 413106, '(mahadhan.16-16-16(=4=/2020/, (SPIC Neem Coated Urea(=10=/1200/', '20080'),
(24, 'amit Petkar', '9022601075', 'amit@gmail.com', 'cash on delivery', 'none', 'petkarwasti', 'Indapur', 'Maharastra', 'India', 413106, '(Arysta-Banest 20(=7=/120/, (mahadhan.16-16-16(=1=/2020/, (SPIC Neem Coated Urea(=9=/1200/, (mahadhan.19.19.19(=10=/1500/, (mahadhan.24.24.24(=10=/1500/, (Adama-2-4-D(=3=/550/', '45310'),
(25, 'Kiran Bhong', '7058706373', 'kiran@gmail.com', 'cash on delivery', 'none', 'indapur', 'Indapur', 'Maharastra', 'India', 413106, '(mahadhan.20.20.20(=15=/2230/, (mahadhan.16-16-16(=10=/1350/', '46950'),
(26, 'Kiran Bhong', '7058706373', 'kiran@gmail.com', 'cash on delivery', 'none', 'indapur', 'Indapur', 'Maharastra', 'India', 413106, '(mahadhan.16-16-16(=3=/2200/', '6600');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `pro_price` varchar(100) NOT NULL,
  `pro_image` varchar(100) NOT NULL,
  `pro_detail` varchar(500) NOT NULL,
  `pro_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_image`, `pro_detail`, `pro_category`) VALUES
(45, 'mahadhan.16-16-16', '2200', 'maha.16-16-16.png', 'mahadhan.16-16-16', '1'),
(46, 'mahadhan.20.20.20', '1500', 'maha.20.20.20.jpg', 'mahadhan.20.20.20', '1'),
(48, 'UPL-disect', '1500', 'UPL-disect.jpg', 'UPL-disect', '2'),
(49, '00.52.34', '2230', '00.52.34.png', '00.52.34', '1'),
(50, 'Adama-2-4-D', '550', 'Adama-2-4-D.jpg', 'Adama-2-4-D', '4');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regid` int(11) NOT NULL,
  `regfname` varchar(100) NOT NULL,
  `reglname` varchar(100) NOT NULL,
  `regemail` varchar(100) NOT NULL,
  `regphone` varchar(10) NOT NULL,
  `regpass` varchar(100) NOT NULL,
  `reggender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `regfname`, `reglname`, `regemail`, `regphone`, `regpass`, `reggender`) VALUES
(7, 'amit', 'petkar', 'amit@gmail.com', '9022601075', '827ccb0eea8a706c4c34a16891f84e7b', 'male'),
(8, 'mauli', 'kshrisagar', 'mauli@gmail.com', '1234567890', '29d1ed398cb8a4946df8ffe5c54f4460', 'male'),
(9, 'kiran', 'bhong', 'kiran@gmail.com', '7058706373', 'b1a5b64256e27fa5ae76d62b95209ab3', 'male'),
(10, 'sandesh', 'Nalwade', 'sandesh@gmail.com', '9555330092', 'dee3ae5926b1768ea18228ee54281df3', 'male'),
(12, 'amit', 'petkar', 'amit33@gmail.com', '9022601075', '81dc9bdb52d04dc20036dbd8313ed055', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quentity` int(100) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `total_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_name`, `quentity`, `product_cat`, `total_stock`) VALUES
(27, 'mahadhan.16-16-16', 988, '1', 1114),
(28, 'mahadhan.20.20.20', 299, '1', 450),
(30, 'UPL-disect', 500, '2', 500),
(31, '00.52.34', 400, '1', 400),
(32, 'Adama-2-4-D', 90, '4', 150);

-- --------------------------------------------------------

--
-- Table structure for table `supplyer`
--

CREATE TABLE `supplyer` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplyer`
--

INSERT INTO `supplyer` (`id`, `name`, `address`, `mobile`, `company`) VALUES
(2, 'suppler name', 'address of suppler', '9087654321', 'suppler company');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_details`
--

CREATE TABLE `tracking_details` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_details`
--

INSERT INTO `tracking_details` (`id`, `user_id`, `name`, `number`, `email`, `flat`, `street`, `city`, `state`, `country`, `pincode`) VALUES
(4, '8', 'mauli Khirsagar', '1234567890', 'mauli@gmail.com', 'no', 'temburni', 'Solapur', 'Maharastra', 'India', '123456'),
(6, '7', 'amit Petkar', '9022601075', 'amit@gmail.com', 'none', 'none', 'Indapur', 'Maharastra', 'India', '413106'),
(7, '10', 'sandesh Nalwade', '9555330092', 'sandesh@gmail.com', 'none', 'Gotandi', 'Indapur', 'Maharastra', 'India', '413120'),
(8, '6', 'amit Petkar', '9022601075', 'amit@gmail.com', 'none', 'petkarwasti', 'Indapur', 'Maharastra', 'India', '413106'),
(9, '9', 'Kiran Bhong', '7058706373', 'kiran@gmail.com', 'none', 'indapur', 'Indapur', 'Maharastra', 'India', '413106');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `harvesters`
--
ALTER TABLE `harvesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplyer`
--
ALTER TABLE `supplyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking_details`
--
ALTER TABLE `tracking_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `harvesters`
--
ALTER TABLE `harvesters`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `supplyer`
--
ALTER TABLE `supplyer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tracking_details`
--
ALTER TABLE `tracking_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
