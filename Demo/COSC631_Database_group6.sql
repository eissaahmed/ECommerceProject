-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2015 at 08:59 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db201501_471_g12`
--

-- -------------------------------------------------------


--
-- Table structure for table `OS_Category`
--

CREATE TABLE IF NOT EXISTS `OS_Category` (
  `Category_ID` varchar(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Active` int(1) DEFAULT '1',
  `Create_Date` date NOT NULL,
  `Update_Date` date DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OS_Category`
--

INSERT INTO `OS_Category` (`Category_ID`, `Name`, `Active`, `Create_Date`, `Update_Date`) VALUES
('1', 'Juices', 1, '2015-12-01', '2015-12-01'),
('2', 'Spices', 1, '2015-12-01', '2015-12-01'),
('3', 'Fruit', 1, '2015-12-07', '2015-12-07'),
('4', 'Vegetable', 1, '2015-12-07', '2015-12-07'),
('5', 'Meat', 1, '2015-12-07', '2015-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `OS_Event`
--

CREATE TABLE IF NOT EXISTS `OS_Event` (
  `Event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(1000) NOT NULL,
  `Description` varchar(60000) DEFAULT NULL,
  `Event_Date` datetime DEFAULT NULL,
  `Active` bit(1) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Event_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OS_Location`
--

CREATE TABLE IF NOT EXISTS `OS_Location` (
  `Location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Address1` varchar(150) NOT NULL,
  `Address2` varchar(150) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Country` varchar(3) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Work_Phone` varchar(15) DEFAULT NULL,
  `Fax_Number` varchar(15) DEFAULT NULL,
  `Active` bit(1) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OS_Order`
--

CREATE TABLE IF NOT EXISTS `OS_Order` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` varchar(255) NOT NULL,
  `Order_Date` date NOT NULL,
  `Total_Price` decimal(6,2) NOT NULL,
  `ifProcessed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `OS_Order`
--

INSERT INTO `OS_Order` (`Order_ID`, `User_ID`, `Order_Date`, `Total_Price`, `ifProcessed`) VALUES
(1, 'ad@emich.edu', '2015-12-02', 27.00, 0),
(2, 'ad@emich.edu', '2015-12-04', 8.05, 0),
(3, 'ad@emich.edu', '2015-12-05', 23.99, 0),
(4, 'psaha@gmail.com', '2015-12-09', 3.20, 0),
(5, 'psaha@gmail.com', '2015-12-09', 3.20, 0),
(6, 'psaha@gmail.com', '2015-12-09', 3.20, 0),
(7, 'psaha@gmail.com', '2015-12-09', 16.75, 0),
(8, 'psaha@gmail.com', '2015-12-09', 3.20, 0),
(9, 'psaha@gmail.com', '2015-12-09', 6.45, 0),
(10, 'psaha@gmail.com', '2015-12-09', 6.45, 0),
(11, 'psaha@gmail.com', '2015-12-09', 6.45, 0),
(12, 'psaha@gmail.com', '2015-12-09', 1.20, 0),
(13, 'psaha@gmail.com', '2015-12-09', 1.20, 0),
(14, 'psaha@gmail.com', '2015-12-09', 1.20, 0),
(15, 'psaha@gmail.com', '2015-12-09', 6.45, 0),
(16, 'psaha@gmail.com', '2015-12-09', 5.25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `OS_Order_Detail`
--

CREATE TABLE IF NOT EXISTS `OS_Order_Detail` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` varchar(11) NOT NULL,
  `Quantity` float NOT NULL,
  PRIMARY KEY (`Order_ID`,`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OS_Order_Detail`
--

INSERT INTO `OS_Order_Detail` (`Order_ID`, `Product_ID`, `Quantity`) VALUES
(1, '2121', 1),
(1, '231', 1),
(2, '2212', 1),
(2, '2342343', 1),
(3, '231', 1),
(3, '23242', 1),
(4, '1', 1),
(6, '5678', 1),
(7, '2121', 1),
(7, '2212', 1),
(7, '2342343', 1),
(7, '5678', 2),
(8, '5678', 1),
(9, '12', 1),
(9, '2342343', 1),
(10, '12', 1),
(10, '2342343', 1),
(11, '12', 1),
(11, '2342343', 1),
(12, '12', 1),
(13, '12', 1),
(14, '12', 1),
(15, '12', 1),
(15, '2342343', 1),
(16, '2342343', 1);

-- --------------------------------------------------------

--
-- Table structure for table `OS_Product`
--

CREATE TABLE IF NOT EXISTS `OS_Product` (
  `Product_ID` varchar(11) NOT NULL,
  `Category_ID` varchar(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Sale_Price` decimal(6,2) NOT NULL,
  `Cost` decimal(6,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Rating` decimal(10,0) DEFAULT NULL,
  `Image_URL` varchar(1000) DEFAULT NULL,
  `Active` int(1) DEFAULT '1',
  `Create_Date` date DEFAULT NULL,
  `Update_Date` date DEFAULT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Category_ID` (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OS_Product`
--

INSERT INTO `OS_Product` (`Product_ID`, `Category_ID`, `Name`, `Description`, `Price`, `Sale_Price`, `Cost`, `Quantity`, `Rating`, `Image_URL`, `Active`, `Create_Date`, `Update_Date`) VALUES
('1', '1', 'Orange Juice', 'Delicious OJ for adults and kids!', 0.99, 0.99, 0.50, 50, 1, 'orange-juice-carton-clipart-orange-juice-clipart-4.jpg', 1, '2015-12-01', '2015-12-01'),
('12', '3', 'Apple', 'unit is pound', 1.20, 1.00, 0.70, 60, 0, 'images.jpg', 1, '2015-12-07', '2015-12-07'),
('2121', '2', 'Black pepper', 'wrwqrwtrwerwqr', 4.00, 3.00, 3.09, 132, 0, 'blackp.png', 1, '2015-12-08', '2015-12-09'),
('2212', '1', 'Nestle Juicy Juice 100% Apple Juice 48 oz', 'Made in the USA or Imported', 4.30, 3.50, 2.30, 12, 0, '16192787.jpg', 1, '2015-12-06', '2015-12-06'),
('231', '2', 'YouCopia Chefs Edition SpiceStack', 'xfdsfsf', 25.00, 23.00, 15.00, 2345, 0, '50219876_Alt01.jpg', 1, '2015-12-07', '2015-12-07'),
('23242', '4', 'Green bean', 'Unit is pound', 1.25, 0.99, 0.98, 23, 0, 'greenBean.png', 1, '2015-12-07', '2015-12-07'),
('2342343', '5', 'Ground Beef', 'Ranging from 2 to 3 days', 5.25, 4.55, 3.90, 21, 0, 'beef.jpg', 1, '2015-12-07', '2015-12-07'),
('5678', '1', 'Juicy Juice Berry 100% Juice 64 oz', 'dfdfsd', 3.20, 2.40, 2.70, 23, 0, '13386435.jpg', 1, '2015-12-07', '2015-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `OS_Shopping_Cart`
--

CREATE TABLE IF NOT EXISTS `OS_Shopping_Cart` (
  `Shopping_Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` varchar(255) NOT NULL,
  `Active` bit(1) NOT NULL,
  `Create_Date` datetime NOT NULL,
  PRIMARY KEY (`Shopping_Cart_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `OS_Shopping_Cart`
--

INSERT INTO `OS_Shopping_Cart` (`Shopping_Cart_ID`, `User_ID`, `Active`, `Create_Date`) VALUES
(11, 'qq@emich.edu', b'1', '2015-12-09 14:07:03'),
(12, 'psaha@gmail.com', b'0', '2015-12-09 14:13:32'),
(13, 'psaha@gmail.com', b'0', '2015-12-09 14:31:20'),
(14, 'NULL', b'1', '2015-12-09 14:32:47'),
(15, 'psaha@gmail.com', b'0', '2015-12-09 14:36:43'),
(16, 'psaha@gmail.com', b'0', '2015-12-09 15:07:30'),
(17, 'psaha@gmail.com', b'0', '2015-12-09 15:30:21'),
(18, 'psaha@gmail.com', b'0', '2015-12-09 15:39:19'),
(19, 'psaha@gmail.com', b'0', '2015-12-09 15:44:08'),
(20, 'psaha@gmail.com', b'0', '2015-12-09 15:54:40'),
(21, 'psaha@gmail.com', b'0', '2015-12-09 16:02:21'),
(22, 'psaha@gmail.com', b'0', '2015-12-09 16:10:59'),
(23, 'psaha@gmail.com', b'0', '2015-12-09 16:15:47'),
(24, 'psaha@gmail.com', b'0', '2015-12-09 16:31:16'),
(25, 'psaha@gmail.com', b'0', '2015-12-09 16:34:28'),
(26, 'psaha@gmail.com', b'0', '2015-12-09 16:37:03'),
(27, 'psaha@gmail.com', b'0', '2015-12-09 16:38:16'),
(28, 'ad@emich.edu', b'1', '2015-12-09 17:28:15'),
(29, 'psaha@gmail.com', b'0', '2015-12-09 17:44:00'),
(30, 'psaha@gmail.com', b'0', '2015-12-09 19:34:32'),
(31, 'psaha@gmail.com', b'1', '2015-12-09 19:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `OS_Shopping_Cart_Details`
--

CREATE TABLE IF NOT EXISTS `OS_Shopping_Cart_Details` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Shopping_Cart_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Create_Date` date NOT NULL,
  `Update_Date` date DEFAULT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `OS_Shopping_Cart_Details`
--

INSERT INTO `OS_Shopping_Cart_Details` (`Item_ID`, `Shopping_Cart_ID`, `Product_ID`, `Quantity`, `Create_Date`, `Update_Date`) VALUES
(46, 11, 5678, 1, '2015-12-09', NULL),
(47, 12, 5678, 1, '2015-12-09', NULL),
(48, 12, 5678, 1, '2015-12-09', NULL),
(49, 13, 5678, 1, '2015-12-09', NULL),
(50, 13, 2342343, 1, '2015-12-09', NULL),
(51, 13, 2121, 2, '2015-12-09', NULL),
(52, 14, 5678, 1, '2015-12-09', NULL),
(53, 15, 5678, 1, '2015-12-09', NULL),
(54, 16, 5678, 1, '2015-12-09', NULL),
(55, 17, 5678, 1, '2015-12-09', NULL),
(56, 18, 5678, 1, '2015-12-09', NULL),
(57, 19, 5678, 1, '2015-12-09', NULL),
(58, 20, 5678, 2, '2015-12-09', NULL),
(59, 20, 2212, 1, '2015-12-09', NULL),
(60, 20, 2121, 1, '2015-12-09', NULL),
(61, 20, 2342343, 1, '2015-12-09', NULL),
(62, 21, 5678, 1, '2015-12-09', NULL),
(63, 22, 2342343, 1, '2015-12-09', NULL),
(64, 22, 12, 1, '2015-12-09', NULL),
(65, 23, 2342343, 1, '2015-12-09', NULL),
(66, 23, 12, 1, '2015-12-09', NULL),
(67, 24, 12, 1, '2015-12-09', NULL),
(68, 24, 2342343, 1, '2015-12-09', NULL),
(69, 25, 12, 1, '2015-12-09', NULL),
(70, 26, 12, 1, '2015-12-09', NULL),
(71, 27, 12, 1, '2015-12-09', NULL),
(72, 28, 12, 1, '2015-12-09', NULL),
(73, 29, 12, 1, '2015-12-09', NULL),
(74, 29, 2342343, 1, '2015-12-09', NULL),
(75, 30, 2342343, 1, '2015-12-09', NULL),
(76, 31, 12, 1, '2015-12-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `OS_User`
--

CREATE TABLE IF NOT EXISTS `OS_User` (
  `Is_Admin` int(1) NOT NULL DEFAULT '0',
  `First_Name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Middle_Initial` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Last_Name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Address1` varchar(150) CHARACTER SET latin1 NOT NULL,
  `City` varchar(50) CHARACTER SET latin1 NOT NULL,
  `State` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Zip` varchar(10) CHARACTER SET latin1 NOT NULL,
  `Country` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Cell_Phone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1',
  `Create_Date` date NOT NULL,
  `Update_Date` date DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `OS_User`
--

INSERT INTO `OS_User` (`Is_Admin`, `First_Name`, `Middle_Initial`, `Last_Name`, `Address1`, `City`, `State`, `Zip`, `Country`, `Email`, `Cell_Phone`, `Password`, `Active`, `Create_Date`, `Update_Date`) VALUES
(0, 'aada', 'ada', 'adad', 'sfsf', 'sfsf', 'sfsf', '12345', 'sfsf', 'aaaa@emich.edu', '', 'asy.W7WEx6X..', 1, '2015-12-09', '2015-12-09'),
(0, 'adsaf', 'afa', 'sdf', 'dga', 'gag', 'aga', '23456', 'asgsgs', 'ad@emich.edu', '', 'asREC2GGu0ta6', 1, '2015-12-09', '2015-12-09'),
(0, 'fgs', 'aqw', 'ada', 'ge', 'wqg', 'qwgq', '12345', 'gq', 'er@emich.edu', '', 'astkC74RZIyVs', 1, '2015-12-09', '2015-12-09'),
(1, 'na', 'na', 'xu', '2343 dfjalvfdfd', 'ann arbor', 'Mi', '48108', 'USA', 'hxu4@emich.edu', '', 'asGh4dbmmKEv6', 1, '2015-12-09', '2015-12-09'),
(0, 'hui', '', 'xu', 'dsfsfsfs', 'andjh fff', 'Michigan', '48108', 'Unite state', 'hxu@emich.edu', '', 'asGh4dbmmKEv6', 1, '2015-12-09', '2015-12-09'),
(0, 'preeti', '', 'saha', 'khjksdl', 'kjhkjdsk', 'khkjdsf', '60656', 'US', 'psaha@gmail.com', '', 'assZl/YH83gJY', 1, '2015-12-09', '2015-12-09'),
(0, 'aqaq', 'sfsdf', 'qqq', 'dgdsg', 'dgsg', 'sagsa', '12345', 'sgsg', 'qq@emich.edu', '', 'asA3Ku/PC/rZ.', 1, '2015-12-09', '2015-12-09');

-- --------------------------------------------------------



