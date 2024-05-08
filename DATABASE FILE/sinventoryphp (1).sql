-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 04:32 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinventoryphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT 0,
  `brand_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Bosch', 1, 1),
(2, 'NGK', 1, 1),
(3, 'Delphi', 1, 1),
(4, 'ACDelco', 1, 1),
(5, 'KYB', 1, 1),
(6, 'Continental', 1, 1),
(7, 'Michelin', 1, 1),
(8, 'Gates', 1, 1),
(9, 'Denso', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Engine Components', 1, 1),
(2, 'Transmission and Drivetrain', 1, 1),
(3, 'Suspension and steering', 1, 1),
(4, 'Braking system', 1, 1),
(5, 'Fuel SYSTEM', 1, 1),
(6, 'Cooling system', 1, 1),
(7, 'Body and chassis components', 1, 1),
(8, 'Exhaust system', 1, 1),
(9, 'Interior and exterior accessories', 1, 1),
(10, 'Body ', 1, 1),
(11, 'Bake', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `u_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`, `u_id`) VALUES
(11, '2024-05-04', 'ss', 'sss', '53.00', '9.54', '62.54', '3', '59.54', '100', '-40.46', 1, 1, 1, '9.54', 1, 1, 0),
(12, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(13, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(14, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(15, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(16, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(17, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(18, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(19, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(20, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(21, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(22, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(23, '2024-05-04', '', '333', '53.00', '9.54', '62.54', '3', '59.54', '3332', '-3272.46', 1, 1, 1, '9.54', 1, 1, 0),
(24, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(25, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(26, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(27, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(28, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(29, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(30, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(31, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(32, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(33, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(34, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(35, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(36, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(37, '2024-05-02', '', 'ee', '53.00', '9.54', '62.54', '1', '61.54', '300', '-238.46', 2, 1, 1, '9.54', 1, 1, 0),
(38, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(39, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(40, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(41, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(42, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(43, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(44, '2024-05-04', '', 'ee', '53.00', '9.54', '62.54', '2', '60.54', '10', '50.54', 1, 1, 1, '9.54', 1, 1, 0),
(45, '2024-05-05', 'hsks', '999', '4229.00', '761.22', '4990.22', '10', '4980.22', '200', '4780.22', 2, 1, 1, '761.22', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '2', '49', '49.00', 1),
(2, 2, 13, '2', '45', '45.00', 1),
(3, 3, 15, '31', '45', '45.00', 1),
(4, 0, 16, '12', '22', '264.00', 1),
(5, 0, 16, '13', '22', '264.00', 1),
(6, 0, 16, '12', '22', '286.00', 1),
(7, 4, 16, '12', '22', '264.00', 1),
(8, 5, 3, '2', '53', '106.00', 1),
(9, 6, 3, '14', '53', '742.00', 1),
(10, 7, 15, '2', '45', '90.00', 1),
(11, 8, 9, '4', '87', '348.00', 1),
(12, 9, 14, '4', '321', '1284.00', 1),
(13, 10, 6, '1', '70', '70.00', 1),
(14, 10, 7, '1', '29', '29.00', 1),
(15, 10, 10, '1', '35', '35.00', 1),
(16, 10, 4, '1', '140', '140.00', 1),
(17, 0, 3, '1', '53', '53.00', 1),
(18, 0, 3, '1', '53', '53.00', 1),
(19, 0, 3, '1', '53', '53.00', 1),
(20, 0, 3, '1', '53', '53.00', 1),
(21, 0, 3, '1', '53', '53.00', 1),
(22, 0, 3, '1', '53', '53.00', 1),
(23, 0, 3, '1', '53', '53.00', 1),
(24, 0, 3, '1', '53', '53.00', 1),
(25, 0, 3, '1', '53', '53.00', 1),
(26, 0, 3, '1', '53', '53.00', 1),
(27, 0, 3, '1', '53', '53.00', 1),
(28, 0, 3, '1', '53', '53.00', 1),
(29, 0, 3, '1', '53', '53.00', 1),
(30, 0, 3, '1', '53', '53.00', 1),
(31, 0, 3, '1', '53', '53.00', 1),
(32, 0, 3, '1', '53', '53.00', 1),
(33, 0, 3, '1', '53', '53.00', 1),
(34, 0, 3, '1', '53', '53.00', 1),
(35, 0, 3, '1', '53', '53.00', 1),
(36, 0, 3, '1', '53', '53.00', 1),
(37, 0, 3, '1', '53', '53.00', 1),
(38, 0, 3, '1', '53', '53.00', 1),
(39, 0, 3, '1', '53', '53.00', 1),
(40, 0, 3, '1', '53', '53.00', 1),
(41, 0, 3, '1', '53', '53.00', 1),
(42, 0, 3, '1', '53', '53.00', 1),
(43, 0, 3, '1', '53', '53.00', 1),
(44, 0, 3, '1', '53', '53.00', 1),
(45, 11, 3, '1', '53', '53.00', 1),
(46, 12, 3, '1', '53', '53.00', 1),
(47, 13, 3, '1', '53', '53.00', 1),
(48, 14, 3, '1', '53', '53.00', 1),
(49, 15, 3, '1', '53', '53.00', 1),
(50, 16, 3, '1', '53', '53.00', 1),
(51, 17, 3, '1', '53', '53.00', 1),
(52, 18, 3, '1', '53', '53.00', 1),
(53, 19, 3, '1', '53', '53.00', 1),
(54, 20, 3, '1', '53', '53.00', 1),
(55, 21, 3, '1', '53', '53.00', 1),
(56, 22, 3, '1', '53', '53.00', 1),
(57, 23, 3, '1', '53', '53.00', 1),
(58, 24, 3, '1', '53', '53.00', 1),
(59, 25, 3, '1', '53', '53.00', 1),
(60, 26, 3, '1', '53', '53.00', 1),
(61, 27, 3, '1', '53', '53.00', 1),
(62, 28, 3, '1', '53', '53.00', 1),
(63, 29, 3, '1', '53', '53.00', 1),
(64, 30, 3, '1', '53', '53.00', 1),
(65, 31, 3, '1', '53', '53.00', 1),
(66, 32, 3, '1', '53', '53.00', 1),
(67, 33, 3, '1', '53', '53.00', 1),
(68, 34, 3, '1', '53', '53.00', 1),
(69, 35, 3, '1', '53', '53.00', 1),
(70, 36, 3, '1', '53', '53.00', 1),
(71, 37, 3, '1', '53', '53.00', 1),
(72, 38, 3, '1', '53', '53.00', 1),
(73, 39, 3, '1', '53', '53.00', 1),
(74, 40, 3, '1', '53', '53.00', 1),
(75, 41, 3, '1', '53', '53.00', 1),
(76, 42, 3, '1', '53', '53.00', 1),
(77, 43, 3, '1', '53', '53.00', 1),
(78, 44, 3, '1', '53', '53.00', 1),
(79, 45, 5, '20', '210', '4200.00', 1),
(80, 45, 7, '1', '29', '29.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Car batteries', '../assests/images/stock/2120760b75c9237837.png', 1, 1, '0', '69', 1, 1),
(2, 'Car wax', '../assests/images/stock/2628560b75d3561d09.jpg', 1, 1, '22', '2', 2, 2),
(3, 'Car polish', '../assests/images/stock/2943460b7937a267ed.jpg', 4, 6, '43', '53', 1, 1),
(4, 'Tire shine', '../assests/images/stock/2926160b77b0e925b8.jpg', 2, 1, '118', '140', 1, 1),
(5, 'Wiper bladed', '../assests/images/stock/2951160b792ba3020b.jpg', 3, 5, '77', '210', 1, 1),
(6, 'Tires', '../assests/images/stock/2856060b77ea550ccf.png', 1, 1, '244', '70', 1, 1),
(7, 'Engine oil', '../assests/images/stock/165960b7909513f6d.jpg', 2, 2, '367', '29', 1, 1),
(8, 'Brake pads', '../assests/images/stock/2780060b790de5f64a.jpg', 2, 2, '512', '28', 1, 1),
(9, 'Air filters', '../assests/images/stock/1560160b79132ef6be.jpg', 2, 3, '216', '87', 1, 1),
(10, 'Car wash', '../assests/images/stock/431060b791b32026d.jpg', 2, 4, '151', '35', 1, 1),
(11, 'Engine degreasser', '../assests/images/stock/2065160b794843f641.jpg', 7, 7, '256', '60', 1, 1),
(12, 'Coolant', '../assests/images/stock/814660b794ffda66f.jpg', 4, 6, '126', '45', 1, 1),
(13, 'Windshield washer fluid', '../assests/images/stock/1946160b79a7472484.jpg', 8, 10, '257', '45', 1, 1),
(14, 'Windshield', '../assests/images/stock/392760b7a38b1e2d8.jpg', 9, 9, '254', '321', 1, 1),
(15, 'Power steering fluid ', '../assests/images/stock/1491660b7a42f42152.jpg', 5, 11, '332', '45', 1, 1),
(16, 'Sample Product', '../assests/images/stock/2254161f94e484d31a.jpg', 1, 1, '15', '22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tms_feedback`
--

CREATE TABLE `tms_feedback` (
  `f_id` int(20) NOT NULL,
  `f_uname` varchar(200) NOT NULL,
  `f_content` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_feedback`
--

INSERT INTO `tms_feedback` (`f_id`, `f_uname`, `f_content`, `f_status`) VALUES
(4, 'dddd emzo ', 'ddd', ''),
(5, 'sample name ', 'dhdhd', ''),
(6, 'sample name ', 'dhdjdj', '');

-- --------------------------------------------------------

--
-- Table structure for table `tms_user`
--

CREATE TABLE `tms_user` (
  `u_id` int(20) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_phone` varchar(200) NOT NULL,
  `u_addr` varchar(200) NOT NULL,
  `u_category` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_car_type` varchar(200) NOT NULL,
  `u_car_regno` varchar(200) NOT NULL,
  `u_car_bookdate` varchar(200) NOT NULL,
  `u_car_book_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_user`
--

INSERT INTO `tms_user` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_addr`, `u_category`, `u_email`, `u_pwd`, `u_car_type`, `u_car_regno`, `u_car_bookdate`, `u_car_book_status`) VALUES
(13, 'mech', 'mech', '20039404', 'limbe', 'User', 'emzo@gmail', '123', 'SUV', 'cmm223', '2024-05-22', 'Approved'),
(14, 'driver', 'driver', '20039404', 'limbe', 'Driver', 'df@gmail.com', '123', '', '', '', 'Pending'),
(15, 'sample', 'ss', '20039404', 'djjfjf', 'User', 'sampleuser@gmail.com', '123', 'SUV', 'fnfnfq3', '', 'Pending'),
(16, 'sample', 'name', 'eee', 'eeee', 'User', 'sampleuser2@gmail.com', '123', 'SUV', 'shdhhd', '2024-05-17', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tms_vehicle`
--

CREATE TABLE `tms_vehicle` (
  `v_id` int(20) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_pass_no` varchar(200) NOT NULL,
  `v_driver` varchar(200) NOT NULL,
  `v_category` varchar(200) NOT NULL,
  `v_dpic` varchar(200) NOT NULL,
  `v_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_vehicle`
--

INSERT INTO `tms_vehicle` (`v_id`, `v_name`, `v_reg_no`, `v_pass_no`, `v_driver`, `v_category`, `v_dpic`, `v_status`) VALUES
(10, 'Car tyres', 'fnfnf', '20', '13', 'Sedan', '', 'Pending'),
(12, 'Car tyres', 'fnfnfq3', '222222', '15', 'SUV', '', 'Available'),
(15, 'bmw', 'shdhhd', '4', '16', 'SUV', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(2, 'staff', '5f4dcc3b5aa765d61d8327deb882cf99', 'staff@stockmg.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tms_user`
--
ALTER TABLE `tms_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tms_vehicle`
--
ALTER TABLE `tms_vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tms_user`
--
ALTER TABLE `tms_user`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tms_vehicle`
--
ALTER TABLE `tms_vehicle`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
