-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2015 at 12:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelexperts`
--

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageId` int(11) NOT NULL,
  `PkgName` varchar(50) NOT NULL,
  `PkgStartDate` datetime DEFAULT NULL,
  `PkgEndDate` datetime DEFAULT NULL,
  `PkgDesc` varchar(50) DEFAULT NULL,
  `PkgBasePrice` decimal(19,4) NOT NULL,
  `PkgAgencyCommission` decimal(19,4) DEFAULT NULL,
  `PkgImageUrl` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageId`, `PkgName`, `PkgStartDate`, `PkgEndDate`, `PkgDesc`, `PkgBasePrice`, `PkgAgencyCommission`, `PkgImageUrl`) VALUES
(1, 'Caribbean New Year', '2005-12-25 00:00:00', '2006-01-04 00:00:00', 'Cruise the Caribbean & Celebrate the New Year.', '4800.0000', '400.0000', ''),
(2, 'Polynesian Paradise', '2005-12-12 00:00:00', '2005-12-20 00:00:00', '8 Day All Inclusive Hawaiian Vacation', '3000.0000', '310.0000', ''),
(3, 'Asian Expedition', '2006-05-14 00:00:00', '2006-05-28 00:00:00', 'Airfaire, Hotel and Eco Tour.', '2800.0000', '300.0000', ''),
(4, 'European Vacation', '2005-11-01 00:00:00', '2005-11-14 00:00:00', 'Euro Tour with Rail Pass and Travel Insurance', '3000.0000', '280.0000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`PackageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
