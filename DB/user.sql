-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 03:39 AM
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
('jeerachon', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-05 16:25:57', 0, 'user', 'Jeerachon', 'Tummasorn', 'Humgee@Hum.co.th', 123456789),
('Mojung', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', 0, 'user', 'Mr', 'Mojung', 'mojung@jung.com', 999999999),
('phoomin', 'e35cf7b66449df565f93c607d5a81d09', '0000-00-00 00:00:00', 0, 'user', 'Phoomin', 'Boonanan', 'Min@hum.co.th', 987654321),
('sirichai', 'c33367701511b4f6020ec61ded352059', '0000-00-00 00:00:00', 0, 'admin', 'Sirichai', 'Benjamakom', 'Den@hum.co.th', 696969696);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
