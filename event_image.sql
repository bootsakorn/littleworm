-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 03:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_image`
--

CREATE TABLE `event_image` (
  `event_id` int(20) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pathImage` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_image`
--

INSERT INTO `event_image` (`event_id`, `image`, `pathImage`) VALUES
(25, '5aa42e42c7e7b', '1'),
(25, '5aa42e42d564a', '1'),
(26, '5aa4331aeda6e', '1'),
(26, '5aa4331b19610', '1'),
(26, '5aa4331b2257e', '1'),
(26, '5aa4331b39dea', '1'),
(27, '5aa4358002e2f', '1'),
(27, '5aa4358015b26', '1'),
(27, '5aa435801fc8c', '1'),
(27, '5aa4358042f95', '1'),
(28, '5aa452faa0a8c', '1'),
(28, '5aa452fac46bf', '1'),
(28, '5aa452fae5098', '1'),
(28, '5aa452faf1c17', '1'),
(29, '5aa4549d446fd', '1'),
(29, '5aa4549d4d371', '1'),
(29, '5aa4549d5aa4d', '1'),
(29, '5aa4549d65e43', '1'),
(30, '5aa456dc322fe', '1'),
(30, '5aa456dc61ff3', '1'),
(30, '5aa456dc6aecb', '1'),
(31, '5aa4575996483', '1'),
(31, '5aa457599d68c', '1'),
(31, '5aa45759a6481', '1'),
(32, '5aa457fa7dfc6', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_image`
--
ALTER TABLE `event_image`
  ADD PRIMARY KEY (`event_id`,`image`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_image`
--
ALTER TABLE `event_image`
  ADD CONSTRAINT `event_image_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
