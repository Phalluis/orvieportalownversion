-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttable`
--

CREATE TABLE `accounttable` (
  `intAcntID` int(10) NOT NULL,
  `strAcntUser` char(15) NOT NULL,
  `strAcntPass` char(15) NOT NULL,
  `strAcntLN` char(50) NOT NULL,
  `strAcntFN` char(50) NOT NULL,
  `intBranchID_fk` int(11) NOT NULL,
  `strSecQuestion` varchar(100) NOT NULL,
  `strSecAnwser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttable`
--

INSERT INTO `accounttable` (`intAcntID`, `strAcntUser`, `strAcntPass`, `strAcntLN`, `strAcntFN`, `intBranchID_fk`, `strSecQuestion`, `strSecAnwser`) VALUES
(13, 'admin1', 'admin1', 'admin1', 'admin1', 1, 'admin1', 'admin'),
(14, 'admin', 'admin', 'admin', 'admin', 2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branchtable`
--

CREATE TABLE `branchtable` (
  `intBranchID` int(5) NOT NULL,
  `strBranchname` char(255) NOT NULL,
  `strBranchAddress` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branchtable`
--

INSERT INTO `branchtable` (`intBranchID`, `strBranchname`, `strBranchAddress`) VALUES
(1, 'Branch test 1 edited', 'branch address 1'),
(2, 'branch test 2 edit', 'branch test address 2');

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `intEmpID` int(10) NOT NULL,
  `strEmpLN` char(50) NOT NULL,
  `strEmpFN` char(50) NOT NULL,
  `strEmpPosition` char(30) NOT NULL,
  `intBranchID_fk` int(11) NOT NULL,
  `strBranchname_fk` varchar(255) NOT NULL,
  `strEmpAddress` char(100) NOT NULL,
  `strEmpGender` char(6) NOT NULL,
  `intEmpBirth` date NOT NULL,
  `intEmpAge` int(2) NOT NULL,
  `intEmpConNum` bigint(11) NOT NULL,
  `strEmpConEmail` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`intEmpID`, `strEmpLN`, `strEmpFN`, `strEmpPosition`, `intBranchID_fk`, `strBranchname_fk`, `strEmpAddress`, `strEmpGender`, `intEmpBirth`, `intEmpAge`, `intEmpConNum`, `strEmpConEmail`) VALUES
(2, 'Unabading', 'jonh pork', 'Janitor', 1, 'Branch test 1 edited', 'ilalim ng ilog', 'Male', '2024-06-01', 4, 9123456789, '123@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttable`
--

CREATE TABLE `equipmenttable` (
  `intEquipID` int(11) NOT NULL,
  `strEquipName` varchar(50) NOT NULL,
  `strEquipDesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipmenttable`
--

INSERT INTO `equipmenttable` (`intEquipID`, `strEquipName`, `strEquipDesc`) VALUES
(1, 'Dumb bell', 'mabigat super bigat'),
(2, 'Barbell', 'Mas mabigat like super bigat ');

-- --------------------------------------------------------

--
-- Table structure for table `inventorytable`
--

CREATE TABLE `inventorytable` (
  `intEquipID_fk` int(11) NOT NULL,
  `strEquipName_fk` varchar(50) NOT NULL,
  `intBranchID_fk` int(11) NOT NULL,
  `strBranchname_fk` varchar(255) NOT NULL,
  `intEquipQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membershiptable`
--

CREATE TABLE `membershiptable` (
  `intMemID` int(11) NOT NULL,
  `strMemLN` varchar(50) NOT NULL,
  `strMemFN` varchar(50) NOT NULL,
  `intBranchID_fk` int(11) NOT NULL,
  `strBranchname_fk` varchar(255) NOT NULL,
  `intMemBirth` date NOT NULL,
  `intMemAge` int(2) NOT NULL,
  `strMemGender` varchar(6) NOT NULL,
  `intMemConNum` bigint(11) NOT NULL,
  `strMemConEmail` varchar(50) NOT NULL,
  `strMemAddress` varchar(100) NOT NULL,
  `intMemStart` date NOT NULL,
  `intMemEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttable`
--
ALTER TABLE `accounttable`
  ADD PRIMARY KEY (`intAcntID`),
  ADD KEY `intBranchID_fk` (`intBranchID_fk`);

--
-- Indexes for table `branchtable`
--
ALTER TABLE `branchtable`
  ADD PRIMARY KEY (`intBranchID`),
  ADD KEY `strBranchname` (`strBranchname`);

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`intEmpID`),
  ADD KEY `strBranchname` (`intBranchID_fk`),
  ADD KEY `strBranchname_fk` (`strBranchname_fk`);

--
-- Indexes for table `equipmenttable`
--
ALTER TABLE `equipmenttable`
  ADD PRIMARY KEY (`intEquipID`),
  ADD KEY `strEquipName` (`strEquipName`);

--
-- Indexes for table `inventorytable`
--
ALTER TABLE `inventorytable`
  ADD PRIMARY KEY (`intEquipID_fk`,`intBranchID_fk`),
  ADD KEY `intBranchID_fk` (`intBranchID_fk`),
  ADD KEY `strBranchname_fk` (`strBranchname_fk`),
  ADD KEY `strEquipName_fk` (`strEquipName_fk`);

--
-- Indexes for table `membershiptable`
--
ALTER TABLE `membershiptable`
  ADD PRIMARY KEY (`intMemID`),
  ADD KEY `intBranchID_fk` (`intBranchID_fk`),
  ADD KEY `strBranchname_fk` (`strBranchname_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttable`
--
ALTER TABLE `accounttable`
  MODIFY `intAcntID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `branchtable`
--
ALTER TABLE `branchtable`
  MODIFY `intBranchID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `intEmpID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipmenttable`
--
ALTER TABLE `equipmenttable`
  MODIFY `intEquipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventorytable`
--
ALTER TABLE `inventorytable`
  MODIFY `intEquipID_fk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membershiptable`
--
ALTER TABLE `membershiptable`
  MODIFY `intMemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounttable`
--
ALTER TABLE `accounttable`
  ADD CONSTRAINT `accounttable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD CONSTRAINT `employeetable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employeetable_ibfk_2` FOREIGN KEY (`strBranchname_fk`) REFERENCES `branchtable` (`strBranchname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorytable`
--
ALTER TABLE `inventorytable`
  ADD CONSTRAINT `inventorytable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorytable_ibfk_2` FOREIGN KEY (`intEquipID_fk`) REFERENCES `equipmenttable` (`intEquipID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorytable_ibfk_3` FOREIGN KEY (`strBranchname_fk`) REFERENCES `branchtable` (`strBranchname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorytable_ibfk_4` FOREIGN KEY (`strEquipName_fk`) REFERENCES `equipmenttable` (`strEquipName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membershiptable`
--
ALTER TABLE `membershiptable`
  ADD CONSTRAINT `membershiptable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membershiptable_ibfk_2` FOREIGN KEY (`strBranchname_fk`) REFERENCES `branchtable` (`strBranchname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
