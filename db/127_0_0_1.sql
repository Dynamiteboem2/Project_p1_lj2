-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2024 at 05:33 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakerness`
--
CREATE DATABASE IF NOT EXISTS `sneakerness` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sneakerness`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `createdDate`) VALUES
(1, 'admin', '123123', '2024-10-09 08:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstName`, `lastName`, `email`, `message`, `createdDate`) VALUES
(2, 'David', 'Croza', 'davidcroza@gmail.com', 'Hello, this is a message.', '2024-10-08 11:44:04'),
(3, 'Test', 'User', 'testuser@gmail.com', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit nobis veniam totam facilis dignissimos! Ut dolore laborum, libero quisquam molestiae cupiditate, doloribus fuga quos dolorum officiis quidem minus rerum asperiores.', '2024-10-09 14:30:52'),
(4, 'John', 'Jackson', 'john@test.com', 'Hey man', '2024-10-09 14:31:42'),
(5, 'Hyper', 'Nano', 'hypernano@gmail.com', 'pakshglpkashgolkwqht lwqioiwot piowtq pi wqtppwqtp  twqtwqqtw', '2024-10-09 15:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `contactperson`
--

DROP TABLE IF EXISTS `contactperson`;
CREATE TABLE IF NOT EXISTS `contactperson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactperson`
--

INSERT INTO `contactperson` (`id`, `firstName`, `infixName`, `lastName`, `email`, `phoneNumber`, `createdDate`) VALUES
(1, 'Nick', '', 'Mens', 'nickmens0242@gmail.com', '061213123', '2024-10-09 09:50:18'),
(3, 'Charlie', '', 'Factory', 'charlie@gmail.com', '0612345678', '2024-10-09 14:53:20'),
(4, 'Contact', '', 'Person', 'newmail@gmail.com', '0639142008', '2024-10-09 15:29:14'),
(5, 'Test', '', 'Person', 'test@gmail.com' , '0692912521', '2024-10-09 17:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

DROP TABLE IF EXISTS `stand`;
CREATE TABLE IF NOT EXISTS `stand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `birthdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `standDate` timestamp NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `birthdate`, `standDate`, `createdDate`) VALUES
(1, 'Hyper', 'Nano', 'hypernano@gmail.com', '0612312312', '2024-10-16', '0000-00-00 00:00:00', '2024-10-08 17:02:41'),
(2, 'Name', 'Lastname', 'namelastname@gmail.com', '0612312321', '2006-05-02', '0000-00-00 00:00:00', '2024-10-09 09:51:02'),
(3, 'Patrick', 'van der Zart', 'partickza012@gmail.com', '0612312323', '2008-06-09', '0000-00-00 00:00:00', '2024-10-09 14:37:30'),
(4, 'Leon', 'Deny', 'leonden@gmail.co', '0612312322', '2000-06-02', '0000-00-00 00:00:00', '2024-10-09 15:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `event` varchar(255) NOT NULL,
  `eventDate` varchar(150) NOT NULL,
  `ticketType` varchar(50) NOT NULL,
  `ticketQuantity` int NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `userID`, `event`, `eventDate`, `ticketType`, `ticketQuantity`, `firstName`, `lastName`, `phoneNumber`, `email`, `createdDate`) VALUES
(1, 0, 'Budapest 2024', '23 oktober vanaf 14:00 OKTOBER, 2024', 'Normaal', 1, 'Mena', 'Unsa', '0612312312', 'hyper@gmail.com', '2024-10-08 11:58:36'),
(5, 0, 'Rotterdam 2024', '26 oktober vanaf 14:00 OKTOBER, 2024', 'Normaal', 1, 'Firstname', 'Lastname', '+49 1251252', 'firstname@example.com', '2024-10-09 14:33:38'),
(6, 0, 'Budapest 2024', '23 oktober vanaf 14:00 OKTOBER, 2024', 'Normaal', 2, 'Tom', 'Cruise', '+31 612412341', 'tom@cruise.com', '2024-10-09 15:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) NULL,
  `lastName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
