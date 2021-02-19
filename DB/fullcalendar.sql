-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 10:36 AM
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
  `roomname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `event_createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_title`, `event_detail`, `event_startdate`, `event_enddate`, `event_starttime`, `event_endtime`, `event_color`, `event_bgcolor`, `event_url`, `event_repeatday`, `event_allday`, `event_createdate`) VALUES
(2, 'เทียว', '', '2021-01-13', '2021-01-14', '10:30:00', '14:30:00', '#FFFFFF', '#03a9f4', '', '', 1, '2021-01-12 04:31:03'),
(4, 'da comrade', '', '2021-02-03', '2021-02-20', '06:00:00', '18:00:00', '#FFFFFF', '#03a9f4', '', '', 1, '2021-02-16 08:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Lastupdate` datetime NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `Access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Lastupdate`, `LoginStatus`, `Access`) VALUES
('Jeerachon', '123456', '2021-02-19 13:16:11', 0, 'user'),
('Sirichai', '654321', '0000-00-00 00:00:00', 0, 'admin');

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
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
