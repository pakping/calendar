-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 03:03 AM
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
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(2) NOT NULL,
  `roomname` varchar(60) NOT NULL,
  `roomcap` int(11) NOT NULL,
  `com` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `mic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomname`, `roomcap`, `com`, `screen`, `mic`) VALUES
(1, 'ห้องประชุมศาสตราจารย์พิเศษ ดร.มณฑล สงวนเสริมศรี (60ที่นั่ง)', 60, 0, 0, 0),
(2, 'ห้องประชุม OPD 3 (30ที่นั่ง)', 30, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(256) NOT NULL,
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
  `other` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_title`, `event_detail`, `event_startdate`, `event_enddate`, `event_starttime`, `event_endtime`, `event_color`, `event_bgcolor`, `event_url`, `event_repeatday`, `event_allday`, `event_createdate`, `people`, `description`, `reguser`, `tool`, `Scup`, `Bcup`, `longcup`, `drinkcup`, `softdrink`, `othercup`, `hotbot`, `tray`, `dishcup`, `jug`, `boxcup`, `tea`, `boiler`, `basket`, `other`) VALUES
(2, 'เทียว', '', '2021-01-13', '2021-01-14', '10:30:00', '14:30:00', '#FFFFFF', '#03a9f4', '', '', 1, '2021-01-12 04:31:03', 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(4, 'da comrade', '', '2021-02-03', '2021-02-20', '06:00:00', '18:00:00', '#FFFFFF', '#03a9f4', '', '', 1, '2021-02-16 08:01:42', 0, '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 'Humgee', '', '2021-02-26', '2021-02-28', '12:40:00', '16:40:00', '#FFFFFF', '#03a9f4', '', '', 0, '2021-02-23 07:41:12', 60, 'เล่นเกม', 'Jeerachon', 0, 0, 2, 51, 10, 0, 'none', 23, 5, 0, 0, 0, 0, 0, 0, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Lastupdate` datetime NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `Access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Lastupdate`, `LoginStatus`, `Access`) VALUES
('jeerachon', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00', 0, 'user'),
('phoomin', 'e35cf7b66449df565f93c607d5a81d09', '0000-00-00 00:00:00', 0, 'user'),
('sirichai', 'c33367701511b4f6020ec61ded352059', '2021-02-25 09:03:01', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

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
  MODIFY `roomid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
