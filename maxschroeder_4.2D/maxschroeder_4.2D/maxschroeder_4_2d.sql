-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 05:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxschroeder_4.2d`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `propertyId` int(11) NOT NULL,
  `price` float NOT NULL,
  `typeId` int(11) NOT NULL,
  `townId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`propertyId`, `price`, `typeId`, `townId`) VALUES
(1, 180000, 2, 1),
(2, 750000, 3, 2),
(3, 180000, 2, 3),
(5, 145000, 2, 4),
(6, 900000, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_town`
--

CREATE TABLE `tbl_town` (
  `townId` int(11) NOT NULL,
  `town` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_town`
--

INSERT INTO `tbl_town` (`townId`, `town`) VALUES
(1, 'Birzebbuga'),
(2, 'Marsaxlokk'),
(3, 'Santa Lucija'),
(4, 'Marsa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `typeId` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`typeId`, `type`) VALUES
(1, 'House'),
(2, 'Flat'),
(3, 'Villa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`) VALUES
(1, 'Admin', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`propertyId`),
  ADD KEY `typeId` (`typeId`),
  ADD KEY `townId` (`townId`);

--
-- Indexes for table `tbl_town`
--
ALTER TABLE `tbl_town`
  ADD PRIMARY KEY (`townId`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_town`
--
ALTER TABLE `tbl_town`
  MODIFY `townId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD CONSTRAINT `tbl_property_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `tbl_type` (`typeId`),
  ADD CONSTRAINT `tbl_property_ibfk_2` FOREIGN KEY (`townId`) REFERENCES `tbl_town` (`townId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
