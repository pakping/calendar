-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 07:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cars_id` int(3) NOT NULL,
  `cars_type` varchar(30) NOT NULL,
  `cars_name` varchar(60) NOT NULL,
  `bgcolor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cars_id`, `cars_type`, `cars_name`, `bgcolor`) VALUES
(1, 'ตู้', 'นข 3421 พย.', '#4ff20f'),
(2, 'ตู้', 'นข 3455 พย.', '#0d06d4'),
(3, 'ตู้', 'นข 3460 พย.', '#fa02d9'),
(4, 'เก๋ง', 'กต 3607 พย.', '#e1ff00');

-- --------------------------------------------------------

--
-- Table structure for table `cars_event`
--

CREATE TABLE `cars_event` (
  `event_id` int(3) NOT NULL,
  `cars_id` int(3) NOT NULL,
  `event_title` varchar(80) NOT NULL,
  `event_detail` text NOT NULL,
  `event_startdate` date NOT NULL,
  `event_enddate` date NOT NULL,
  `event_starttime` time NOT NULL,
  `event_endtime` time NOT NULL,
  `event_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `event_bgcolor` varchar(15) NOT NULL DEFAULT '#03a9f4',
  `event_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `people` int(3) NOT NULL,
  `regname` varchar(100) NOT NULL,
  `agency` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `statid` int(11) DEFAULT 2,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_event`
--

INSERT INTO `cars_event` (`event_id`, `cars_id`, `event_title`, `event_detail`, `event_startdate`, `event_enddate`, `event_starttime`, `event_endtime`, `event_color`, `event_bgcolor`, `event_createdate`, `people`, `regname`, `agency`, `location`, `statid`, `Username`) VALUES
(1, 1, 'Future of gaming', 'แอ้ว', '2021-03-10', '2021-03-10', '17:38:00', '17:38:00', '#FFFFFF', '#4ff20f', '2021-03-09 08:54:55', 12, 'jeerachon', 'กลัวเมีย', 'หน้ามอ', 2, 'Jeerachon'),
(1, 2, 'Future of gaming', 'แอ้ว', '2021-03-10', '2021-03-10', '17:38:00', '17:38:00', '#FFFFFF', '#0d06d4', '2021-03-09 08:54:55', 12, 'jeerachon', 'กลัวเมีย', 'หน้ามอ', 2, 'Jeerachon'),
(1, 3, 'Future of gaming', 'แอ้ว', '2021-03-10', '2021-03-10', '17:38:00', '17:38:00', '#FFFFFF', '#fa02d9', '2021-03-09 08:54:55', 12, 'jeerachon', 'กลัวเมีย', 'หน้ามอ', 2, 'Jeerachon');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(2) NOT NULL,
  `roomname` varchar(60) NOT NULL,
  `roomcap` int(11) NOT NULL,
  `com` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `mic` int(11) NOT NULL,
  `roomimg` varchar(255) NOT NULL,
  `bgcolor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomname`, `roomcap`, `com`, `screen`, `mic`, `roomimg`, `bgcolor`) VALUES
(12, 'Jeerachon01', 10, 0, 0, 1, '../img/roomimg/title_imgJeerachon01.jpeg', '#17e708'),
(13, 'Jeerachon02', 50, 1, 1, 0, '../img/roomimg/title_imgJeerachon02.jpg', '#1505f0'),
(14, 'Jeerachon03', 60, 1, 1, 1, '../img/roomimg/title_imgJeerachon03.jpg', '#eeff00');

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `statid` int(11) NOT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`statid`, `state`) VALUES
(1, 'ผ่าน'),
(2, 'รอดำเนินกา'),
(3, 'สิ้นสุด'),
(4, 'ไม่ผ่าน'),
(5, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(256) NOT NULL,
  `roomid` int(2) NOT NULL,
  `event_detail` text NOT NULL,
  `event_startdate` date NOT NULL,
  `event_enddate` date NOT NULL,
  `event_starttime` time NOT NULL,
  `event_endtime` time NOT NULL,
  `event_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `event_bgcolor` varchar(15) NOT NULL DEFAULT '#03a9f4',
  `event_url` varchar(300) NOT NULL,
  `event_repeatday` varchar(20) NOT NULL,
  `event_allday` tinyint(1) NOT NULL,
  `event_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `people` int(3) NOT NULL,
  `reguser` varchar(255) NOT NULL,
  `tool` int(1) NOT NULL,
  `Scup` int(3) NOT NULL,
  `Bcup` int(3) NOT NULL,
  `longcup` int(3) NOT NULL,
  `drinkcup` int(3) NOT NULL,
  `softdrink` int(3) NOT NULL,
  `othercup` varchar(20) NOT NULL,
  `hotbot` int(3) NOT NULL,
  `tray` int(3) NOT NULL,
  `dishcup` int(3) NOT NULL,
  `jug` int(3) NOT NULL,
  `boxcup` int(3) NOT NULL,
  `tea` int(3) NOT NULL,
  `boiler` int(3) NOT NULL,
  `basket` int(3) NOT NULL,
  `other` varchar(20) NOT NULL,
  `statid` int(11) DEFAULT 2,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_title`, `roomid`, `event_detail`, `event_startdate`, `event_enddate`, `event_starttime`, `event_endtime`, `event_color`, `event_bgcolor`, `event_url`, `event_repeatday`, `event_allday`, `event_createdate`, `people`, `reguser`, `tool`, `Scup`, `Bcup`, `longcup`, `drinkcup`, `softdrink`, `othercup`, `hotbot`, `tray`, `dishcup`, `jug`, `boxcup`, `tea`, `boiler`, `basket`, `other`, `statid`, `Username`) VALUES
(17, 'Games Review Today', 12, 'ลองเกม', '2021-03-07', '2021-03-08', '10:00:00', '12:00:00', '#FFFFFF', '#17e708', '', '', 0, '2021-03-04 01:57:29', 20, 'Jeerachon', 0, 3, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 5, 'jeerachon'),
(18, 'Future of gaming', 12, 'คุยเรื่อยเปี่อย', '2021-03-26', '2021-03-30', '10:00:00', '12:20:00', '#FFFFFF', '#17e708', '', '', 0, '2021-03-04 01:59:39', 30, 'Jeerachon', 0, 20, 5, 0, 30, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 5, 'jeerachon'),
(19, 'This is the test', 13, 'Would you agree?', '2021-03-20', '2021-03-22', '10:00:00', '18:00:00', '#FFFFFF', '#1505f0', '', '', 0, '2021-03-05 02:13:33', 50, '', 0, 12, 0, 0, 50, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 1, 'jeerachon'),
(28, 'This is the test2', 12, 'dia', '2021-03-26', '2021-03-30', '12:29:00', '13:29:00', '#FFFFFF', '#17e708', '', '', 0, '2021-03-05 04:29:54', 3, '', 0, 0, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 2, 'jeerachon'),
(29, 'DDD', 14, '32', '2021-03-06', '2021-03-12', '17:18:00', '19:18:00', '#FFFFFF', '#eeff00', '', '', 0, '2021-03-05 08:19:03', 11, '', 0, 0, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 2, 'jeerachon');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Lastupdate` datetime NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `Access` varchar(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Lastupdate`, `LoginStatus`, `Access`, `fname`, `lname`, `email`, `pnum`) VALUES
('jeerachon', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-09 16:38:29', 0, 'user', 'Jeerachon', 'Tummasorn', 'Humgee@Hum.co.th', 123456789),
('Mojung', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', 0, 'user', 'Mr', 'Mojung', 'mojung@jung.com', 999999999),
('phoomin', 'e35cf7b66449df565f93c607d5a81d09', '0000-00-00 00:00:00', 0, 'user', 'Phoomin', 'Boonanan', 'Min@hum.co.th', 987654321),
('sirichai', 'c33367701511b4f6020ec61ded352059', '0000-00-00 00:00:00', 0, 'admin', 'Sirichai', 'Benjamakom', 'Den@hum.co.th', 696969696);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cars_id`);

--
-- Indexes for table `cars_event`
--
ALTER TABLE `cars_event`
  ADD PRIMARY KEY (`event_id`,`cars_id`),
  ADD KEY `fk_cars` (`cars_id`),
  ADD KEY `fk_statid2` (`statid`),
  ADD KEY `fk_username2` (`Username`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`statid`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_roomid` (`roomid`),
  ADD KEY `fk_username` (`Username`),
  ADD KEY `fk_statid` (`statid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cars_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `statid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars_event`
--
ALTER TABLE `cars_event`
  ADD CONSTRAINT `fk_cars` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`cars_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_statid2` FOREIGN KEY (`statid`) REFERENCES `stat` (`statid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username2` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `fk_roomid` FOREIGN KEY (`roomid`) REFERENCES `room` (`roomid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_statid` FOREIGN KEY (`statid`) REFERENCES `stat` (`statid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
