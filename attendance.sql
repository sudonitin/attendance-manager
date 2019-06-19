-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 02:30 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `montime` time DEFAULT NULL,
  `mon` varchar(50) DEFAULT NULL,
  `tuetime` time DEFAULT NULL,
  `tue` varchar(50) DEFAULT NULL,
  `wedtime` time DEFAULT NULL,
  `wed` varchar(50) DEFAULT NULL,
  `thutime` time DEFAULT NULL,
  `thu` varchar(50) DEFAULT NULL,
  `fritime` time DEFAULT NULL,
  `fri` varchar(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`montime`, `mon`, `tuetime`, `tue`, `wedtime`, `wed`, `thutime`, `thu`, `fritime`, `fri`, `id`) VALUES
('00:00:00', '', '00:00:00', '', '17:35:00', 'maths', '00:00:00', '', '00:00:00', '', 40),
('00:00:00', '', '00:00:00', '', '17:40:00', 'algebra', '00:00:00', '', '00:00:00', '', 40),
('00:00:00', '', '00:00:00', '', '17:43:45', 'geometry', '00:00:00', '', '00:00:00', '', 41),
('00:00:00', '', '00:00:00', '', '17:44:00', 'oopm', '00:00:00', '', '00:00:00', '', 41),
('00:00:00', '', '00:00:00', '', '00:00:00', '17:47', '00:00:00', '', '00:00:00', '', 42),
('00:00:00', '', '00:00:00', '', '17:48:00', 'hindi', '00:00:00', '', '00:00:00', '', 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usrid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrid`, `username`, `email`, `password`) VALUES
(1, 'nitin', 'sahun577@gmail.com', 'a152e841783914146e4bcd4f39100686'),
(40, 'globefire', 'sahun5774@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(41, 'male', 'abc@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(42, 'iron', 'ironman@marvel.in', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(43, 'logan', 'logan@dc.in', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
