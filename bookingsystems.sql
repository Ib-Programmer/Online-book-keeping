-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 04:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsystems`
--

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `Id` int(6) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(6) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phonenumber` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Privilege` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Phonenumber`, `Password`, `Privilege`) VALUES
(59, 'Admin', 'admin@gmail.com', '0907889900', '$2y$10$9v5y4TxFmivqlzWqzDiRP.x4x3AeCFZq9gSlUrJLfJ/xKAbCRAZa6', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
