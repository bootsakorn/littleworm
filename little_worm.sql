-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 09:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `little_worm`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendant`
--

CREATE TABLE `attendant` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic_path` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendant`
--

INSERT INTO `attendant` (`email`, `first_name`, `last_name`, `phone`, `birth_date`, `address`, `profile_pic_path`) VALUES
('abc@hotmail.com', 'techa', 'anu', '0123456789', '2018-03-08', 'test', ''),
('techasit.a@ku.th', 'techasit', 'anukrua', '0123456789', '1996-10-08', 'test', 'img_profile/5aa5ae87c2fed.jpg'),
('xyz@gmail.com', 'sit', 'krua', '0987654321', '2018-03-28', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `attend_event_schedule`
--

CREATE TABLE `attend_event_schedule` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `join_time` datetime(6) NOT NULL,
  `attend_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precondition_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `assessment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_event_schedule`
--

INSERT INTO `attend_event_schedule` (`id`, `event_id`, `user_email`, `join_time`, `attend_status`, `precondition_status`, `receipt_status`, `assessment_status`) VALUES
('01', '01', 'xyz@gmail.com', '2018-03-06 02:15:00.000000', 'test', 'test', 'test', ''),
('02', '01', 'abc@hotmail.com', '2018-03-05 00:00:00.000000', 'test', 'test', 'test', ''),
('03', '02', 'xyz@gmail.com', '2018-03-02 00:00:00.000000', 'test', 'test', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `participant_amt` int(255) NOT NULL,
  `TYPE` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `teaser_vdo_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `organizer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `precondition` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `google_map` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `report_point` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `place`, `date`, `time`, `participant_amt`, `TYPE`, `teaser_vdo_path`, `organizer_name`, `price`, `precondition`, `google_map`, `report_point`) VALUES
('01', 'หนอนน้อยโกโก', 'test', '2018-03-06', '04:00:00', 0, 'test', 'test', 'test', 0, 'test', 'test', 0),
('02', 'กินข้าว', 'test', '2018-03-07', '12:00:00', 0, 'test', 'test', 'test', 0, 'test', 'test', 0),
('03', 'นอน', 'test', '2018-03-12', '03:00:00', 0, 'test', 'test', 'test', 0, 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_image`
--

CREATE TABLE `event_image` (
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `img_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `precondition`
--

CREATE TABLE `precondition` (
  `attend_event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `attend_event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `position`, `report_point`) VALUES
('abc@homail.com', '1234', 'test', 0),
('techasit.a@ku.th', '$2y$10$a4gPr/BbEqoYn9wMj2VPT.X', 'USER', 0),
('xyz@gmail.com', '4321', 'test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendant`
--
ALTER TABLE `attendant`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `attend_event_schedule`
--
ALTER TABLE `attend_event_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_image`
--
ALTER TABLE `event_image`
  ADD PRIMARY KEY (`event_id`,`img_name`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `precondition`
--
ALTER TABLE `precondition`
  ADD PRIMARY KEY (`attend_event_id`,`picture_path`);

--
-- Indexes for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`email`,`event_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`attend_event_id`,`picture_path`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
