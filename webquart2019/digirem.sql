-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 11:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digirem`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--
-- Error reading structure for table digirem.properties: #1932 - Table 'digirem.properties' doesn't exist in engine
-- Error reading data for table digirem.properties: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `digirem`.`properties`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `PropertyID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PropertyID`, `UserID`, `Title`, `Picture`, `Type`, `Description`) VALUES
(4, 8, 'Something Else', 'yt.jpg', 'Bungalow', 'Average space'),
(5, 7, 'Big House', 'EI3r1StXkAEuWwd.jpg', 'Ranch', 'Alot of space for the whole family you know what i mean with garage blah blah blah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `Email`, `Password`, `phoneNumber`) VALUES
(6, 'Pride', 'Mhango', 'chimango@gmail.com', '$2y$10$fUBGOgr9yL0AklVXKyBWSehXV0I36XVF2Rp/t6gqlrs', '0888745236'),
(7, 'Kelly', 'Lamar', 'kelly@lamar.com', '$2y$10$B4NwzZUFoqx9flxQ/5W1EuOTywmHv7M52ItZC/jpGi8', '0888897871'),
(8, 'Thaliah', 'Xensky', 'qwerty@qurtz.org', '$2y$10$lZmhLe1zeNbKmBYnzHmDq.6hYsIrZTEjhcfXiILWJAY', '+265994509137'),
(9, 'Lwazi', 'Mpofu', 'lwazi@gmail.com', '$2y$10$TUckA.lyDN4jxPDGUWTzFOQ4ZH0jggePPvwXmq66j7B', '055252458981'),
(10, 'Another', 'User', 'user@gmail.com', '$2y$10$9nEVIKLGRkdkWjkL1Md3veGmcVzGyoE7B/gIdLlF.0B', '0888745236');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`PropertyID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
