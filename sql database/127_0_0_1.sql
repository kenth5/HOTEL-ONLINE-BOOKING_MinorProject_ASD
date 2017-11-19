-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 04:24 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--
CREATE DATABASE IF NOT EXISTS `reservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservation`;

-- --------------------------------------------------------

--
-- Table structure for table `approved_booking`
--

CREATE TABLE `approved_booking` (
  `transactionNo` int(30) NOT NULL,
  `userID` varchar(30) DEFAULT NULL,
  `roomId` int(20) DEFAULT NULL,
  `checkinDate` date DEFAULT NULL,
  `checkoutDate` date DEFAULT NULL,
  `noOfGuest` int(10) DEFAULT NULL,
  `noOfRoom` int(10) DEFAULT NULL,
  `ccNumber` bigint(32) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `transactionNo` int(30) NOT NULL,
  `userID` varchar(30) DEFAULT NULL,
  `roomId` int(20) DEFAULT NULL,
  `checkinDate` date DEFAULT NULL,
  `checkoutDate` date DEFAULT NULL,
  `noOfGuest` int(10) DEFAULT NULL,
  `noOfRoom` int(10) DEFAULT NULL,
  `ccNumber` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_booking`
--

CREATE TABLE `pending_booking` (
  `transactionNo` int(30) NOT NULL,
  `userID` varchar(30) DEFAULT NULL,
  `roomId` int(20) DEFAULT NULL,
  `checkinDate` date DEFAULT NULL,
  `checkoutDate` date DEFAULT NULL,
  `noOfGuest` int(10) DEFAULT NULL,
  `noOfRoom` int(10) DEFAULT NULL,
  `ccNumber` bigint(32) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(10) NOT NULL,
  `roomName` varchar(30) DEFAULT NULL,
  `roomAvailability` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `roomName`, `roomAvailability`) VALUES
(1, 'Deluxe Room', 9),
(2, 'Superior Room', 5),
(3, 'Executive Room', 3),
(4, 'Pacific Room', 9),
(5, 'Pacific Suite', 10),
(6, 'Deluxe Suite', 8),
(7, 'Executive Suite', 9),
(8, 'Presidential Suite', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactionno`
-- (See below for the actual view)
--
CREATE TABLE `transactionno` (
`transactionNo` int(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(30) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `question` varchar(40) NOT NULL,
  `recovery` varchar(30) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `lastname`, `firstname`, `password`, `email`, `question`, `recovery`, `status`) VALUES
('admin123', 'admin', 'admin', 'kero', 'ke', 'Who is your mother?', 'kerokero', 'activated'),
('kenthPogi', 'singco', 'kenth', 'pangit', 'kenth.wilson@yourservice', 'How was this experience signing up?', 'bad', 'activated'),
('roxan', 'tiu', 'roxan', 'eww', 'rox', 'Who is your mother?', 'kerokero', 'activated'),
('rona', 'licera', 'lubot', 'botlu', 'ron', 'Who is your mother?', 'kerokero', 'activated'),
('king', 'celocia', 'king', 'pangit', 'king', 'Who is your mother?', 'kerokero', 'activated'),
('kennethcelocia', 'haha', 'hehe', '123', 'kennethcelocia@yahoo.com', 'Who is your mother?', 'my', 'deactivated'),
('mc', 'Postrero', 'Margarette Chloe', '123', 'postreromc@gmail.com', 'What is your favorite pet?', 'lion', 'activated'),
('kc', 'ce', 'ke', '1', 'kc@g', 'Who is your mother?', 'l', 'activated'),
('ch', 'mar', 'ch', '1', '1@g', 'Who is your mother?', '1', 'activated'),
('jm', 'mosquera', 'josie', '123', 'jm@g', 'Who is your mother?', '12', 'activated'),
('kenthh', 'kenth', 'kenth', 'kenth', 'kenth@gmail.com', 'Who is your mother?', 'kenth', 'activated');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_view`
-- (See below for the actual view)
--
CREATE TABLE `users_view` (
`userID` varchar(30)
,`lastname` varchar(30)
,`firstname` varchar(30)
,`email` varchar(40)
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `transactionno`
--
DROP TABLE IF EXISTS `transactionno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactionno`  AS  select `pending_booking`.`transactionNo` AS `transactionNo` from `pending_booking` union select `approved_booking`.`transactionNo` AS `transactionNo` from `approved_booking` union select `archive`.`transactionNo` AS `transactionNo` from `archive` order by `transactionNo` desc ;

-- --------------------------------------------------------

--
-- Structure for view `users_view`
--
DROP TABLE IF EXISTS `users_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view`  AS  select `users`.`userID` AS `userID`,`users`.`lastname` AS `lastname`,`users`.`firstname` AS `firstname`,`users`.`email` AS `email`,`users`.`status` AS `status` from `users` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_booking`
--
ALTER TABLE `approved_booking`
  ADD PRIMARY KEY (`transactionNo`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`transactionNo`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `pending_booking`
--
ALTER TABLE `pending_booking`
  ADD PRIMARY KEY (`transactionNo`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
