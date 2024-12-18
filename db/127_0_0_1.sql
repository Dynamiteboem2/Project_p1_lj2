-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 01 nov 2024 om 12:35
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
-- Tabelstructuur voor tabel `contact`
--


DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactperson`
--

DROP TABLE IF EXISTS `contactperson`;
CREATE TABLE IF NOT EXISTS `contactperson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contactperson`
--

INSERT INTO `contactperson` (`id`, `firstName`, `infixName`, `lastName`, `email`, `phoneNumber`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Nick', '', 'Mens', 'nickmens0242@gmail.com', '061213123', b'1', NULL, '2024-10-27 19:17:24.000000', '2024-10-27 19:17:24.000000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_date`, `location`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Milaan 2024', '2024-06-15', 'Milaan', b'1', 'Milaan voetbaltoernooi', '2024-10-28 14:35:51.000000', '2024-10-28 14:35:51.000000'),
(2, 'Budapest 2024', '2024-07-20', 'Budapest', b'1', 'Budapest zomerfestival', '2024-10-28 14:35:51.000000', '2024-10-28 14:35:51.000000'),
(3, 'Rotterdam 2024', '2024-09-10', 'Rotterdam', b'1', 'Rotterdam havenweek', '2024-10-28 14:35:51.000000', '2024-10-28 14:35:51.000000');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stand`
--

DROP TABLE IF EXISTS `stand`;
CREATE TABLE IF NOT EXISTS `stand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `infixName` varchar(50) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `standId` int NOT NULL,
  `standDate` varchar(255) NOT NULL,
  `purchaseTimestamp` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `standName` varchar(50) NOT NULL,
  `price`DECIMAL(10, 2) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `stand`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `ticket_quantity` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt`datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id`),
  KEY `ticket_event_fk` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `infixName` varchar(50) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `DatumGewijzigd` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `infixName`, `lastName`, `type`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`, `birthdate`) VALUES
(1, 'gert@gmail.com', '$2y$10$x32iJnKWRt/VsPrCSYPdNewvr8nRQ2M.LM2vOxWxr/muDR.TCXiwO', 'Gert', '', 'Gert', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(2, 'mahdialkhalidi83@gmail.com', '$2y$10$NwGtuzQv1GlQvdtjGd5cO.p8D.ZABvqmTOBBXYDJcFQAJXibjp2/O', 'dsa', 'dsa', 'dsa', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(3, 'dsadasd@dsa.com', '$2y$10$3hobJlt.KJiBpiXqIH8nse4FM8//qHX31jSdouQsXoa1mzUKs9YF2', 'dsa', 'dsa', 'sad', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(4, 'test@test.com', '$2y$10$ED0IWp7VOkWSdrlh4GSjUe1fz09I2EhStIO3uMuT5iV/uJKmoDRGe', 'dsadas', 'dsa', 'dsa', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(5, 'dasda@dsa.com', '$2y$10$B/9acvrkFIz4Yt5RfO/F..Us86rxC9xq1AEpYf.ahF.0RkP4KP2he', 'dsadsa', 'dsa', 'dsadas', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(6, 'qwe@qwe.com', '$2y$10$tU4JPN2KumdxUZImmoIxguL9KG2EHPIuXnTsMVYV3lo/TxPRPawDq', 'qwe', '', 'qwe', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(7, 'dsa@dsa.com', '$2y$10$5zXxB8T.Gi6e3kkchYBbs.tSp7KZRHhjHT.CM0wgy7oJJW6PKZUdK', 'dsa', 'dsa', 'dsa', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00'),
(8, 'ha@h.com', '$2y$10$lxcUX/OFJUKCIqa7UD8KEOI0vZTaru.t.QFQR4XFpURAf3UsZOtgi', 'dsa', 'das', 'das', '', b'1', NULL, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
