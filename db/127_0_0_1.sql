-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 18 okt 2024 om 09:08
-- Serverversie: 9.0.1
-- PHP-versie: 8.3.11

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
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

INSERT INTO `admin` (`id`, `username`, `password`, `isActive`, `comment`, `createdDate`, `modifiedDate`) VALUES
(2, 'admin', '123123', 1, '', '2024-10-18 10:25:44', '2024-10-18 10:25:44');
COMMIT;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactperson`
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

INSERT INTO `contactperson` (`id`, `firstName`, `infixName`, `lastName`, `email`, `phoneNumber`, `createdDate`) VALUES
(1, 'Nick', '', 'Mens', 'nickmens0242@gmail.com', '061213123', '2024-10-09 09:50:18'),
(3, 'Charlie', '', 'Factory', 'charlie@gmail.com', '0612345678', '2024-10-09 14:53:20'),
(4, 'Contact', '', 'Person', 'newmail@gmail.com', '0639142008', '2024-10-09 15:29:14'),
(5, 'Test', '', 'Person', 'test@gmail.com' , '0692912521', '2024-10-09 17:06:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stand`
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
  `standId` int NOT NULL,
  `standDate` timestamp NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `stand`
--

INSERT INTO `stand` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `birthdate`, `standDate`, `createdDate`) VALUES
(5, 'Gert', 'Gert', 'gert@hotmail.com', '0681625265', '2000-05-05', '2024-10-26 22:00:00', '2024-10-18 09:08:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `infoStand`
--

DROP TABLE IF EXISTS `infoStand`;
CREATE TABLE IF NOT EXISTS `infoStand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `standName` varchar(20) NOT NULL, 
  `description` text NOT NULL,    
  `price` decimal(10,2) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `infoStand` (`id`, `standName`, `description`, `price`, `createdDate`) VALUES
(1, 'eten en drinken', 'Locatie: Deze stand bevindt zich centraal geplaatst in het midden van het event waardoor er veel mensen zijn.', '€150', '2024-10-18 09:08:43');

--
-- Tabelstructuur voor tabel `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  `event_date` date NOT NULL,
  `ticket_quantity` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`),
  KEY `user_id` (`user_id`),
  KEY `ticket_event_fk` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event`
--
-- ALTER TABLE `ticket` DROP FOREIGN KEY IF EXISTS `ticket_event_fk`;

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text,
  `ticket_price` decimal(10,2) NOT NULL,

  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
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

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `ticket`
--

-- Drop foreign key `ticket_ibfk_1` for table `ticket`
-- ALTER TABLE `ticket` DROP FOREIGN KEY `ticket_event_fk`;


ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_event_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
  -- ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
