-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
(1, 'ห้องประชุมศาสตราจารย์พิเศษ ดร.มณฑล สงวนเสริมศรี (60ที่นั่ง)', 60, 1, 0, 1, '', ''),
(2, 'ห้องประชุม OPD 3 (30ที่นั่ง)', 30, 0, 1, 0, '', ''),
(12, 'Jeerachon01', 10, 0, 0, 1, '../img/roomimg/title_imgJeerachon01.jpeg', '#17e708');

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `statid` int(11) NOT NULL,
  `state` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`statid`, `state`) VALUES
(1, 'ผ่าน'),
(2, 'รอดำเนินกา'),
(3, 'ยกเลิก');

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
  `description` text NOT NULL,
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
  `statid` int(11) DEFAULT NULL,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_title`, `roomid`, `event_detail`, `event_startdate`, `event_enddate`, `event_starttime`, `event_endtime`, `event_color`, `event_bgcolor`, `event_url`, `event_repeatday`, `event_allday`, `event_createdate`, `people`, `description`, `reguser`, `tool`, `Scup`, `Bcup`, `longcup`, `drinkcup`, `softdrink`, `othercup`, `hotbot`, `tray`, `dishcup`, `jug`, `boxcup`, `tea`, `boiler`, `basket`, `other`, `statid`, `Username`) VALUES
(16, 'fsfdsfsd', 2, '', '2021-03-06', '2021-03-06', '15:37:00', '18:35:00', '#FFFFFF', '', '', '', 0, '2021-03-03 06:35:26', 150, 'dsadsa', 'dsadadsadqw', 0, 0, 0, 0, 0, 0, 'none', 0, 0, 0, 0, 0, 0, 0, 0, 'none', 2, 'Mojung');

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
('jeerachon', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-03 13:41:17', 0, 'user', '', '', '', 0),
('Mojung', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', 0, 'user', 'Mr', 'Mojung', 'mojung@jung.com', 999999999),
('phoomin', 'e35cf7b66449df565f93c607d5a81d09', '0000-00-00 00:00:00', 0, 'user', '', '', '', 0),
('sirichai', 'c33367701511b4f6020ec61ded352059', '0000-00-00 00:00:00', 0, 'admin', '', '', '', 0);

--
-- Indexes for dumped tables
--

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
  ADD KEY `fk_roomid` (`roomid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `statid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `fk_roomid` FOREIGN KEY (`roomid`) REFERENCES `room` (`roomid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
