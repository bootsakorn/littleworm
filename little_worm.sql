-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 03:06 PM
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
('aif@mail.com', 'พศวัต', 'โวศรี', '0987654321', '1997-08-12', 'จ.นครราชศรีมา ประเทศไทย', '../img_profile/5aa7a60edc3b3.jpg'),
('nut@mail.com', 'nut', 'Jung', '0909786000', '1996-12-05', 'CS KU', '../img_profile/5aa6ac09675b6.jpg'),
('ton@mail.com', 'Vudhidej', 'Dejmol', '0812345678', '1997-01-01', 'จ.เชียงใหม่', '../img_profile/5aa7a5121d326.jpg'),
('toto@mail.com', 'เตชสิทธิ์', 'อนุเครือ', '0912345678', '1996-01-05', 'อ.บ้านโปร่ง จ.ราชบุรี', '../img_profile/5aa7a59b89e3d.jpg');

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

--
-- Dumping data for table `attend_event_schedule`
--

INSERT INTO `attend_event_schedule` (`id`, `event_id`, `user_email`, `join_time`, `attend_status`, `precondition_status`, `receipt_status`, `assessment_status`) VALUES
(4, 110, 'nut@mail.com', '2018-03-13 12:45:08.639508', 'no', 'ผ่าน', 'ชำระแล้ว', ''),
(5, 130, 'nut@mail.com', '2018-03-13 12:45:22.362533', 'no', 'ผ่าน', 'ชำระแล้ว', ''),
(6, 118, 'nut@mail.com', '2018-03-13 12:45:33.464442', 'no', 'ผ่าน', 'ชำระแล้ว', ''),
(7, 132, 'nut@mail.com', '2018-03-13 12:45:38.818618', 'no', 'no', 'no', ''),
(8, 127, 'nut@mail.com', '2018-03-13 12:45:44.326973', 'no', 'no', 'no', ''),
(9, 112, 'ton@mail.com', '2018-03-13 12:54:45.401048', 'no', 'no', 'no', ''),
(10, 115, 'ton@mail.com', '2018-03-13 12:54:52.936046', 'no', 'no', 'no', ''),
(11, 120, 'ton@mail.com', '2018-03-13 12:55:00.217983', 'no', 'no', 'no', ''),
(12, 134, 'ton@mail.com', '2018-03-13 12:55:05.275781', 'no', 'no', 'no', ''),
(13, 128, 'ton@mail.com', '2018-03-13 12:55:11.540479', 'no', 'no', 'no', ''),
(14, 121, 'aif@mail.com', '2018-03-13 12:59:54.125725', 'no', 'no', 'no', ''),
(15, 110, 'aif@mail.com', '2018-03-13 13:05:01.770643', 'no', 'no', 'no', ''),
(16, 132, 'aif@mail.com', '2018-03-13 13:05:07.019024', 'no', 'no', 'no', ''),
(17, 125, 'aif@mail.com', '2018-03-13 13:05:13.937503', 'no', 'no', 'no', ''),
(18, 124, 'aif@mail.com', '2018-03-13 13:05:28.178711', 'no', 'no', 'no', ''),
(19, 128, 'aif@mail.com', '2018-03-13 13:05:41.858908', 'no', 'no', 'no', '');

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
(110, 'Mobile Expo', 'ก้าวเข้าสู่ปีที่ 12 แล้วกับงาน Thailand Mobile Expo มหกรรมโทรศัพท์มือถือที่ใหญ่ที่สุดในประเทศ ที่สร้างกระแสเทคโนโลยีใหม่ๆในประเทศไทยมาอย่างต่อเนื่อง แ', 'ศูนย์สิริกิติ์บรมราชินีนาถ', '2018-03-15', '09:00:00', '22:00:00', 1000, 'technology', '', 'bond@mail.com', 0, ' ไม่มี ', 0, '2018-03-13 10:25:01', '-', 2, 'coming soon'),
(111, 'อบรมการใช้ iPad', 'หากคุณเป็นผู้ที่ใช้งาน iPhone หรือ iPad อยู่แล้วอยากจะใช้งาน iPhone หรือ iPad ให้คุ้มค่ามากกว่าการใช้งานปัจจุบัน ใช้งานให้เสมือนเป็นคอมพิวเตอร์พกพาและ', 'สำนักหอสมุด มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '2018-03-31', '09:30:00', '16:30:00', 30, 'technology', '', 'bond@mail.com', 200, ' ไม่มี ', 0, '2018-03-13 10:29:01', '-', 0, 'coming soon'),
(112, 'รู้จัก Bitcoin', 'วิธีง่ายๆ ในการเริ่มต้นกับ Bitcoin คือ ดาวน์โหลดโปรแกรมชื่อ Bitcoin wallet ซื่งคือโปรแกรมที่จะช่วยให้คุณส่ง และรับเงินของคุณ สำหรับผู้เริ่มต้น ', 'โรงแรมรามาการ์เด้นส์ กรุงเทพ', '2018-03-15', '10:00:00', '18:00:00', 30, 'technology', '', 'bond@mail.com', 500, ' ไม่มี ', 0, '2018-03-13 10:35:49', '-', 1, 'coming soon'),
(113, 'เปิดตัวหุ่นยนต์', 'เปิดตัวหุ่นยนต์ตัวใหม่ล่าสุด ล้ำสุด เก่งสุด ฉลาดสุด', 'ศูนย์สิริกิติ์บรมราชินีนาถ', '2018-04-20', '09:00:00', '16:00:00', 300, 'technology', '', 'bond@mail.com', 0, ' ไม่มี ', 0, '2018-03-13 10:38:59', '-', 0, 'coming soon'),
(114, 'สอนใช้คอมพิวเตอร์', 'สอนใช้งานคอมพิวเตอร์เบื้องต้นสำหรับผู้เริ่มต้น', 'สำนักบริการคอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '2018-06-20', '08:00:00', '18:00:00', 20, 'technology', '', 'bond@mail.com', 500, ' ไม่มี ', 0, '2018-03-13 10:42:17', '-', 0, 'coming soon'),
(115, 'เรียนภาษาอังกฤษ', 'เรียนภาษาอังกฤษกับเจ้าของภาษาที่เชี่ยวชาญในการสอนเป็นอย่างดี', 'ศูนย์ภาษา3 ม.เกษตร', '2018-04-05', '09:00:00', '17:00:00', 40, 'education', '', 'bond@mail.com', 100, ' ไม่มี ', 0, '2018-03-13 10:44:43', '-', 1, 'coming soon'),
(116, 'เรียนภาษาญี่ปุ่น', 'เรียนภาษาญี่ปุ่นเบื้องต้นกับผู้เชี่ยวชาญ', 'ศูนย์ภาษา3 ม.เกษตร', '2018-05-10', '09:00:00', '19:00:00', 20, 'education', '', 'bond@mail.com', 300, ' ไม่มี ', 0, '2018-03-13 10:46:59', '-', 0, 'coming soon'),
(117, 'OS มหาสนุก', 'มาเรียนOSให้สนุกกันเถอะ', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', '2018-03-13', '14:30:00', '16:30:00', 50, 'education', '', 'bond@mail.com', 50, ' ไม่มี ', 0, '2018-03-13 10:49:59', '-', 0, 'coming soon'),
(118, 'webtech มหาสนุก', 'มาเขียนว็บกันเถอะ', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', '2018-04-12', '10:00:00', '12:00:00', 60, 'education', '', 'bond@mail.com', 50, ' ไม่มี ', 0, '2018-03-13 10:51:29', '-', 1, 'coming soon'),
(119, 'Python Ezy', 'มาเขียนโปรเเกรมด้วยภาษา Python กันเถอะ', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', '2018-05-12', '16:00:00', '18:00:00', 10, 'education', '', 'bond@mail.com', 200, ' ไม่มี ', 0, '2018-03-13 10:54:19', '-', 0, 'coming soon'),
(120, 'วิเคราะห์ตลาดหุ้น', 'วิเคราะห์ตลาดหุ้นไปพร้อมกันจากเริ่มต้น', 'Maruay Garden Hotel', '2018-07-13', '09:00:00', '18:00:00', 20, 'financial', '', 'bond@mail.com', 200, ' ไม่มี ', 0, '2018-03-13 10:58:35', '-', 1, 'coming soon'),
(121, 'แข่งขันการบริหารการเงิน', 'แข่งขันหาผู้เก่งกาจในการบริหารการเงินได้ดีเยี่ยมที่สุด', 'สำนักบริการคอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '2018-04-29', '10:00:00', '13:00:00', 30, 'technology', '', 'bond@mail.com', 100, 'อายุ 18 ปีขึ้นไป', 0, '2018-03-13 11:01:04', '-', 1, 'coming soon'),
(122, 'วิ่งมาราธอน', 'มาวิ่งไปพร้อมๆกัน', 'เทศบาลนครพระนครศรีอยุธยา', '2018-09-14', '05:00:00', '20:00:00', 100, 'health', '', 'bond@mail.com', 300, ' ไม่มี ', 0, '2018-03-13 11:03:02', '-', 0, 'coming soon'),
(123, 'วิ่งเพื่อการกุศล', 'มาร่วมกันวิ่งเพื่อนำเงินไปช่วยการกุศลกันเถอะ', 'ชุมชนก้าวหน้า', '2018-04-19', '05:00:00', '18:00:00', 30, 'health', '', 'bond@mail.com', 400, 'ไม่มีโรคประจำตัว\r\nอายุ 15 ปีขึ้นไป', 0, '2018-03-13 11:09:49', '-', 0, 'coming soon'),
(124, 'บริจาคเลือด', 'บริจาคเลือดกับสภากาชาดไทยในวันนี้อิ่มใจยังวันหน้า', 'สภากาชาดไทย ศูนย์เทคโนโลยีสารสนเทศ', '2018-06-14', '09:00:00', '16:00:00', 100, 'social', '', 'bond@mail.com', 0, 'น้ำหนัก 45 กิโลกรัมขึ้นไป\r\nพักผ่อนเพียงพอ', 0, '2018-03-13 11:11:59', '-', 1, 'coming soon'),
(125, 'ตรวจสุขภาพ', 'ตรวจสุขภาพประจำปี', 'สถานพยาบาล มหาวิทยาลัยเกษตรศาสตร์', '2018-06-09', '09:00:00', '17:00:00', 50, 'health', '', 'bond@mail.com', 50, ' ไม่มี ', 0, '2018-03-13 11:17:22', '-', 1, 'coming soon'),
(126, 'ปีนเขา', 'มาปีนเขากับพวกเรา งานนี้ไม่มีเขาไม่ได้เเล้วจ้าาา', 'Khao Sam Muk', '2018-12-16', '05:00:00', '19:00:00', 10, 'hobbies', '', 'bond@mail.com', 1000, 'ไม่มีโรคประจำตัว\r\nมีประสบการณ์การปีนเขา', 0, '2018-03-13 11:22:38', '-', 0, 'coming soon'),
(127, 'ปั่นจักรยานเสือภูเขา', 'มาร่วมสนุกกับพวกเราชาวเสือภูเขา เปิดโลกกว้างกันเถอะ', 'ถนน รังสิต-ปทุมธานี', '2018-08-26', '06:00:00', '18:00:00', 20, 'hobbies', '', 'bond@mail.com', 500, ' ไม่มี ', 0, '2018-03-13 11:24:56', '-', 1, 'coming soon'),
(128, 'คอนเสิร์ต GOT7', 'คอนทัวร์4ภาค ของหนุ่มๆ GOT7 แฟนๆห้ามพลาด', 'อิมแพ็ค อารีน่า', '2018-09-13', '17:00:00', '22:00:00', 1000, 'hobbies', '', 'noey@mail.com', 1500, ' ไม่มี ', 0, '2018-03-13 11:28:05', '-', 2, 'coming soon'),
(129, 'คอนเสิร์ต SEVENTEEN', 'ชาวกระรัตห้ามพลาด หนุ่มๆทั้ง13คนจะมาเเล้วจ้าาา', 'อิมแพ็ค อารีน่า', '2018-10-13', '19:00:00', '00:00:00', 1000, 'hobbies', '', 'noey@mail.com', 1500, ' ไม่มี ', 0, '2018-03-13 11:30:00', '-', 0, 'coming soon'),
(130, 'JAVA มหาสนุก', 'มาเรียนจาวากันเถอะจ้า', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', '2018-11-16', '10:00:00', '18:00:00', 50, 'technology', '', 'noey@mail.com', 200, ' ไม่มี ', 0, '2018-03-13 11:33:43', '-', 1, 'coming soon'),
(131, 'Cal หรรษา', 'แคล1 แคล2 แคล3 ก็ไม่ใช่เรื่องยากอีกต่อไป', 'ศูนย์เรียนรวม 1', '2018-07-13', '08:00:00', '12:00:00', 20, 'education', '', 'noey@mail.com', 100, ' ไม่มี ', 0, '2018-03-13 11:35:55', '-', 0, 'coming soon'),
(132, 'หุ้นเรื่องจิ๊บๆ', 'มาเริ่มต้นตั้งเเต่วันนี้เพื่อนเงินก้อนโตในวันหน้า', 'คณะบริหารธุรกิจ มหาวิทยาลัยศรีปทุม SPU', '2018-06-14', '10:00:00', '18:00:00', 30, 'financial', '', 'noey@mail.com', 300, ' ไม่มี ', 0, '2018-03-13 11:38:40', '-', 2, 'coming soon'),
(133, 'โยคะมหาสนุก', 'โยคะเรื่องง่ายๆ สุขภาพดีอีกด้วย', '', '2018-06-22', '17:00:00', '19:00:00', 20, 'health', '', 'noey@mail.com', 100, ' ไม่มี ', 0, '2018-03-13 11:41:43', '-', 0, 'coming soon'),
(134, 'ถางหญ้าเพื่อสวนสวย', 'มาร่วมกันถางหญ้าเพื่อสวนสนุกน้องๆในชุมชนเพื่อความสะอาดเเละปลอดภัยของเด็กๆกันเถอะ', 'ชุมชนประชานิเวศน์ 3', '2018-04-14', '07:00:00', '13:00:00', 50, 'social', '', 'noey@mail.com', 100, ' ไม่มี ', 0, '2018-03-13 11:43:56', '-', 1, 'coming soon'),
(135, 'คอนเสิร์ต GOT7 v2', 'หนุ่นๆ GOT7 รอคุณอยู่!', 'อิมแพ็ค อารีน่า', '2019-11-04', '18:00:00', '00:00:00', 1000, 'hobbies', '../vdo_event/5aa7cf9f58d97.mp4', 'noey@mail.com', 2000, ' ไม่มี ', 0, '2018-03-13 13:18:23', '-', 0, 'coming soon');

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
(110, '5aa7a6fdc30c2', '../img_event/5aa7a6fdc30c2.jpg'),
(110, '5aa7a6fdd2743', '../img_event/5aa7a6fdd2743.jpg'),
(110, '5aa7a6fddffa1', '../img_event/5aa7a6fddffa1.jpg'),
(111, '5aa7a7ede4c7b', '../img_event/5aa7a7ede4c7b.jpg'),
(111, '5aa7a7ee08eb0', '../img_event/5aa7a7ee08eb0.jpg'),
(112, '5aa7a985a5841', '../img_event/5aa7a985a5841.png'),
(112, '5aa7a985c5e19', '../img_event/5aa7a985c5e19.jpg'),
(112, '5aa7a985ebb94', '../img_event/5aa7a985ebb94.jpg'),
(113, '5aa7aa43a8cd7', '../img_event/5aa7aa43a8cd7.jpg'),
(113, '5aa7aa43c9e7c', '../img_event/5aa7aa43c9e7c.jpg'),
(114, '5aa7ab09af444', '../img_event/5aa7ab09af444.png'),
(114, '5aa7ab09d1735', '../img_event/5aa7ab09d1735.jpg'),
(115, '5aa7ab9b7dd25', '../img_event/5aa7ab9b7dd25.png'),
(115, '5aa7ab9ba4194', '../img_event/5aa7ab9ba4194.jpg'),
(116, '5aa7ac2331473', '../img_event/5aa7ac2331473.jpg'),
(116, '5aa7ac235453e', '../img_event/5aa7ac235453e.jpg'),
(117, '5aa7acd807529', '../img_event/5aa7acd807529.jpg'),
(118, '5aa7ad3125b99', '../img_event/5aa7ad3125b99.jpg'),
(118, '5aa7ad3146104', '../img_event/5aa7ad3146104.png'),
(118, '5aa7ad314db13', '../img_event/5aa7ad314db13.jpg'),
(119, '5aa7addb33a76', '../img_event/5aa7addb33a76.png'),
(119, '5aa7addb41176', '../img_event/5aa7addb41176.jpg'),
(120, '5aa7aedbaba4f', '../img_event/5aa7aedbaba4f.jpg'),
(121, '5aa7af707371b', '../img_event/5aa7af707371b.jpg'),
(121, '5aa7af707afd2', '../img_event/5aa7af707afd2.jpg'),
(121, '5aa7af7088eb0', '../img_event/5aa7af7088eb0.jpg'),
(122, '5aa7afe6aae7a', '../img_event/5aa7afe6aae7a.jpg'),
(122, '5aa7afe6cb476', '../img_event/5aa7afe6cb476.jpg'),
(123, '5aa7b17d33b8d', '../img_event/5aa7b17d33b8d.jpg'),
(123, '5aa7b17d3b3f5', '../img_event/5aa7b17d3b3f5.jpg'),
(124, '5aa7b1ff5b944', '../img_event/5aa7b1ff5b944.jpg'),
(124, '5aa7b1ff78a40', '../img_event/5aa7b1ff78a40.jpg'),
(125, '5aa7b342630de', '../img_event/5aa7b342630de.jpg'),
(126, '5aa7b47ecab19', '../img_event/5aa7b47ecab19.jpg'),
(126, '5aa7b47ee857b', '../img_event/5aa7b47ee857b.jpg'),
(126, '5aa7b47f278ea', '../img_event/5aa7b47f278ea.jpg'),
(127, '5aa7b50822bd2', '../img_event/5aa7b50822bd2.jpg'),
(127, '5aa7b5082a43c', '../img_event/5aa7b5082a43c.jpg'),
(127, '5aa7b50832e25', '../img_event/5aa7b50832e25.jpg'),
(128, '5aa7b5c5efa51', '../img_event/5aa7b5c5efa51.jpg'),
(128, '5aa7b5c6166f8', '../img_event/5aa7b5c6166f8.jpg'),
(129, '5aa7b638b85eb', '../img_event/5aa7b638b85eb.jpg'),
(129, '5aa7b638c5302', '../img_event/5aa7b638c5302.jpg'),
(130, '5aa7b71735e81', '../img_event/5aa7b71735e81.png'),
(130, '5aa7b7174cf9d', '../img_event/5aa7b7174cf9d.jpg'),
(131, '5aa7b79b65618', '../img_event/5aa7b79b65618.jpg'),
(131, '5aa7b79b6ceca', '../img_event/5aa7b79b6ceca.jpg'),
(132, '5aa7b8410ae39', '../img_event/5aa7b8410ae39.jpg'),
(132, '5aa7b841287c6', '../img_event/5aa7b841287c6.jpg'),
(132, '5aa7b8413016d', '../img_event/5aa7b8413016d.jpg'),
(133, '5aa7b8f743ff4', '../img_event/5aa7b8f743ff4.jpg'),
(133, '5aa7b8f74b6fc', '../img_event/5aa7b8f74b6fc.jpg'),
(134, '5aa7b97c424ee', '../img_event/5aa7b97c424ee.jpg'),
(134, '5aa7b97c5afb9', '../img_event/5aa7b97c5afb9.jpg'),
(135, '5aa7cf9f71418', '../img_event/5aa7cf9f71418.jpg'),
(135, '5aa7cf9f88ea2', '../img_event/5aa7cf9f88ea2.jpg');

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
(110, 'ศูนย์สิริกิติ์บรมราชินีนาถ', '1873 ถนน อังรีดูนังต์ แขวง ปทุมวัน เขต ปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', '13.7322312', '100.53512339999997'),
(111, 'สำนักหอสมุด มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8477017', '100.57183850000001'),
(112, 'โรงแรมรามาการ์เด้นส์ กรุงเทพ', '9/9 ถนน วิภาวดีรังสิต แขวง ตลาดบางเขน เขต หลักสี่ กรุงเทพมหานคร 10210 ประเทศไทย', '13.8634076', '100.57061190000002'),
(113, 'ศูนย์สิริกิติ์บรมราชินีนาถ', '1873 ถนน อังรีดูนังต์ แขวง ปทุมวัน เขต ปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', '13.7322312', '100.53512339999997'),
(114, 'สำนักบริการคอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.844606', '100.56752129999995'),
(115, 'ศูนย์ภาษา3 ม.เกษตร', '50 ซอย ชูชาติกำภู แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8494916', '100.56904080000004'),
(116, 'ศูนย์ภาษา3 ม.เกษตร', '50 ซอย ชูชาติกำภู แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8494916', '100.56904080000004'),
(117, 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8459143', '100.57119310000007'),
(118, 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8459143', '100.57119310000007'),
(119, 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8459143', '100.57119310000007'),
(120, 'Maruay Garden Hotel', '1 ถนน พหลโยธิน แขวง เสนานิคม เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.845215', '100.57995200000005'),
(121, 'สำนักบริการคอมพิวเตอร์ มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.844606', '100.56752129999995'),
(122, 'เทศบาลนครพระนครศรีอยุธยา', 'เทศบาลนครพระนครศรีอยุธยา อำเภอ พระนครศรีอยุธยา พระนครศรีอยุธยา ประเทศไทย', '14.3692325', '100.5876634'),
(123, 'ชุมชนก้าวหน้า', '283/1 หมู่4 บ้านชุมชนก้าวหน้า, ถนนแจ้งวัฒนะ, แขวงตลาดบางเขน เขตหลักสี่ กรุงเทพมหานคร, 10210 แขวง ทุ่งสองห้อง เขต หลักสี่ กรุงเทพมหานคร 10210 ประเทศไทย', '13.891619', '100.56315799999993'),
(124, 'สภากาชาดไทย ศูนย์เทคโนโลยีสารสนเทศ', '1871 อาคารเทิดพระเกียรติฯ ชั้น 10, ถนนอังรีดูนังต์, แขวง ปทุมวัน เขต ปทุมวัน กรุงเทพมหานคร 10330 ประเทศไทย', '13.732068', '100.53321099999994'),
(125, 'สถานพยาบาล มหาวิทยาลัยเกษตรศาสตร์', '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8467123', '100.56824740000002'),
(126, 'Khao Sam Muk', 'Khao Sam Muk ตำบลแสนสุข อำเภอเมืองชลบุรี ชลบุรี 20130 ประเทศไทย', '13.31', '100.90444439999999'),
(127, 'ถนน รังสิต-ปทุมธานี', 'ถนน รังสิต-ปทุมธานี ตำบล บางปรอก อำเภอเมืองปทุมธานี ปทุมธานี 12000 ประเทศไทย', '14.0298462', '100.53218909999998'),
(128, 'อิมแพ็ค อารีน่า', 'IMPACT Arena Building, Popular Road, Banmai, Pakkred, นนทบุรี 11120 ประเทศไทย', '13.911571', '100.54824600000006'),
(129, 'อิมแพ็ค อารีน่า', 'IMPACT Arena Building, Popular Road, Banmai, Pakkred, นนทบุรี 11120 ประเทศไทย', '13.911571', '100.54824600000006'),
(130, 'อาคารวิทยาศาสตร์กายภาพ 45 ปี', 'อาคารวิทยาศาสตร์กายภาพ 45 ปี แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8459143', '100.57119310000007'),
(131, 'ศูนย์เรียนรวม 1', 'ศูนย์เรียนรวม 1 แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10220 ประเทศไทย', '13.8472309', '100.5709812'),
(132, 'คณะบริหารธุรกิจ มหาวิทยาลัยศรีปทุม SPU', '2410/ ถนน พหลโยธิน ถนน พหลโยธิน แขวง เสนานิคม เขต จตุจักร กรุงเทพมหานคร 10900 ประเทศไทย', '13.8539272', '100.58583320000002'),
(133, '', '', '', ''),
(134, 'ชุมชนประชานิเวศน์ 3', 'ชุมชนประชานิเวศน์ 3 ตำบล บางเขน อำเภอเมืองนนทบุรี นนทบุรี 11000 ประเทศไทย', '13.865169', '100.53562899999997'),
(135, 'อิมแพ็ค อารีน่า', 'IMPACT Arena Building, Popular Road, Banmai, Pakkred, นนทบุรี 11120 ประเทศไทย', '13.911571', '100.54824600000006');

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
('bond@mail.com', 'BONDY Thailand', 'BONDY Thailand ถนน พหลโยธิน เขต จตุจักร กรุงเทพมหานคร', '029876543', '../img_profile/5aa7a47887b8e.jpg', 'bondyth.com'),
('noey@mail.com', 'NOEY Company', 'NOEY Company กรุงเทพมหานคร', '021112222', '../img_profile/5aa7a3fc60d46.jpg', 'ืnoeycompany.com');

-- --------------------------------------------------------

--
-- Table structure for table `precondition`
--

CREATE TABLE `precondition` (
  `attend_event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `precondition`
--

INSERT INTO `precondition` (`attend_event_id`, `picture_path`, `email`) VALUES
('121', 'precon/5aa7cc3b46f64.png', 'aif@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qr_code`
--

INSERT INTO `qr_code` (`email`, `event_id`, `picture_path`) VALUES
('nut@mail.com', '110', 'qrcodes/nut@mail.com-110.png'),
('nut@mail.com', '118', 'qrcodes/nut@mail.com-118.png'),
('nut@mail.com', '130', 'qrcodes/nut@mail.com-130.png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `attend_event_id` int(10) NOT NULL,
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
('admin@mail.com', '$2y$10$77W/X3b2dBy7DelZymnYV.YeWAPFZ3.mdbzQk7bCHrybkmTi3dY7K', 'ADMIN', 0),
('aif@mail.com', '$2y$10$RhQfEVSJ6AeaibqIRXAU6.ceoqTGLYsXV.9RS.SK6FzObmZXN.b3C', 'USER', 0),
('bond@mail.com', '$2y$10$5IUeQ5NDNoYRXph2Of8MWuoEa/mxGyLFeKBYjnhFqtsQSkH9oTX7W', 'ORGANIZER', 0),
('noey@mail.com', '$2y$10$QGgyXrPf1w/.SLfPy.DJ9upFeD1dGn4RGGBr9nM2c9zoXDmnCFpjK', 'ORGANIZER', 0),
('nut@mail.com', '$2y$10$.uO3qXSn35aLC6lqEhjkS.2GjCRv.4jIjzQtCGyqDieopeh1TnM4S', 'USER', 0),
('ton@mail.com', '$2y$10$3CvTKoAuSsLfcSVWJ80r0OA7lHaLhscvV9sYzNpMimDwtk4bIbKeW', 'USER', 0),
('toto@mail.com', '$2y$10$Y77f/.goJKH9w.xj5XLy/u0LbBCoNrg./tUFe06P0iB/7mCLp0p4u', 'USER', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
