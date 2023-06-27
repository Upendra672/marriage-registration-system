-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2023 at 08:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 1234567890, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-28 05:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

CREATE TABLE `tblappointments` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `date and time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`id`, `name`, `phone`, `date`, `time`, `date and time`) VALUES
(1, 'upendra', '8320448536', '2023-05-11', '10:00:00', '2023-05-09 18:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

CREATE TABLE `tblregistration` (
  `ID` int(10) NOT NULL,
  `RegistrationNumber` varchar(100) DEFAULT NULL,
  `UserID` int(10) DEFAULT NULL,
  `DateofMarriage` varchar(200) NOT NULL,
  `HusbandName` varchar(200) DEFAULT NULL,
  `HusImage` varchar(200) NOT NULL,
  `HusbandReligion` varchar(50) DEFAULT NULL,
  `Husbanddob` varchar(200) DEFAULT NULL,
  `HusbandSBM` varchar(50) DEFAULT NULL,
  `HusbandAdd` mediumtext DEFAULT NULL,
  `HusbandZipcode` int(10) DEFAULT NULL,
  `HusbandState` varchar(200) DEFAULT NULL,
  `HusbandAdharno` varchar(200) DEFAULT NULL,
  `WifeName` varchar(200) DEFAULT NULL,
  `WifeImage` varchar(200) NOT NULL,
  `WifeReligion` varchar(200) DEFAULT NULL,
  `Wifedob` varchar(200) DEFAULT NULL,
  `WifeSBM` varchar(50) DEFAULT NULL,
  `WifeAdd` mediumtext DEFAULT NULL,
  `WifeZipcode` int(10) DEFAULT NULL,
  `WifeState` varchar(200) DEFAULT NULL,
  `WifeAdharNo` varchar(200) DEFAULT NULL,
  `WitnessNamefirst` varchar(200) DEFAULT NULL,
  `WitnessAddressFirst` mediumtext DEFAULT NULL,
  `WitnessNamesec` varchar(200) DEFAULT NULL,
  `WitnessAddresssec` mediumtext DEFAULT NULL,
  `WitnessNamethird` varchar(200) DEFAULT NULL,
  `WitnessAddressthird` mediumtext DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`ID`, `RegistrationNumber`, `UserID`, `DateofMarriage`, `HusbandName`, `HusImage`, `HusbandReligion`, `Husbanddob`, `HusbandSBM`, `HusbandAdd`, `HusbandZipcode`, `HusbandState`, `HusbandAdharno`, `WifeName`, `WifeImage`, `WifeReligion`, `Wifedob`, `WifeSBM`, `WifeAdd`, `WifeZipcode`, `WifeState`, `WifeAdharNo`, `WitnessNamefirst`, `WitnessAddressFirst`, `WitnessNamesec`, `WitnessAddresssec`, `WitnessNamethird`, `WitnessAddressthird`, `RegDate`, `Status`, `Remark`, `UpdationDate`) VALUES
(12, '901066807', 5, '05/02/2023', 'Upendrakumar', 'b7d4359cb094cc25605b7688505b65231685081745jpeg', 'Hindu', '2002/12/01', 'Bachelor', 'kim', 394110, 'gujarat', '123412341234', 'aditi modi', 'cb8afed1137e16a082be17f71bce21d01685081745.png', 'hindu', '2002/01/21', 'Bachelor', 'kim', 394110, 'gujarat', '45698712365', 'akash', 'kim', 'harsh', 'kim', 'hitaci', 'kim', '2023-05-26 06:17:09', 'Verified', 'good', '2023-05-26 06:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(5, 'Upendra', 'Yadav', 8320448536, 'Gujarat nagar kim', '202cb962ac59075b964b07152d234b70', '2023-04-13 05:20:59'),
(6, 'aditi', 'modi', 9099224560, 'ANKLESHWAR', '202cb962ac59075b964b07152d234b70', '2023-04-13 05:23:37'),
(7, 'vatsal', 'patel', 123456789, 'bharuch', 'c20ad4d76fe97759aa27a0c99bff6710', '2023-04-13 09:00:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointments`
--
ALTER TABLE `tblappointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblregistration`
--
ALTER TABLE `tblregistration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointments`
--
ALTER TABLE `tblappointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblregistration`
--
ALTER TABLE `tblregistration`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
