-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2019 at 08:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SoftwareDev(RJI)`
--

-- --------------------------------------------------------

--
-- Table structure for table `Has`
--

CREATE TABLE `Has` (
  `Title` varchar(255) NOT NULL,
  `Username` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Photos`
--

CREATE TABLE `Photos` (
  `Picture` varchar(70) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Username` varchar(24) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `Accesslevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Has`
--
ALTER TABLE `Has`
  ADD PRIMARY KEY (`Username`,`Title`),
  ADD KEY `Title` (`Title`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`Title`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Has`
--
ALTER TABLE `Has`
  ADD CONSTRAINT `Has_ibfk_1` FOREIGN KEY (`Title`) REFERENCES `Photos` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Has_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
