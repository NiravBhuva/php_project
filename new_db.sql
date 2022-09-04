-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2022 at 11:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `Card_id` int(5) NOT NULL,
  `Category` text NOT NULL,
  `Industry` text NOT NULL,
  `Name` text NOT NULL,
  `Image` text NOT NULL,
  `Price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`Card_id`, `Category`, `Industry`, `Name`, `Image`, `Price`) VALUES
(2, '5', '4', 'Automobiles', 'automobiles.png', 1302),
(3, '1', '5', 'I.T.', 'it9.jpg', 300),
(4, '2', '3', 'Photography', 'photography.png', 320),
(5, '4', '1', 'Folded', 'folded.png', 300),
(6, '2', '1', 'Office', 'slider2.jpg', 200),
(7, '3', '2', 'Finance', 'slider5.jpg', 300),
(8, '1', '2', 'Medical', 'medical.png', 100),
(9, '2', '2', 'Education', 'education.png', 100),
(10, '6', '4', 'Restaurant', 'restaurant.png', 200),
(13, '1', '1', 'Corporate', 'corporate.png', 300);

-- --------------------------------------------------------

--
-- Table structure for table `cat_info`
--

CREATE TABLE `cat_info` (
  `Cat_id` int(5) NOT NULL,
  `Cat_name` varchar(100) NOT NULL,
  `Cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat_info`
--

INSERT INTO `cat_info` (`Cat_id`, `Cat_name`, `Cat_img`) VALUES
(1, 'Classic', 'classic.png'),
(2, 'Standard', 'standard.png'),
(3, 'Premium Glossy', 'glossy.webp'),
(4, 'Non Tearable', 'non-tearable.png'),
(5, 'Rounded', 'rounded.png'),
(6, 'Premium Matte', 'matte.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Contact_id` int(5) NOT NULL,
  `Username` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Subject` text NOT NULL,
  `Contact_Date` text NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Contact_id`, `Username`, `Contact`, `Email`, `Subject`, `Contact_Date`, `Message`) VALUES
(3, 'Nirav', 7990322058, 'nirav@gmail.com', 'Order', '26-06-2022', 'I want to order visiting card'),
(4, 'asdf', 234, 'asdfs', 'df', 'sdf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `industry_info`
--

CREATE TABLE `industry_info` (
  `Industry_id` int(5) NOT NULL,
  `Industry_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry_info`
--

INSERT INTO `industry_info` (`Industry_id`, `Industry_name`) VALUES
(1, 'Office/Company'),
(2, 'Beauty Salon'),
(3, 'Travel & Tourism'),
(4, 'Restaurant'),
(5, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `order_item_detail`
--

CREATE TABLE `order_item_detail` (
  `id` int(5) NOT NULL,
  `Card_id` int(5) NOT NULL,
  `Order_id` int(5) NOT NULL,
  `Name` text NOT NULL,
  `Company` text NOT NULL,
  `Logo` text NOT NULL,
  `Email` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `SecondaryNumber` varchar(11) DEFAULT NULL,
  `Price` int(10) NOT NULL,
  `Address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item_detail`
--

INSERT INTO `order_item_detail` (`id`, `Card_id`, `Order_id`, `Name`, `Company`, `Logo`, `Email`, `Contact`, `SecondaryNumber`, `Price`, `Address`) VALUES
(60, 3, 72, 'jaydeep hirapara', 'hirapara', 'slider.jp2', 'jaydeep@gmail.com', 7878676543, NULL, 300, 'hirapara nagar 4'),
(61, 13, 73, 'avc', 'sdsd', 'slider.jp2', 'a@gmail.com', 7865432198, NULL, 300, 'ddc'),
(64, 3, 75, 'adf', 'asd', 'slider1.aspx.jpeg', 'nirav@gmail.com', 8990789078, NULL, 300, 'sd'),
(65, 10, 75, 'Niravvv', 'hirapara', 'slider1.aspx.jpeg', 'a@gmail.com', 7878676543, '8990789078', 200, 'sdf'),
(66, 10, 76, 'Niravvv', 'asd', 'slider1.aspx.jpeg', 'a@gmail.com', 7878676543, NULL, 200, 'df');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `Order_id` int(5) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Oamount` bigint(10) NOT NULL,
  `Order_status` varchar(50) NOT NULL,
  `Order_date` text NOT NULL,
  `Contact_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`Order_id`, `Username`, `User_id`, `Name`, `Oamount`, `Order_status`, `Order_date`, `Contact_no`) VALUES
(72, 'jaydeep', 7, 'jaydeeep hirapara', 300, 'PENDING', '29-08-2022', 8989898989),
(73, 'jaydeep', 7, 'avc', 600, 'PENDING', '29-08-2022', 8989898989),
(75, 'jaydeep', 7, 'Niravvv', 500, 'DELIVERED', '04-09-2022', 8989899090),
(76, 'jaydeep', 7, 'adf', 200, 'PENDING', '04-09-2022', 8989899090);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_id` int(5) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(150) NOT NULL,
  `DOB` varchar(150) NOT NULL,
  `Address` text NOT NULL,
  `City` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_id`, `Name`, `Username`, `Password`, `Contact`, `Email`, `Gender`, `DOB`, `Address`, `City`) VALUES
(1, 'Nirav', 'nirav', '123qwe', 1234567890, 'nirav@gmail.com', 'male', '05-04-1999', 'Jasdan, Gujarat', 'Rajkot'),
(7, 'jaydeep', 'Jaydeep', '123', 8769876754, 'jaydeep@gmail.com', 'male', 'DD-MMM-YYYY', 'jasdan', 'jasdan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `card_info`
--
ALTER TABLE `card_info`
  ADD UNIQUE KEY `Card_id` (`Card_id`);

--
-- Indexes for table `cat_info`
--
ALTER TABLE `cat_info`
  ADD UNIQUE KEY `Cat_id` (`Cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD UNIQUE KEY `Contact_id` (`Contact_id`);

--
-- Indexes for table `industry_info`
--
ALTER TABLE `industry_info`
  ADD UNIQUE KEY `Industry_id` (`Industry_id`);

--
-- Indexes for table `order_item_detail`
--
ALTER TABLE `order_item_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD UNIQUE KEY `Order_id` (`Order_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_info`
--
ALTER TABLE `card_info`
  MODIFY `Card_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cat_info`
--
ALTER TABLE `cat_info`
  MODIFY `Cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Contact_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `industry_info`
--
ALTER TABLE `industry_info`
  MODIFY `Industry_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_item_detail`
--
ALTER TABLE `order_item_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `Order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
