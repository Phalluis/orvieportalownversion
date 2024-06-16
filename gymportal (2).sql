-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 07:05 PM
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
(1, 'Branch test 1', 'branch address 1'),
(2, 'branch test 2', 'branch test address 2');

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

INSERT INTO `employeetable` (`intEmpID`, `strEmpLN`, `strEmpFN`, `strEmpPosition`, `intBranchID_fk`, `strEmpAddress`, `strEmpGender`, `intEmpBirth`, `intEmpAge`, `intEmpConNum`, `strEmpConEmail`) VALUES
(1, 'unabading', 'john pork', 'janitor', 2, 'ilalim ng ilog', 'Female', '2024-05-27', 0, 9123456789, '123@gmail.com');

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
  `intBranchID_fk` int(11) NOT NULL,
  `intEquipQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorytable`
--

INSERT INTO `inventorytable` (`intEquipID_fk`, `intBranchID_fk`, `intEquipQuantity`) VALUES
(1, 1, 13),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `membershiptable`
--

CREATE TABLE `membershiptable` (
  `intMemID` int(11) NOT NULL,
  `strMemLN` varchar(50) NOT NULL,
  `strMemFN` varchar(50) NOT NULL,
  `intBranchID_fk` int(11) NOT NULL,
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
-- Dumping data for table `membershiptable`
--

INSERT INTO `membershiptable` (`intMemID`, `strMemLN`, `strMemFN`, `intBranchID_fk`, `intMemBirth`, `intMemAge`, `strMemGender`, `intMemConNum`, `strMemConEmail`, `strMemAddress`, `intMemStart`, `intMemEnd`) VALUES
(2, 'last', 'first', 2, '2024-06-02', 1, 'Female', 9123456789, 'Unabading@email.com', '1234556', '2024-06-17', '2024-07-17'),
(3, 'last1', 'first1', 1, '2024-05-27', 1, 'Male', 9123456789, '123@mail.com', '', '2024-06-03', '2024-06-03');

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
  ADD KEY `strBranchname` (`intBranchID_fk`);

--
-- Indexes for table `equipmenttable`
--
ALTER TABLE `equipmenttable`
  ADD PRIMARY KEY (`intEquipID`);

--
-- Indexes for table `inventorytable`
--
ALTER TABLE `inventorytable`
  ADD PRIMARY KEY (`intEquipID_fk`,`intBranchID_fk`),
  ADD KEY `intBranchID_fk` (`intBranchID_fk`);

--
-- Indexes for table `membershiptable`
--
ALTER TABLE `membershiptable`
  ADD PRIMARY KEY (`intMemID`),
  ADD KEY `intBranchID_fk` (`intBranchID_fk`);

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
  MODIFY `intBranchID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `intEmpID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `employeetable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorytable`
--
ALTER TABLE `inventorytable`
  ADD CONSTRAINT `inventorytable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventorytable_ibfk_2` FOREIGN KEY (`intEquipID_fk`) REFERENCES `equipmenttable` (`intEquipID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membershiptable`
--
ALTER TABLE `membershiptable`
  ADD CONSTRAINT `membershiptable_ibfk_1` FOREIGN KEY (`intBranchID_fk`) REFERENCES `branchtable` (`intBranchID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
