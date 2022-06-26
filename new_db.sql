-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2022 at 11:02 AM
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
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `Card_id` int(5) NOT NULL DEFAULT 0,
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
(13, '6', '1', 'Corporate', 'corporate.png', 299);

-- --------------------------------------------------------

--
-- Table structure for table `cat_info`
--

CREATE TABLE `cat_info` (
  `Cat_id` int(5) NOT NULL DEFAULT 0,
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
(3, 'Nirav', 7990322058, 'nirav@gmail.com', 'Order', '26-06-2022', 'I want to order visiting card');

-- --------------------------------------------------------

--
-- Table structure for table `industry_info`
--

CREATE TABLE `industry_info` (
  `Industry_id` int(5) NOT NULL DEFAULT 0,
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
(1, 'Nirav', 'nirav', '123qwe', 1234567890, 'nirav@gmail.com', 'male', '05-04-1999', 'Jasdan, Gujarat', 'Rajkot');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Contact_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
