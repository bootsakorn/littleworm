-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:49 PM
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
('nut@mail.com', 'nut', 'Jung', '0909786000', '1996-12-05', 'CS KU', '../img_profile/5aa6ac09675b6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attend_event_schedule`
--

CREATE TABLE `attend_event_schedule` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `join_time` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `attend_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precondition_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `assessment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `max` int(255) NOT NULL,
  `TYPE` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vdo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `organizer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `precondition` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `report_point` int(20) NOT NULL,
  `datetime_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evaluation` text COLLATE utf8_unicode_ci NOT NULL,
  `seat` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `detail`, `place`, `date_start`, `start_time`, `end_time`, `max`, `TYPE`, `vdo`, `organizer_email`, `price`, `precondition`, `report_point`, `datetime_submit`, `evaluation`, `seat`, `status`) VALUES
(86, 'เว็บเทคมหาสนุก', 'นำเสนอโปรเจค วิชา WebTech', '', '2018-03-14', '09:00:00', '11:00:00', 60, 'education', '', 'ton@mail.com', 0, ' ไม่มี ', 0, '2018-03-12 16:38:56', '-', 0, 'coming soon'),
(87, 'run for health', 'วิ่งเพื่อสุขภาพ', '', '2018-03-24', '09:00:00', '17:00:00', 50, 'health', '', 'ton@mail.com', 200, ' ไม่มี ', 0, '2018-03-12 16:41:22', '-', 0, 'coming soon'),
(88, 'GOT7 ทัวร์', 'คอนเสิร์ตสี่ภาค', '', '2018-03-31', '18:00:00', '22:00:00', 3000, 'hobbies', '', 'ton@mail.com', 1500, 'ห้ามเครื่องดื่มเเอลกอฮอล์\r\nกล้องVDO', 0, '2018-03-12 16:46:14', '-', 0, 'coming soon');

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
(86, '5aa6ad2033e27', '../img_event/5aa6ad2033e27.jpg'),
(86, '5aa6ad203c49f', '../img_event/5aa6ad203c49f.png'),
(86, '5aa6ad204d4af', '../img_event/5aa6ad204d4af.jpg'),
(87, '5aa6adb22ce6e', '../img_event/5aa6adb22ce6e.jpg'),
(87, '5aa6adb25247d', '../img_event/5aa6adb25247d.jpg'),
(88, '5aa6aed6cd581', '../img_event/5aa6aed6cd581.jpg'),
(88, '5aa6aed6db1ee', '../img_event/5aa6aed6db1ee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `googlemap`
--

CREATE TABLE `googlemap` (
  `id` int(11) NOT NULL,
  `place_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `place_Location` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `place_Lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `place_Lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `googlemap`
--

INSERT INTO `googlemap` (`id`, `place_Name`, `place_Location`, `place_Lat`, `place_Lng`) VALUES
(86, 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8459143', '100.57119310000007'),
(87, 'สนามอินทรีจันทรสถิตย์', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.847117', '100.56584499999997'),
(88, 'อิมแพ็ค อารีน่า', 'IMPACT Arena Building, Popular Road, Banmai, Pakkred, นนทบุรี 11120 ประเทศไทย', '13.911571', '100.54824600000006');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) NOT NULL,
  `student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image`, `name`, `id`, `student_id`) VALUES
('../image/5a9eb90443f7b.jpg', 'head', 1, '-'),
('../image/5a9ec7813018c.jpg', 'นาย วุฒิเดช เดชมูล', 2, '5810401040'),
('../image/5a9ec7f934bcd.jpg', 'นาย เตชสิทธิ์ อนุเครือ', 3, '5810405002'),
('../image/5a9ec81a516f2.jpg', 'นางสาว บุษกร ประพฤติธรรม', 4, '5810405118'),
('../image/5a9ec8273848c.jpg', 'นาย พศวัต โวศรี', 5, '5810405193'),
('../image/5a9ec8365a372.jpg', 'นางสาว มณีรัตน์ ชัยชนากานต์', 6, '5810405266'),
('../image/5a9ec8427d968.jpg', 'นาย วริทธิ์ จำรูญสวัสดิ์', 7, '5810405321');

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

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`email`, `company_name`, `address`, `phone`, `profile_pic_path`, `website`) VALUES
('ton@mail.com', 'CS30 KU', 'CS SC KU', '0901112223', '../img_profile/5aa6ac460330b.jpg', 'ton.com');

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
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
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
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `position`, `report_point`) VALUES
('admin@mail.com', '$2y$10$RoNb8jo6VnQJfqqz7mNeAuc3IiXDmdfMRAslKF4dm6cu9e7PHtdIW', 'ADMIN', 0),
('nut@mail.com', '$2y$10$2q7TlIgcjIv0OAPYQEBo0.0smvEN7J8TIMkfRtVbOcNIdnJXPJXoS', 'USER', 0),
('ton@mail.com', '$2y$10$QwlvUNYhDVPKAS0QEmttNelPJiC2ovtmGJs8VUJZMAWqrkLLaTFuK', 'ORGANIZER', 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventid` (`eventid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_image`
--
ALTER TABLE `event_image`
  ADD PRIMARY KEY (`event_id`,`image`);

--
-- Indexes for table `googlemap`
--
ALTER TABLE `googlemap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend_event_schedule`
--
ALTER TABLE `attend_event_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `event` (`id`);

--
-- Constraints for table `event_image`
--
ALTER TABLE `event_image`
  ADD CONSTRAINT `event_image_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
