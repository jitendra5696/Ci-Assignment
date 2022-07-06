-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bills`
--

CREATE TABLE `tbl_bills` (
  `bill_id` int(11) NOT NULL,
  `units` decimal(65,2) NOT NULL,
  `bill` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bills`
--

INSERT INTO `tbl_bills` (`bill_id`, `units`, `bill`) VALUES
(1, '55.00', '250.00'),
(2, '0.00', '0.00'),
(3, '20.00', '90.00'),
(4, '22.00', '99.00'),
(5, '11.00', '49.50'),
(6, '77.00', '360.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calci`
--

CREATE TABLE `tbl_calci` (
  `data_id` int(11) NOT NULL,
  `num1` decimal(65,2) NOT NULL,
  `num2` decimal(65,2) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `result` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_calci`
--

INSERT INTO `tbl_calci` (`data_id`, `num1`, `num2`, `operator`, `result`) VALUES
(1, '10.00', '33.00', 'Multiply', '330.00'),
(2, '11.00', '44.00', 'Multiply', '484.00'),
(3, '22.00', '20.00', 'Multiply', '440.00'),
(4, '0.00', '12.00', 'Subtract', '-12.00'),
(5, '20.00', '33.00', 'Multiply', '660.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bills`
--
ALTER TABLE `tbl_bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tbl_calci`
--
ALTER TABLE `tbl_calci`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bills`
--
ALTER TABLE `tbl_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_calci`
--
ALTER TABLE `tbl_calci`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
