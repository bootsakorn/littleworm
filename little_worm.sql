-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 10:51 AM
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
('bootsakorn.p@ku.th', 'nut', 'jung', '0909786039', '2018-03-18', 'alaskj', 'img_profile/5aa51124542fc.jpg'),
('eiei@gmail.com', 'fefa', 'qwfq', 'qfa', '2018-03-17', 'qwfqwf', ''),
('noeyba@gmail.com', 'fewf', 'fwef', 'wefw', '2018-03-23', 'ewf', ''),
('user@test.com', 'top', 'dskdkdj', '1234567890', '1987-11-14', 'asdfghjkl;', 'img_profile/5aa5048d24738.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attend_event_schedule`
--

CREATE TABLE `attend_event_schedule` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `join_time` datetime(6) NOT NULL,
  `attend_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precondition_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_event_schedule`
--

INSERT INTO `attend_event_schedule` (`id`, `event_id`, `user_email`, `join_time`, `attend_status`, `precondition_status`, `receipt_status`) VALUES
(1, 57, 'noeyba@gmail.com', '2018-03-11 12:17:46.072027', 'no', 'no', 'no'),
(2, 57, 'noeyba@gmail.com', '2018-03-11 12:18:44.348847', 'no', 'no', 'no'),
(3, 57, 'noeyba@gmail.com', '2018-03-11 12:21:54.907554', 'no', 'no', 'no'),
(4, 57, 'noeyba@gmail.com', '2018-03-11 12:22:05.139701', 'no', 'no', 'no'),
(5, 57, 'noeyba@gmail.com', '2018-03-11 12:22:10.217495', 'no', 'no', 'no'),
(6, 57, 'noeyba@gmail.com', '2018-03-11 12:26:54.451332', 'no', 'no', 'no'),
(7, 57, 'noeyba@gmail.com', '2018-03-11 12:26:58.682585', 'no', 'no', 'no');

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `eventid`, `user`, `message`, `datetime`) VALUES
(3, 42, '42', 'qwdqw', '2018-03-11 14:20:50'),
(4, 42, '42', 'wrsg4wh5u5', '2018-03-11 14:21:50'),
(5, 42, '42', 'wrsg4wh5u5', '2018-03-11 14:25:49'),
(6, 42, '42', 'wrsg4wh5u5', '2018-03-11 14:31:31'),
(7, 42, '42', 'wrsg4wh5u5', '2018-03-11 14:32:09'),
(8, 42, '42', 'wrsg4wh5u5', '2018-03-11 14:32:24'),
(22, 45, 'noey@gmail.com', '434y434', '2018-03-11 15:02:07'),
(23, 45, 'noey@gmail.com', '0hkkkkkkkkkk', '2018-03-11 15:02:23'),
(25, 46, 'noey@gmail.com', 'mum7', '2018-03-11 15:05:04'),
(27, 48, 'noey@gmail.com', 'yth56', '2018-03-11 15:09:03'),
(30, 49, 'noey@gmail.com', 'wfdqwfew', '2018-03-11 15:14:41'),
(31, 49, 'noey@gmail.com', 'wfdqwfew', '2018-03-11 15:16:16'),
(32, 49, 'noey@gmail.com', 'wfdqwfew', '2018-03-11 15:17:03'),
(33, 49, 'noey@gmail.com', 'wfdqwfew', '2018-03-11 15:17:19'),
(34, 49, 'noey@gmail.com', 'sawfa', '2018-03-11 15:17:21'),
(35, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:17:26'),
(36, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:18:08'),
(37, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:19:16'),
(38, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:19:43'),
(39, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:20:23'),
(40, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:21:07'),
(41, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:22:06'),
(42, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:23:37'),
(43, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:26:49'),
(44, 49, 'noey@gmail.com', 'aD', '2018-03-11 15:28:05'),
(125, 65, 'noey@gmail.com', 'hello', '2018-03-11 21:44:40'),
(126, 65, 'noey@gmail.com', 'hello', '2018-03-11 21:44:52'),
(127, 65, 'noey@gmail.com', 'hello', '2018-03-11 21:44:58'),
(128, 65, 'noey@gmail.com', 'hello', '2018-03-11 21:45:17'),
(129, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:45:48'),
(130, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:45:57'),
(131, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:03'),
(132, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:04'),
(133, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:04'),
(134, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:05'),
(135, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:06'),
(136, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:06'),
(137, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:07'),
(138, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:08'),
(139, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:08'),
(140, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:09'),
(141, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:09'),
(142, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:09'),
(143, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:09'),
(144, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:09'),
(145, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:11'),
(146, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:12'),
(147, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:12'),
(148, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:13'),
(149, 65, 'noey@gmail.com', 'dd', '2018-03-11 21:46:13'),
(163, 67, 'noey@gmail.com', 'hi', '2018-03-11 21:58:38'),
(164, 67, 'noey@gmail.com', 'gg', '2018-03-11 21:58:47'),
(165, 67, 'noey@gmail.com', 'yy', '2018-03-11 21:58:56'),
(166, 67, 'noey@gmail.com', 'tt', '2018-03-11 21:59:01'),
(167, 67, 'noey@gmail.com', 'it', '2018-03-11 21:59:13'),
(168, 74, 'noey@gmail.com', 'lkjh', '2018-03-12 13:50:31'),
(169, 74, 'noey@gmail.com', ',kjbhvn', '2018-03-12 13:50:45');

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
(25, 'อยากจะบ้า', '545w3', '', '2018-03-03', '02:02:00', '02:03:00', 144, 'education', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 02:13:06', 'wt34t', 0, 'coming soon'),
(26, 'เว็บเทคจ๋าฉันต้องเสร็จ', 'งานนี้ต้องเสร็จ\r\nจะไม่เสร็จมิได้\r\nเข้าใจบ่?', '', '2018-03-13', '00:00:00', '12:59:00', 6, 'mp4', '../vdo_event/5aa4331ad9cbf.mp4', 'noey@gmail.com', 1000, 'ทำ\r\nให้\r\nเสร็จ\r\nก็\r\nพอ\r\nละ\r\nมะ', 0, '2018-03-11 02:33:46', 'ประเมิน', 0, 'coming soon'),
(27, 'อยากจะบ้า', 'nl2br(มีงาน\r\nมา\r\nนะ\r\nจ๊ะ)', '', '2018-03-12', '01:02:00', '03:04:00', 200, 'mp4', '../vdo_event/5aa4357fe9f70.mp4', 'noey@gmail.com', 10, 'nl2br(มมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมมำหกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก', 0, '2018-03-11 02:43:59', 'หหหหหหหหหห', 0, 'coming soon'),
(28, 'dsa', 'r3qrwq', '', '2018-03-10', '03:04:00', '03:04:00', 0, 'mp4', '../vdo_event/5aa452fa88ba6.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 04:49:46', 'qwrq', 0, 'coming soon'),
(29, 'ลองครั้งสุดท้ายจะไปนอนแล้ว', 'ง่วงจังเลย\r\nตอนนี้\r\nก็\r\nจธ\r\nตี\r\n5\r\nแล้ว\r\n55555', '', '2018-03-20', '01:02:00', '03:04:00', 400, 'mp4', '../vdo_event/5aa4549d2f965.mp4', 'noey@gmail.com', 500, 'ทำ\r\nไร\r\nก็\r\nติด\r\nไป\r\nหมด\r\nเห้อ', 0, '2018-03-11 04:56:45', 'ฟหกดเ้่าสวง', 0, 'coming soon'),
(30, 'อยากจะบ้า', '21qewwqr', '', '2018-03-23', '01:02:00', '03:02:00', 144, 'technology', '', 'noey@gmail.com', 10, ' ไม่มี ', 0, '2018-03-11 05:06:20', 'qwrq', 0, 'coming soon'),
(31, 'aaa', 'ijoyh', '', '2018-03-11', '00:00:00', '00:00:00', 144, 'mp4', '../vdo_event/5aa4575984c5d.mp4', 'noey@gmail.com', 10, ' ไม่มี ', 0, '2018-03-11 05:08:25', 'ykyto', 0, 'coming soon'),
(32, 'noey', '242', '', '2018-03-14', '01:02:00', '03:04:00', 144, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 05:11:06', '434', 0, 'coming soon'),
(33, 'ลองครั้งสุดท้ายจะไปนอนแล้ว', 'ไป\r\nนอน\r\nละ\r\nนะ\r\nบายย', '', '2018-03-07', '00:00:00', '01:01:00', 0, 'mp4', '../vdo_event/5aa4589f8f107.mp4', 'noey@gmail.com', 10000, 'พน\r\nเรา\r\nต้อง\r\nตื่น\r\nไป\r\nมอ\r\n10\r\nโมง\r\nแต่\r\nขอ\r\nเลท\r\nหน่อย\r\nละ\r\nกัน', 0, '2018-03-11 05:13:51', 'ฟหกดเ้่าสวง', 0, 'coming soon'),
(34, 'อยากจะบ้า', 'qrwqwt', '', '2018-03-07', '01:02:00', '03:04:00', 3, 'technology', '../vdo_event/5aa4a602626e2.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 10:44:02', 't3qt', 0, 'coming soon'),
(35, 'sadawsf', 'qwarq2r', '', '2018-03-04', '04:03:00', '04:05:00', 0, 'health', '../vdo_event/5aa4ae8169e29.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 11:20:17', 'wqrq', 0, 'coming soon'),
(36, 'the', 'e4twe', '', '2018-03-06', '03:04:00', '05:06:00', 0, 'technology', '../vdo_event/5aa4c65b39b3a.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 13:02:03', 'awetwt', 0, 'coming soon'),
(39, 'reg', 'wet3qt', '', '2018-03-02', '04:05:00', '05:06:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 13:07:20', '23t2', 0, 'coming soon'),
(40, 'qwfqwf', 'fwqfqwf', '', '2018-03-01', '02:03:00', '03:04:00', 0, 'technology', '../vdo_event/5aa4c89c6bc71.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 13:11:40', 'qefq', 0, 'coming soon'),
(42, 'asfasfa', 'qwarqwr', '', '2018-03-05', '03:04:00', '04:05:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 13:27:38', '2r2qr', 0, 'coming soon'),
(45, 'daca', 'dqwd', '', '2018-03-10', '01:02:00', '02:03:00', 0, 'technology', '../vdo_event/5aa4e1d4e91a9.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 14:59:16', 'wqdq', 0, 'coming soon'),
(46, 'wqdqwf', 'r23qt32', '', '2018-03-02', '03:04:00', '05:06:00', 0, 'technology', '../vdo_event/5aa4e31749d63.mp4', 'noey@gmail.com', 0, '3t ไม่มี ', 0, '2018-03-11 15:04:39', 'r135r', 0, 'coming soon'),
(48, 'rjt4wnjr5', 'h347y5', '', '2018-03-04', '04:05:00', '04:05:00', 45, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 15:08:49', '47u4', 0, 'coming soon'),
(49, 'ewfwe', 'qwrqwff', '', '2018-03-30', '03:04:00', '04:05:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 15:11:47', 'wqfq', 0, 'coming soon'),
(50, 'greg', 'wet', '', '2018-03-04', '01:02:00', '03:04:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 15:53:13', '32qr', 0, 'coming soon'),
(53, 'aefwa', 'qwrqr', '', '2018-03-20', '01:02:00', '03:04:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 17:10:00', 'r3qr', 0, 'coming soon'),
(54, 'eqfeq', 'e23r23', '', '2018-03-04', '02:03:00', '04:55:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 17:15:43', '32r2', 0, 'coming soon'),
(55, 'thr', '4e4ry4', '', '2018-03-13', '01:02:00', '03:04:00', 0, 'technology', '../vdo_event/5aa505740b7ec.mp4', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 17:31:16', '34y', 0, 'coming soon'),
(65, 'aa', ',mkljhjg', '', '2018-03-18', '00:02:00', '02:00:00', 0, 'technology', '', 'noey@gmail.com', 11, ' ไม่มี ', 0, '2018-03-11 14:36:51', ';lk,jn', 0, 'coming soon'),
(66, 'bb', '.mknjbhj', '', '2018-03-17', '00:00:00', '01:00:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-11 14:43:52', ';lkj', 0, 'coming soon'),
(67, 'cc', 'rtyuil', 'KU Home Hotel ม.เกษตรศาสตร์ บางเขน', '3333-03-12', '03:33:00', '03:03:00', 456, 'technology', '', 'noey@gmail.com', 123, 'fghj ไม่มี ', 0, '2018-03-11 14:50:22', 'nhkjl;', 0, 'coming soon'),
(68, 'qq', '5tyhbjnk', 'ไอทีสแควร์หลักสี่', '0055-03-03', '03:55:00', '03:55:00', 0, 'technology', '', 'noey@gmail.com', 0, 'ghj ไม่มี ', 0, '2018-03-11 14:58:12', 'bjkm', 0, 'coming soon'),
(69, 'ทดลอง', 'kjhgc', 'KU Avenue', '2018-03-25', '05:11:00', '05:50:00', 20, 'technology', '', 'noey@gmail.com', 1200, ' ไม่มี gg', 0, '2018-03-12 06:19:51', 'sdfrgthyj', 0, 'coming soon'),
(70, 'ไง', 'mkj', 'Kuma Yakiniku Buffet', '2018-03-25', '01:01:00', '01:58:00', 11, 'technology', '', 'noey@gmail.com', 1200, ' ไม่มี ', 0, '2018-03-12 06:23:36', 'lkjb', 0, 'coming soon'),
(71, 'ไงงงง', 'สา้เ', 'สมุทรปราการ', '2018-03-17', '01:01:00', '03:56:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-12 06:26:23', 'ส่้ีา', 0, 'coming soon'),
(72, 'F', ' njbv', 'Lab republic', '2018-03-23', '22:03:00', '22:06:00', 0, 'technology', '', 'noey@gmail.com', 0, ' ไม่มี ', 0, '2018-03-12 06:30:35', 'jjh', 0, 'coming soon'),
(74, 'google', ';lkjkh', '', '2018-03-08', '02:02:00', '02:02:00', 0, 'technology', '', 'noey@gmail.com', 0, ';lkjhg ไม่มี ', 0, '2018-03-12 06:41:44', ';k;ljhjgh', 0, 'coming soon');

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
(32, '5aa457fa7dfc6', '1'),
(65, '5aa540a88b03b', '../img_event/5aa540a88b03b.jpg'),
(66, '5aa5422e46e70', '../img_event/5aa5422e46e70.jpg'),
(66, '5aa5422e52fe0', '../img_event/5aa5422e52fe0.jpg'),
(66, '5aa5422e5f512', '../img_event/5aa5422e5f512.jpg'),
(66, '5aa5422e6cebb', '../img_event/5aa5422e6cebb.jpg'),
(66, '5aa5422e890b8', '../img_event/5aa5422e890b8.jpg'),
(66, '5aa5422e9826c', '../img_event/5aa5422e9826c.jpg'),
(67, '5aa54404ad7a3', '../img_event/5aa54404ad7a3.jpg'),
(68, '5aa61c0755456', '../img_event/5aa61c0755456.jpg'),
(69, '5aa61ce8576e6', '../img_event/5aa61ce8576e6.jpg'),
(70, '5aa61d8ecbe51', '../img_event/5aa61d8ecbe51.jpg'),
(70, '5aa61d8ed60d5', '../img_event/5aa61d8ed60d5.jpg'),
(70, '5aa61d8ee5144', '../img_event/5aa61d8ee5144.jpg'),
(74, '5aa621287fafe', '../img_event/5aa621287fafe.jpg'),
(74, '5aa621288d1f6', '../img_event/5aa621288d1f6.jpg'),
(74, '5aa62128b1ab2', '../img_event/5aa62128b1ab2.jpg');

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
(25, '39/1-2 ถนน สุขุมวิท แขวง คลองเตยเหนือ', '39/1-2 ถนน สุขุมวิท แขวง คลองเตยเหนือ เขต วัฒนา กรุงเทพมหานคร 10110 ประเทศไทย', '13.7450806', '100.55589499999996'),
(26, 'โรงพยาบาลศรีธัญญา', '47 ถนน ติวานนท์ ตำบล ตลาดขวัญ อำเภอเมืองนนทบุรี นนทบุรี 11000 ประเทศไทย', '13.8461693', '100.51687279999999'),
(27, 'สถานีขนส่งผู้โดยสารกรุงเทพฯ (จตุจักร)', '2 ถนน กำแพงเพชร แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.813242', '100.54873199999997'),
(28, 'Fullmoon Terrace & Bar', '39/543 (Plaza Lagoon) ถนนลาดพร้าว-วังหิน แขวงลาดพร้าว เขตลาดพร้าว แขวง ลาดพร้าว เขต ลาดพร้าว กรุงเทพมหานคร 10230 ประเทศไทย', '13.81914', '100.59305100000006'),
(29, 'โรงพยาบาลศรีธัญญา', '47 ถนน ติวานนท์ ตำบล ตลาดขวัญ อำเภอเมืองนนทบุรี นนทบุรี 11000 ประเทศไทย', '13.8461693', '100.51687279999999'),
(30, 'สวนลุมไนท์บาซ่าร์รัชดาภิเษก', '5 ถนน รัชดาภิเษก แขวง จอมพล เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8040668', '100.57452790000002'),
(31, 'ต้นคูณ', '487 ซอย สุขุมวิท 22 สุขุมวิท แขวง คลองเตยเหนือ เขต วัฒนา กรุงเทพมหานคร 10110 ประเทศไทย', '13.7235573', '100.56483330000003'),
(32, 'ศูนย์ประชุมแห่งชาติสิริกิติ์', 'ศูนย์ประชุมแห่งชาติสิริกิติ์ 60 ถนน รัชดาภิเษก แขวง คลองเตย เขต คลองเตย กรุงเทพมหานคร 10110 ประเทศไทย', '13.7243387', '100.55861989999994'),
(33, 'TOO FAST TO SLEEP @KU', 'แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.854009', '100.57891259999997'),
(34, 'เชียงใหม่', 'เชียงใหม่ แขวง สมเด็จเจ้าพระยา เขต คลองสาน กรุงเทพมหานคร 10600 ประเทศไทย', '13.7347875', '100.4996433'),
(35, 'แขวง วงศ์สว่าง', 'แขวง วงศ์สว่าง เขต บางซื่อ กรุงเทพมหานคร 10800 ประเทศไทย', '13.8291554', '100.52679910000006'),
(36, 'ประเทศไทย', 'ประเทศไทย', '15.870032', '100.99254100000007'),
(37, 'เจ้เล้ง พลาซ่า', 'ซอย เจ้เล้ง พลาซ่า R15 ถนน วิภาวดีรังสิต แขวง ดอนเมือง เขต ดอนเมือง กรุงเทพมหานคร 10210 ประเทศไทย', '13.89719', '100.58969839999997'),
(38, '', '', '', ''),
(39, '4th floor drip bar', '61 ซอย สุขุมวิท 26 แขวง คลองตัน เขต คลองเตย กรุงเทพมหานคร 10110 ประเทศไทย', '13.7255637', '100.56938809999997'),
(40, 'สถานีขนส่งเอกมัย E30 ถนน สุขุมวิท แขวง พระโขนง', 'สถานีขนส่งเอกมัย E30 ถนน สุขุมวิท แขวง พระโขนง เขต คลองเตย กรุงเทพมหานคร 10110 ประเทศไทย', '13.7187345', '100.58398499999998'),
(41, 'ถนนรัชดาภิเษก', 'ถนนรัชดาภิเษก แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8303189', '100.54407650000007'),
(42, '43/576 ถนน พหลโยธิน แขวง อนุสาวรีย์', '43/576 ถนน พหลโยธิน แขวง อนุสาวรีย์ เขต บางเขน กรุงเทพมหานคร 10220 ประเทศไทย', '13.8752315', '100.59868329999995'),
(43, '91 ถนน พหลโยธิน แขวง ลาดยาว', '91 ถนน พหลโยธิน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.829447', '100.5658889'),
(44, 'ยูเนี่ยน มอลล์ Union Mall', '54 ซอย สังขะวัฒนะ 1 แขวง จอมพล เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.812711', '100.562365'),
(45, 'ยูเนี่ยน มอลล์ Union Mall', '54 ซอย สังขะวัฒนะ 1 แขวง จอมพล เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.812711', '100.562365'),
(46, 'แขวง วงศ์สว่าง', 'แขวง วงศ์สว่าง เขต บางซื่อ กรุงเทพมหานคร 10800 ประเทศไทย', '13.8291554', '100.52679910000006'),
(47, '62 ถนน พหลโยธิน แขวง ลาดยาว', '62 ถนน พหลโยธิน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8498343', '100.58105620000003'),
(48, 'Ewawon ร้านอาหารเกาหลี', '31/5 ซอย นาคนิวาส 16 แขวง ลาดพร้าว เขต ลาดพร้าว กรุงเทพมหานคร 10230 ประเทศไทย', '13.807432', '100.61390870000002'),
(49, '27 ถนน สุขุมวิท แขวง คลองเตยเหนือ', '27 ถนน สุขุมวิท แขวง คลองเตยเหนือ เขต วัฒนา กรุงเทพมหานคร 10110 ประเทศไทย', '13.7451648', '100.55289879999998'),
(50, 'เจ้เล้ง พลาซ่า', 'ซอย เจ้เล้ง พลาซ่า R15 ถนน วิภาวดีรังสิต แขวง ดอนเมือง เขต ดอนเมือง กรุงเทพมหานคร 10210 ประเทศไทย', '13.89719', '100.58969839999997'),
(51, '62 ถนน พหลโยธิน แขวง ลาดยาว', '62 ถนน พหลโยธิน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8498343', '100.58105620000003'),
(52, 'จตุจักร กรีน', 'เลขที่ 1 ถนนกำแพงเพชร 3, แขวงจตุจักร, แขวง จตุจักร เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.805193', '100.55189399999995'),
(53, 'เมืองพัทยา', 'เมืองพัทยา อำเภอ บางละมุง ชลบุรี 20150 ประเทศไทย', '12.9235557', '100.88245510000002'),
(54, '39/1-2 ถนน สุขุมวิท แขวง คลองเตยเหนือ', '39/1-2 ถนน สุขุมวิท แขวง คลองเตยเหนือ เขต วัฒนา กรุงเทพมหานคร 10110 ประเทศไทย', '13.7450806', '100.55589499999996'),
(55, 'เขต ยานนาวา', 'เขต ยานนาวา กรุงเทพมหานคร ประเทศไทย', '13.6830212', '100.53523670000004'),
(56, 'สถานีขนส่งเอกมัย E30 ถนน สุขุมวิท แขวง พระโขนง', 'สถานีขนส่งเอกมัย E30 ถนน สุขุมวิท แขวง พระโขนง เขต คลองเตย กรุงเทพมหานคร 10110 ประเทศไทย', '13.7187345', '100.58398499999998'),
(57, 'ตลาดบองมาร์เช่ A216 ถนน เทศบาลสงเคราะห์ แขวง ลาดยาว', 'ตลาดบองมาร์เช่ A216 ถนน เทศบาลสงเคราะห์ แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.839104', '100.55120740000007'),
(62, 'ประเทศไทย', 'ประเทศไทย', '15.870032', '100.99254100000007'),
(63, 'มหาวิทยาลัยเกษตรศาสตร์', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8470283', '100.57180010000002'),
(64, 'ถนนรัชดาภิเษก', 'ถนนรัชดาภิเษก แขวง ดินแดง เขต ดินแดง กรุงเทพมหานคร ประเทศไทย', '13.7784289', '100.57352749999995'),
(65, 'Jazzลาดปลาเค้า', 'ถนนลาดปลาเค้า แขวง อนุสาวรีย์ เขต บางเขน กรุงเทพมหานคร 10220 ประเทศไทย', '13.8617059', '100.61279519999994'),
(66, 'KU Home Hotel ม.เกษตรศาสตร์ บางเขน', 'ซอย งามวงศ์วาน 50 แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8452022', '100.56763769999998'),
(67, 'ไอทีสแควร์หลักสี่', 'ถนน แจ้งวัฒนะ แขวง ตลาดบางเขน เขต หลักสี่ กรุงเทพมหานคร 10210 ประเทศไทย', '13.8860436', '100.58103319999998'),
(68, 'KU Avenue', '50 ซอย จักรพันธุ์ แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8460159', '100.5651282'),
(69, 'Kuma Yakiniku Buffet', 'ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8397135', '100.57367390000002'),
(70, 'สมุทรปราการ', 'สมุทรปราการ ประเทศไทย', '13.5990961', '100.59983190000003'),
(72, 'Lab republic', '71 ซอย อมรพันธ์ แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8396275', '100.57333010000002'),
(73, 'KKP Tower', '209, 209/ อโศก แขวง คลองเตย เหนือ เขต วัฒนา, ซอย สุขุมวิท 21 แขวง คลองเตยเหนือ เขต วัฒนา กรุงเทพมหานคร 10110 ประเทศไทย', '13.7450324', '100.5623349'),
(74, 'Lab republic', '71 ซอย อมรพันธ์ แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8396275', '100.57333010000002');

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
('hot@mail.com', 'hot', 'office', '1234567890', 'img_profile/5aa505399d0a6.jpg', 'hott.com'),
('noey@gmail.com', 'noey company', '5', '0944942482', '-', '-');

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
-- Table structure for table `t`
--

CREATE TABLE `t` (
  `a` int(11) NOT NULL,
  `b` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t`
--

INSERT INTO `t` (`a`, `b`) VALUES
(1, 'image/5aa00c32bcdde.jpg'),
(2, 'image/5aa00d5fe899a.jpg'),
(3, 'image/5aa00e1faf33d.jpg'),
(4, 'image/5aa00f111d18d.jpg'),
(5, 'image/5aa00f30d9707.jpg'),
(6, 'image/5aa00fa43dd1c.jpg'),
(7, 'image/5aa011521e196.jpg'),
(8, 'image/5aa01181caafa.jpg'),
(9, 'image/5aa0119cd12c1.jpg'),
(10, 'image/5aa011f3412af.jpg'),
(11, 'image/5aa0121563405.jpg'),
(12, 'image/5aa0123d670ab.jpg'),
(13, 'image/5aa0127048f9a.jpg'),
(14, 'image/5aa012ab48dcf.jpg'),
(15, 'image/5aa012c34b81a.jpg'),
(16, 'image/5aa012fc3a316.jpg'),
(17, 'image/5aa025421383f.jpg'),
(18, 'image/5aa20f66d20d6.3gp'),
(19, 'image/5aa20f9e979cb.3gp'),
(20, 'image/5aa218cef03fe.mp4'),
(21, 'image/5aa218f1037ac.mp4'),
(22, 'image/5aa21934a0598.mp4'),
(23, 'image/5aa21a8c9941b.mp4'),
(24, 'image/5aa21b07f1cf7.mp4'),
(25, 'image/5aa21b14e4d41.mp4'),
(26, 'image/5aa21b2b1b9b5.mp4'),
(27, 'image/5aa21b3798e51.mp4'),
(28, 'image/5aa21b6a5ef33.mp4'),
(29, 'image/5aa21bced907b.mp4'),
(30, 'image/5aa21c79cfb8b.mp4'),
(31, 'image/5aa21c8209b27.mp4'),
(32, 'image/5aa21cd0b8340.mp4'),
(33, 'image/5aa21d6d98d0b.mp4'),
(34, 'image/5aa21d9b4af84.mp4'),
(35, 'image/5aa2272fd1f86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tt`
--

CREATE TABLE `tt` (
  `id` int(11) NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `la` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `lo` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tt`
--

INSERT INTO `tt` (`id`, `address`, `name`, `la`, `lo`) VALUES
(3, 'เขต จตุจักร', 'เขต จตุจักร กรุงเทพมหานคร ประเทศไทย', '13.8361545', '100.56336759999999'),
(4, 'มหาวิทยาลัยเกษตรศาสตร์', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8470283', '100.57180010000002'),
(5, '991/1 ถนนพระราม 1 แขวงปทุมวัน เขต ปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', 'สยามพารากอน', '13.7467177', '100.53501660000006'),
(6, '66 พระราม 9 ซอย 8 กรุงเทพมหานคร จังหวัด กรุงเทพมหานคร 10310 ประเทศไทย', 'รูท 66', '13.7515594', '100.57524269999999'),
(7, '', '', '', ''),
(8, 'เขต ลาดพร้าว กรุงเทพมหานคร จังหวัด กรุงเทพมหานคร 10230 ประเทศไทย', 'เอื้อประชา คอนโดทาวน์', '13.8202304', '100.61754289999999'),
(9, '167 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', 'JLS โรงเรียนสอนภาษาญี่ปุ่นเกษตร', '13.8406966', '100.57337749999999'),
(10, 'ตำบล บางกระทึก อำเภอ สามพราน นครปฐม 73210 ประเทศไทย', 'ตลาดน้ำดอนหวาย', '13.7705227', '100.28386139999998'),
(11, 'เขต จตุจักร กรุงเทพมหานคร จังหวัด กรุงเทพมหานคร 10900 ประเทศไทย', 'เกษตร สตูดิโอ', '13.8379764', '100.5747877'),
(12, '92 ถนน ประเสริฐมนูกิจ แขวง จรเข้บัว เขต ลาดพร้าว กรุงเทพมหานคร 10230 ประเทศไทย', 'ร้านอาหาร บ้านฉลอง', '13.841559', '100.59226999999998'),
(13, 'ซอย สายนํ้าผึ้ง แขวง คลองถนน เขต สายไหม กรุงเทพมหานคร 10220 ประเทศไทย', 'ซอย สายนํ้าผึ้ง', '13.8858684', '100.61927790000004');

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
('eiei@gmail.com', '32eqfe', 'USER', 1),
('hot@mail.com', '$2y$10$MiDzqiy.fc9qsSvDkVKUXePvQExxPpgK0a6FjNB59E3ggf1jQhvXC', 'ORGANIZER', 0),
('noey@gmail.com', 'r34t34', 'ORGANIZER', 1),
('noeyba@gmail.com', 'fewfwef', 'USER', 1),
('user@test.com', '$2y$10$cum/EyUkMe1DGGN0pffDLeRLISpHF9nYEu11toHx.LcSKAYqJjaXi', 'USER', 0);

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
-- Indexes for table `t`
--
ALTER TABLE `t`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `tt`
--
ALTER TABLE `tt`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
